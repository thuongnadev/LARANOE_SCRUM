<?php

namespace App\Livewire\Board;

use Livewire\Component;
use Modules\Board\Models\Column as Group;
use Modules\Board\Models\SprintBacklog as Task;
use Livewire\Attributes\Validate;

class AddTask extends Component
{
    #[Validate(['description' => 'required'])]
    public string $description;

    public Group $group;

    public function render()
    {
        return view('livewire.board.add-task');
    }

    public function store()
    {
        $this->validate();

        $this->group->tasks()->create([
            'name' => $this->description,
            'order' => $this->group->tasks()->max('order') + 1 // Lấy thứ tự lớn nhất và tăng thêm 1
        ]);

        $this->reset(); // Reset form sau khi tạo task

        $this->dispatch('task-created'); // Dispatch sự kiện khi task mới được tạo
    }
}
