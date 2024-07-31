<?php

namespace App\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ProjectSideBar extends Component
{
    protected $listeners = ['projectSaved' => 'refreshData'];
    public $highPriorityProjects;
    public $processingProjects;
    public $completedProjects;
    public $priorityProjects;

    public $statusProjects;

    public function mount()
    {
        $this->refreshData();
    }

    public function refreshData()
    {
        $this->priorityProjects = [
            'high' => [
                'projects' => $this->loadPriorityHigh(),
                'count' => $this->countPriorityHigh(),
            ],
            'medium' => [
                'projects' => $this->loadPriorityMedium(),
                'count' => $this->countPriorityMedium(),
            ],
            'low' => [
                'projects' => $this->loadPriorityLow(),
                'count' => $this->countPriorityLow(),
            ],
        ];
        $this->statusProjects = [
            'not_started' => [
                'projects' => $this->loadStatusNotStarted(),
                'count' => $this->countStatusNotStarted(),
            ],
            'processing' => [
                'projects' => $this->loadStatusProcessing(),
                'count' => $this->countStatusProcessing(),
            ],
            'completed' => [
                'projects' => $this->loadStatusCompleted(),
                'count' => $this->countStatusCompleted(),
            ],
        ];
    }

    public function loadPriorityHigh()
    {
        return DB::table('projects')
            ->select('id', 'project_name', 'priority')
            ->where('priority', '=', '2')
            ->get();
    }

    public function countPriorityHigh(){
        return DB::table('projects')
            ->select('id', 'project_name', 'priority')
            ->where('priority', '=', '2')
            ->count();
    }

    public function loadPriorityMedium()
    {
        return DB::table('projects')
            ->select('id', 'project_name', 'priority')
            ->where('priority', '=', '1')
            ->get();
    }

    public function countPriorityMedium(){
        return DB::table('projects')
            ->select('id', 'project_name', 'priority')
            ->where('priority', '=', '1')
            ->count();
    }

    public function loadPriorityLow()
    {
        return DB::table('projects')
            ->select('id', 'project_name', 'priority')
            ->where('priority', '=', '0')
            ->get();
    }

    public function countPriorityLow(){
        return DB::table('projects')
            ->select('id', 'project_name', 'priority')
            ->where('priority', '=', '0')
            ->count();
    }

    public function loadStatusNotStarted()
    {
        return DB::table('projects')
            ->select('id', 'project_name', 'status')
            ->where('status', '=', '0')
            ->get();
    }

    public function countStatusNotStarted(){
        return DB::table('projects')
            ->select('id', 'project_name', 'status')
            ->where('status', '=', '0')
            ->count();
    }

    public function loadStatusProcessing()
    {
        return DB::table('projects')
            ->select('id', 'project_name', 'status')
            ->where('status', '=', '1')
            ->get();
    }

    public function countStatusProcessing(){
        return DB::table('projects')
            ->select('id', 'project_name', 'status')
            ->where('status', '=', '1')
            ->count();
    }

    public function loadStatusCompleted()
    {
        return DB::table('projects')
            ->select('id', 'project_name', 'status')
            ->where('status', '=', '2')
            ->get();
    }

    public function countStatusCompleted(){
        return DB::table('projects')
            ->select('id', 'project_name', 'status')
            ->where('status', '=', '2')
            ->count();
    }


    public function render()
    {
        return view('livewire.project-side-bar', [
            'highPriorityProjects' => $this->highPriorityProjects,
            'processingProjects' => $this->processingProjects,
            'completedProjects' => $this->completedProjects,
        ]);
    }
}
