<div x-data="{ showEditGroupForm: false }" x-on:click.outside="showEditGroupForm = false" x-on:keyup.escape="showEditGroupForm = false" x-on:group-updated="showEditGroupForm = false" x-effect="$wire.resetForm(showEditGroupForm)" class="flex items-center justify-between h-10 p-5 mt-1">
    <button x-show="!showEditGroupForm" @click="showEditGroupForm = true; $nextTick(() => $refs.input.focus())" x-cloak type="button" class="block w-full text-left">
        <h3 class="flex-shrink-0 text-sm text-gray-100 font-medium -ml-[2px]">{{ $group->column_name }}</h3>
    </button>
    <template x-if="showEditGroupForm">
        <form wire:submit.prevent="update" class="pt-3 pb-1 grow -mt-2 -mx-3.5">
            <x-admin.board.text-input x-ref="input" wire:model="name" @class(['h-8 w-full text-sm font-medium bg-gray-400', 'ring-1 ring-rose-500 dark:ring-rose-400 focus-within:ring-rose-500 dark:focus-within:ring-rose-400' => $errors->has('name')]) />
        </form>
    </template>
</div>
