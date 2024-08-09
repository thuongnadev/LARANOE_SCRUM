<x-admin.board.dialog wire:model="showDialog" @keyup.escape="open = false">
    <x-admin.board.dialog.panel>
        <div class="mt-4" x-effect="$wire.resetDialogForm(open)">
            <form wire:submit.prevent="update">
                <x-admin.board.text-input wire:model="form.description" placeholder="Task description" autofocus />
                @error('form.description')
                <span class="text-rose-500 dark:text-rose-400 text-sm pt-1">
                    {{ $message }}
                </span>
                @enderror
                <div class="flex items-center justify-start gap-2 pt-2">
                    <x-admin.board.primary-button>
                        Save
                    </x-admin.board.primary-button>
                    <x-admin.board.secondary-button @click="open = false" type="button">
                        Cancel
                    </x-admin.board.secondary-button>
                </div>
            </form>
        </div>
    </x-admin.board.dialog.panel>
</x-admin.board.dialog>
