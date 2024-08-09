<?php

namespace App\Livewire\Board\Kanban;

use Livewire\Component;
use Modules\Board\Models\SprintBacklog as Task;

class Card extends Component
{
    public Task $task;
    public $showDialog = false;

    public function render()
    {
        return view('livewire.board.kanban.card');
    }

    public function closeModal()
    {
        $this->showDialog = false;
    }
}
