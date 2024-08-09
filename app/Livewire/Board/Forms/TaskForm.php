<?php

namespace App\Livewire\Board\Forms;

use Modules\Board\Models\SprintBacklog as Task;
use Livewire\Attributes\Validate;
use Livewire\Form;

class TaskForm extends Form
{
    public ?Task $task = null;

    #[Validate(['description' => 'required'], onUpdate: false)]
    public $description;

    public function setTask(Task $task)
    {
        $this->task = $task;
        $this->description = $task->name;
    }

    public function update()
    {
        $this->validate();

        $this->task->update([
            'name' => $this->description
        ]);
    }
}
