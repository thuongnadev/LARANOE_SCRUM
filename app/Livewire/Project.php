<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithoutUrlPagination;
use Modules\Project\Models\Project as ProjectModel;

class Project extends Component
{
    use WithPagination, WithoutUrlPagination;
    public $search = '';
    public $project_name, $creator = 1, $status, $start_date, $end_date, $client_name, $client_email, $repository_url,$priority = 0;
    protected $rules = [
        'project_name' => 'required|string|max:255|unique:projects,project_name',
        'start_date' => 'nullable|date',
        'end_date' => 'nullable|date|after_or_equal:start_date',
        'client_name' => 'nullable|string|max:255',
        'client_email' => 'nullable|email|max:255',
    ];

    public function resetSearch()
    {
        $this->search = '';
    }

    public function loadDataInTable()
    {
        $search = '%' . strtolower(trim($this->search)) . '%';

        return DB::table('projects')
               ->select('projects.id','projects.status', 'projects.project_name', 'projects.priority', 'users.name as creator', 'projects.client_name', 'projects.client_email', 'projects.start_date', 'projects.end_date', 'projects.repository_url')
               ->join('users', 'projects.creator', '=', 'users.id')
               ->whereIn('users.role', ['product_owner', 'scrum_master'])
               ->whereRaw('LOWER(project_name) LIKE ?', [$search])
               ->orderByDesc('projects.id')
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
        $this->resetPage();
        $this->dispatch('projectSaved');
        $this->reset(['project_name', 'creator', 'status', 'start_date', 'end_date', 'client_name', 'client_email', 'repository_url', 'priority']);
        }

    public function delete($id)
    {
        // Truy vấn tên dự án trước khi xóa
        $projectName = DB::table('projects')->where('id', $id)->value('project_name');

        // Xóa dự án
        DB::table('projects')->where('id', '=', $id)->delete();
        $this->dispatch('projectSaved');

        // Kiểm tra xem dự án đã bị xóa chưa
        $projectExists = DB::table('projects')->where('project_name', $projectName)->exists();
        if (!$projectExists) {
            $this->resetSearch();
        }

        $this->resetPage();
    }

    public function updateStatus($id, $newStatus)
    {
       DB::table('projects')->where('id', $id)->update(['status' => $newStatus]);
        $this->dispatch('projectSaved');
       $this->dispatch('statusUpdate');
    }

    public function render()
    {
        $data = $this->loadDataInTable();
        return view('livewire.project',
            ['projects' => $data]);
    }
}
