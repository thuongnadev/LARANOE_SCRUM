@props(['task'])

<a {{ $attributes->merge(['class' => 'block p-2 bg-white dark:bg-white/5 ring-1 ring-gray-950/10 dark:ring-white/20 rounded-md shadow']) }}>
    <span class="inline-flex items-center p-1 w-9 rounded-full bg-rose-500 dark:bg-rose-400">
        <!-- Icon or status indicator can go here -->
    </span>
    <div class="flex items-start justify-between gap-2">
        <div class="flex-1 text-xs text-gray-900 font-medium leading-snug">{{ $task->name }}</div>
    </div>
    <div class="flex items-baseline justify-between">
        <!-- Additional task info can go here -->
    </div>
</a>

