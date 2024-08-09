<?php

namespace App\Livewire\Board;

use Livewire\Component;
use Modules\Board\Models\Column as Group;
use Livewire\Attributes\Validate;

class EditGroup extends Component
{
    #[Validate(['name' => 'required'])]
    public string $name;

    public Group $group;

    public function mount(Group $group)
    {
        $this->group = $group;
        $this->name = $group->column_name; // Đảm bảo khởi tạo với dữ liệu đúng
    }

    public function render()
    {
        return view('livewire.board.edit-group');
    }

    public function update()
    {
        $this->validate();

        $this->group->update([
            'column_name' => $this->name
        ]);

        $this->dispatch('group-updated'); // Dispatch sự kiện khi nhóm được cập nhật
    }

    public function resetForm(bool $isEditing)
    {
        if (!$isEditing) {
            $this->name = $this->group->column_name; // Reset tên nhóm nếu không còn đang chỉnh sửa
        }
    }
}
