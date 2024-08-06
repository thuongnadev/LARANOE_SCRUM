function sortableColumns() {
    return {
        init() {
            new Sortable(this.$el, {
                animation: 150,
                ghostClass: 'bg-blue-100',
                onEnd: ({ oldIndex, newIndex }) => {
                    if (oldIndex !== newIndex) {
                        this.$wire.call('reorderColumns', oldIndex, newIndex);
                    }
                },
            });
        }
    }
}
