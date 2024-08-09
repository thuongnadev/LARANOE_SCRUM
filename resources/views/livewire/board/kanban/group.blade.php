<div
    x-sort:item="{{ $group->getKey() }}"
    @task-updated.window="$wire.$refresh"
    class="flex flex-col flex-shrink-0 self-start max-h-full w-80 bg-gray-100 dark:bg-gray-800 rounded-lg shadow-md overflow-hidden"
>
    <livewire:board.edit-group wire:key="edit-group-{{ $group->getKey() }}" :group="$group" />
    <div class="flex-1 min-h-0 overflow-y-auto">
        <div x-sort="$wire.sort($item, $position, {{ $group->getKey() }})" x-sort:group="groups" class="p-4 flex flex-col gap-3">
            @foreach($this->tasks as $task)
                <div
                    x-sort:item="{{ $task->getKey() }}"
                    class="cursor-pointer block p-4 bg-white dark:bg-gray-700 rounded-lg shadow-sm hover:shadow-md transition-shadow duration-200"
                    @click="$dispatch('edit-task', { task: {{ $task->getKey() }} })"
                >
                    <div class="flex items-start justify-between gap-2 mb-2">
                        <div class="flex-1 text-sm font-medium text-gray-900 dark:text-white">{{ $task->name }}</div>
                        <span class="inline-flex items-center justify-center w-6 h-6 text-xs font-bold text-white bg-blue-500 rounded-full">
                            <!-- Task priority or number -->
                        </span>
                    </div>
                    <div class="flex items-center justify-between text-xs text-gray-500 dark:text-gray-400">
                        <!-- Additional task info, e.g. due date, assignee -->
                        <span>Due: {{ \Carbon\Carbon::parse($task->end_date) ->format('d M') }}</span>
{{--                        <span>{{ $task->assigned_to ? $task->assignedUser->name : 'Unassigned' }}</span>--}}
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <livewire:board.add-task wire:key="add-task-{{ $group->getKey() }}" :group="$group" @task-created="$refresh" />
</div>
