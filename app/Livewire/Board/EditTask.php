<?php

namespace App\Livewire\Board;

use App\Livewire\Board\Forms\TaskForm;
use Modules\Board\Models\SprintBacklog as Task;
use Livewire\Attributes\On;
use Livewire\Component;

class EditTask extends Component
{
    public bool $showDialog = false;
    public TaskForm $form;

    public function render()
    {
        return view('livewire.board.edit-task');
    }

    public function update()
    {
        $this->form->update();

        $this->showDialog = false; // Đóng dialog sau khi cập nhật
        $this->dispatch('task-updated'); // Dispatch sự kiện khi task được cập nhật
    }

    #[On('edit-task')]
    public function setTask(Task $task)
    {
        $this->form->setTask($task);
        $this->showDialog = true; // Mở dialog khi set task
    }

    public function resetDialogForm(bool $isOpen)
    {
        if (!$isOpen) {
            $this->form->reset(); // Reset form khi dialog đóng
            $this->form->resetErrorBag(); // Xóa lỗi đã được đặt trên form
        }
    }
}
