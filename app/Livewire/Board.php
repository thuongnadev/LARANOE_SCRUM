<?php

namespace App\Livewire;

use Livewire\Component;
use Modules\Board\Models\Column;
use Modules\Board\Models\SprintBacklog;

class Board extends Component
{
    public $columns;
    public $tasks;

    public function mount()
    {
        $this->loadData();
    }

    public function loadData()
    {
        $this->columns = Column::select('id', 'column_name')->get();

        $this->tasks = SprintBacklog::select('id', 'name', 'column_id')
            ->get()
            ->groupBy('column_id')
            ->map(function ($group) {
                return $group->keyBy('id');
            })
            ->toArray();
    }

    public function updateTaskColumn($taskId, $columnId)
    {
        SprintBacklog::where('id', $taskId)->update(['column_id' => $columnId]);
        $this->loadData();
    }

    public function render()
    {
        return view('livewire.board');
    }
}

