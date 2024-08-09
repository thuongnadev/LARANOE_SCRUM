<?php

namespace App\Livewire\Board;

use Livewire\Component;
use Modules\Board\Models\Column as Group;
use Livewire\Attributes\Validate;

class AddGroup extends Component
{
    #[Validate(['name' => 'required'])]
    public string $name;

    public function render()
    {
        return view('livewire.board.add-group');
    }

    public function store()
    {
        $this->validate();

        Group::create([
            'column_name' => $this->name,
            'order' => Group::max('order') + 1 // Đảm bảo thứ tự cho cột mới
        ]);

        $this->reset(); // Reset các thuộc tính form

        $this->dispatch('group-created'); // Dispatch sự kiện khi nhóm mới được tạo
    }
}
