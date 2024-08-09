<?php

namespace App\Livewire\Board\Kanban;

use Modules\Board\Models\Column as Group;
use Modules\Board\Models\SprintBacklog as Task;
use App\View\Components\Admin\Board\Layout\KanbanLayout;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Attributes\Rule;
use Livewire\Component;

class Board extends Component
{
    #[Rule('required')]
    public string $name;

    #[Computed]
    public function groups()
    {
        return Group::inOrder()->get(); // Lấy các nhóm theo thứ tự sắp xếp
    }

    #[Layout(KanbanLayout::class)]
    public function render()
    {
        return view('livewire.board.kanban.board');
    }
    #[Layout(KanbanLayout::class)]
    public function store()
    {
        $this->validate();

        Group::create([
            'column_name' => $this->name,
        ]);

        $this->reset('name');
    }

    public function sort($groupId, $targetSortPosition)
    {
        $group = Group::find($groupId);
        $group->moveToPosition($targetSortPosition);
    }
}
