<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Modules\Project\Models\Project as ProjectModel;

class Project extends Component
{
    public $project_name;
    public $description;
    public $product_owner_id;
    public $scrum_master_id;
    public $status = 'planning';
    public $start_date;
    public $end_date;
    public $estimated_duration;
    public $budget;
    public $client_name;
    public $client_email;
    public $repository_url;
    public $tags;
    public $priority;

    protected $rules = [
        'project_name' => 'required|string|max:255',
        'description' => 'required|string|max:65535',
        'product_owner_id' => 'required|exists:users,id',
        'scrum_master_id' => 'nullable|exists:users,id',
        'status' => 'required|in:planning,in_progress,on_hold,completed,cancelled',
        'start_date' => 'required|date',
        'end_date' => 'required|date|after_or_equal:start_date',
        'estimated_duration' => 'required|integer|min:1',
        'budget' => 'required|numeric|min:0',
        'client_name' => 'required|string|max:255',
        'client_email' => 'required|email|max:255',
        'repository_url' => 'required|url|max:255',
        'tags' => 'required|string',
        'priority' => 'required|integer|min:0',
    ];

    public function save()
    {
        $this->validate();

        ProjectModel::create([
            'project_name' => $this->project_name,
            'description' => $this->description,
            'product_owner_id' => $this->product_owner_id,
            'scrum_master_id' => $this->scrum_master_id,
            'status' => $this->status,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'estimated_duration' => $this->estimated_duration,
            'budget' => $this->budget,
            'client_name' => $this->client_name,
            'client_email' => $this->client_email,
            'repository_url' => $this->repository_url,
            'tags' => $this->tags,
            'priority' => $this->priority,
        ]);
}

    public function render()
    {
        $productOwners = User::where('role', 'product_owner')->get();
        $scrumMasters = User::where('role', 'scrum_master')->get();

        return view('livewire.project', [
            'productOwners' => $productOwners,
            'scrumMasters' => $scrumMasters,
        ]);
    }
}
