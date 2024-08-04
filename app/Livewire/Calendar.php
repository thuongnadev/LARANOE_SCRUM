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
    public $backgroundColor;

    protected $listeners = [
        'addEvent',
        'updateEvent',
        'deleteEvent'
    ];

    public function mount()
    {
        $this->loadEvents();
    }

    public function loadEvents()
    {
        $this->events = CalendarModel::with('user')->get()->map(function ($event) {
            return [
                'id' => $event->id,
                'title' => $event->title,
                'description' => $event->description,
                'start' => Carbon::parse($event->start)->toIso8601String(),
                'end' => $event->end ? Carbon::parse($event->end)->toIso8601String() : null,
                'backgroundColor' => $event->backgroundColor,
                'created_at' => $event->created_at->format('Y-m-d H:i:s'),
                'created_by' => $event->user ? $event->user->name : 'Unknown',
            ];
        })->toArray();
    }

    public function addEvent($id, $title, $description, $start, $end, $backgroundColor = '#3788d8')
    {
        $event = CalendarModel::create([
            'user_id' => auth()->id(),
            'title' => $title,
            'description' => $description, 
            'start' => Carbon::parse($start)->format('Y-m-d H:i:s'),
            'end' => $end ? Carbon::parse($end)->format('Y-m-d H:i:s') : null,
            'backgroundColor' => $backgroundColor,
        ]);

        $this->dispatch('eventAdded', [
            'id' => $event->id,
            'title' => $event->title,
            'description' => $event->description, 
            'start' => Carbon::parse($event->start)->toIso8601String(),
            'end' => $event->end ? Carbon::parse($event->end)->toIso8601String() : null,
            'backgroundColor' => $event->backgroundColor,
            'created_at' => $event->created_at->format('Y-m-d H:i:s'),
            'created_by' => auth()->user()->name
        ]);
        $this->loadEvents();
        return $event;
    }

    public function updateEvent($id, $title, $description, $start, $end, $backgroundColor)
    {
        $event = CalendarModel::find($id);

        if ($event) {
            \Log::info("Updating event ID: $id, Des:$description ,Start: $start, End: $end, Background Color: $backgroundColor, Description: $description");
            $event->update([
                'title' => $title,
                'description' => $description,
                'start' => Carbon::parse($start)->format('Y-m-d H:i:s'),
                'end' => $end ? Carbon::parse($end)->format('Y-m-d H:i:s') : null,
                'backgroundColor' => $backgroundColor
            ]);

            $this->dispatch('eventUpdated', [
                'id' => $event->id,
                'title' => $event->title,
                'description' => $event->description, // Ensure description is dispatched
                'start' => Carbon::parse($event->start)->toIso8601String(),
                'end' => $event->end ? Carbon::parse($event->end)->toIso8601String() : null,
                'backgroundColor' => $event->backgroundColor,
                'created_at' => $event->created_at->toIso8601String(),
                'created_by' => $event->user ? $event->user->name : 'Unknown',
            ]);
            $this->loadEvents();
        } else {
            \Log::error("Event with ID: $id not found");
        }
    }

    public function deleteEvent($id)
    {
        $event = CalendarModel::find($id);
        if ($event) {
            $event->delete();
            $this->dispatch('eventDeleted', ['id' => $id]);
            $this->loadEvents();
        }
    }

    public function render()
    {
        return view('livewire.calendar');
    }
}
