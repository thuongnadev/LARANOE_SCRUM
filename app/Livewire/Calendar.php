<?php

namespace App\Livewire;

use Livewire\Component;
use Carbon\Carbon;
use Modules\Calendar\Models\Calendar as CalendarModel;

class Calendar extends Component
{
    public $events = [];
    public $title;
    public $start;
    public $end;

    public function mount()
    {
        $this->loadEvents();
    }

    public function loadEvents()
    {
        $this->events = CalendarModel::all()->map(function ($event) {
            return [
                'id' => $event->id,
                'title' => $event->title,
                'start' => Carbon::parse($event->start)->toIso8601String(),
                'end' => $event->end ? Carbon::parse($event->end)->toIso8601String() : null,
            ];
        })->toArray();
    }

    public function addEvent($title, $start, $end)
    {
        // $this->title = $title;
        // $this->start = $start;
        // $this->end = $end;

        CalendarModel::create([
            'title' => $title,
            'start' => $start,
            'end' => $end,
        ]);

        $this->loadEvents();
    }

    public function updateEvent($id, $start, $end)
    {
        // if (!$id) {
        //     return;
        // }

        // $this->start = $start;
        // $this->end = $end;

        $event = CalendarModel::find($id);
        if ($event) {
            $event->update([
                'start' => $start,
                'end' => $end,
            ]);

            $this->loadEvents();
        }
    }

    public function deleteEvent($id)
    {
        if (!$id) {
            return;
        }

        $event = CalendarModel::find($id);
        if ($event) {
            $event->delete();
            $this->loadEvents();
        }
    }

    public function render()
    {
        return view('livewire.calendar');
    }
}
