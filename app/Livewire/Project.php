<?php

namespace App\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;
use Modules\Project\Models\Project as ProjectModel;

class Project extends Component
{
    use WithPagination;
    public $project_name, $creator = 1, $status, $start_date, $end_date, $client_name, $client_email, $repository_url,$priority = 0;

    protected $rules = [
        'project_name' => 'required|string|max:255',
        'start_date' => 'nullable|date',
        'end_date' => 'nullable|date|after_or_equal:start_date',
        'client_name' => 'nullable|string|max:255',
        'client_email' => 'nullable|email|max:255',
    ];

    public function loadDataInTable()
    {
        return DB::table('projects')
               ->select('projects.id', 'projects.project_name', 'projects.priority', 'users.name as creator')
               ->join('users', 'projects.creator', '=', 'users.id')
               ->whereIn('users.role', ['product_owner', 'scrum_master'])
               ->orderBy('projects.id', 'desc')
               ->paginate(5);
    }

    public function save()
    {
        $this->validate();

        ProjectModel::create([
            'project_name' => $this->project_name,
            'creator' => $this->creator,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'client_name' => $this->client_name,
            'client_email' => $this->client_email,
            'repository_url' => $this->repository_url,
            'priority' => $this->priority,
        ]);
        // tắt modal sau khi thêm
        $this->dispatch('projectSaved');
        // Sạch Form
        $this->reset(['project_name', 'creator', 'status', 'start_date', 'end_date', 'client_name', 'client_email', 'repository_url', 'priority']);
        }

    public function delete($id)
    {
        DB::table('projects')->where('id', '=',  $id)->delete();
    }

    public function render()
    {
        $data = $this->loadDataInTable();
        return view('livewire.project', ['projects' => $data]);
    }
}
