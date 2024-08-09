<div x-sort:item="{{ $task->getKey() }}">
    <x-admin.board.dialog wire:model="showDialog">
        <x-admin.board.dialog.open>
            <x-board.kanban.card :task="$task" />
        </x-admin.board.dialog.open>
        <x-admin.board.dialog.panel>
            <livewire:board.edit-task wire:key="edit-task-{{ $task->getKey() }}" :task="$task" @task-updated="closeModal" />
        </x-admin.board.dialog.panel>
    </x-admin.board.dialog>
</div>
