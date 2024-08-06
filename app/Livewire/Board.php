<?php

namespace App\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Modules\Board\Models\Column;
use Modules\Board\Models\SprintBacklog as Task;

class Board extends Component
{
    public $columnName;
    public $name, $column_id, $type = 'task', $start_date, $end_date, $assigned_to = 1;
    protected $listeners = ['taskMoved' => '$refresh'];

    // Show Data
    public function loadData()
    {
        return DB::table('columns')
            ->leftJoin('sprint_backlogs', 'sprint_backlogs.column_id', '=', 'columns.id')
            ->select(
                'columns.id as column_id',
                'columns.column_name as column_name',
                'sprint_backlogs.id as task_id',
                'sprint_backlogs.name as task_name',
                'sprint_backlogs.type as type_task',
                'sprint_backlogs.assigned_to as assigned_to',
                'sprint_backlogs.start_date as startDate',
                'sprint_backlogs.end_date as endDate'
            )
            ->get()
            ->groupBy('column_id');
    }

    public function updateColumn($columnId, $columnName)
    {
        DB::table('columns')->where('id', $columnId)->update(['column_name' => $columnName]);

        $this->dispatch('columnUpdated', ['columnId' => $columnId, 'columnName' => $columnName]);

        $this->columnName = '';
        $this->loadData();
    }


    public function reorderColumns($oldIndex, $newIndex)
    {
        $columns = Column::orderBy('order')->get();
        $movingColumn = $columns[$oldIndex];

        if ($oldIndex < $newIndex) {
            Column::whereBetween('order', [$movingColumn->order + 1, $columns[$newIndex]->order])
                ->decrement('order');
        } else {
            Column::whereBetween('order', [$columns[$newIndex]->order, $movingColumn->order - 1])
                ->increment('order');
        }

        $movingColumn->order = $columns[$newIndex]->order;
        $movingColumn->save();

        $this->dispatch('columnsReordered');
    }

    public function updateTaskColumn($taskId, $newColumnId)
    {
        $task = Task::findOrFail($taskId);
        $task->column_id = $newColumnId;
        $task->save();

        $this->dispatch('taskMoved', $taskId, $newColumnId);
    }
    //____________ Column ____________ //

    // Add Column
    public function addColumn()
    {
        DB::table('columns')->insert(['column_name' => $this->columnName]);
        $this->columnName = '';
        $this->loadData();
    }

    // Delete Column
    public function deleteColumn($columnId)
    {
        DB::table('columns')->where('id', '=', $columnId)->delete();
    }

    // ____________ Task ____________ //

    // Add Task
    public function createIssue($columnId)
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|in:task,bug,story',
        ]);

        Task::create([
            'name' => $this->name,
            'type' => $this->type,
            'column_id' => $columnId,
            'assigned_to' => $this->assigned_to
        ]);
        $this->reset(['name', 'type']);
        $this->dispatch('issueCreated');
    }


    // Delete Task
    public function deleteTask($taskID)
    {
        DB::table('sprint_backlogs')->where('id', '=', $taskID)->delete();
    }

    public function render()
    {
        $data = $this->loadData();
        return view('livewire.board', [
            'columns' => $data,
        ]);
    }
}
