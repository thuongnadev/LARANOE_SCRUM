<?php

namespace App\Livewire;

use Carbon\Carbon;
use Livewire\Component;
use Modules\ListBoard\Models\Column;
use Modules\ListBoard\Models\SprintBacklog;

class ListBoard extends Component
{
    public $sprintBacklogs = [];

    public function mount()
    {
        $this->loadSprintBacklogs();
    }

    public function loadSprintBacklogs()
    {
        $this->sprintBacklogs = SprintBacklog::all();
    }

    public function addSprintBacklog($title, $type, $created_at, $start_day, $end_day, $status, $column_id)
    {
        SprintBacklog::create([
            'name' => $title,
            'type' => $type,
            'created_at' => Carbon::parse($created_at),
            'start_date' => Carbon::parse($start_day),
            'end_date' => Carbon::parse($end_day),
            'status' => $status,
            'column_id' => $column_id,
        ]);

        $this->loadSprintBacklogs();
    }

    public function render()
    {
        return view('livewire.list-board');
    }
}
