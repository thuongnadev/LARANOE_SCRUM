<?php

namespace App\Livewire;

use Carbon\Carbon;
use Livewire\Component;
use Modules\Sprint\Models\Sprint as ModelsSprint;
use Modules\Calendar\Models\Calendar as CalendarModel;

class Sprint extends Component
{
    public $sprints;
    public $sprint_name;
    public $duration;
    public $start_date;
    public $end_date;
    public $goal;
    public $startingSprintId = null;

    public function mount()
    {
        // Load sprints when the component is mounted
        $this->sprints = ModelsSprint::all();
    }

    public function loadSprints()
    {
        $this->sprints = ModelsSprint::all();
    }

    public function updatedStartDate($value)
    {
        $this->calculateEndDate();
    }

    public function updatedDuration($value)
    {
        $this->calculateEndDate();
    }

    public function calculateEndDate()
    {
        if ($this->start_date && $this->duration) {
            $startDate = Carbon::parse($this->start_date);
            switch ($this->duration) {
                case 7: // 1 week
                    $this->end_date = $startDate->addWeek()->format('Y-m-d\TH:i');
                    break;
                case 14: // 2 weeks
                    $this->end_date = $startDate->addWeeks(2)->format('Y-m-d\TH:i');
                    break;
                case 30: // 1 month (approximated as 30 days)
                    $this->end_date = $startDate->addMonth()->format('Y-m-d\TH:i');
                    break;
                default:
                    $this->end_date = null;
                    break;
            }
        } else {
            $this->end_date = null; // Reset if necessary
        }
    }

    public function createSprint()
    {
        $this->calculateEndDate();

        \Log::info('Creating Sprint:', [
            'sprint_name' => $this->sprint_name,
            'duration' => $this->duration,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'goal' => $this->goal,
        ]);

        ModelsSprint::create([
            'sprint_name' => $this->sprint_name,
            'duration' => $this->duration,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'goal' => $this->goal,
        ]);

        $this->reset(['sprint_name', 'duration', 'start_date', 'end_date', 'goal']);
        $this->sprints = ModelsSprint::all();
    }

    public function startSprint($sprintId)
    {
        $this->startingSprintId = $sprintId;

        $sprint = ModelsSprint::find($sprintId);
        if ($sprint) {
            $eventTitle = 'Inventory ' . $sprint->id;
            CalendarModel::create([
                'user_id' => auth()->id(),
                'title' => $eventTitle,
                'description' => $sprint->goal,
                'start' => Carbon::parse($sprint->start_date)->format('Y-m-d H:i:s'),
                'end' => $sprint->end_date ? Carbon::parse($sprint->end_date)->format('Y-m-d H:i:s') : null,
                'backgroundColor' => '#3788d8',
            ]);

            $this->dispatch('refreshCalendar');
        }
        $this->sprints = ModelsSprint::all();
        $this->startingSprintId = null;
    }

    public function render()
    {
        return view('livewire.sprint', [
            'sprints' => $this->sprints
        ]);
    }
}
