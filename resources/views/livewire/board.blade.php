<div class="max-w-7xl mx-auto p-6">
    <div class="bg-white rounded-2xl shadow-2xl p-8">
        <div class="flex overflow-x-auto space-x-6 p-6 bg-gray-100 min-h-screen" id="kanban-board">
            @foreach($columns as $column)
                <div class="flex-shrink-0 w-72" data-column-id="{{ $column->id }}">
                    <div class="bg-gray-200 rounded-lg shadow-md">
                        <h3 class="px-4 py-3 font-bold text-lg text-gray-800 border-b border-gray-300">{{ $column->column_name }}</h3>
                        <div class="p-4 min-h-[200px]" id="column-{{ $column->id }}" ondrop="onDrop(event, {{ $column->id }})" ondragover="allowDrop(event)">
                            @foreach($tasks[$column->id] ?? [] as $task)
                                <div class="bg-white rounded-lg shadow p-4 mb-3 cursor-move"
                                     draggable="true"
                                     ondragstart="onDragStart(event, {{ $task['id'] }}, {{ $column->id }})"
                                     data-sprint-backlog-id="{{ $task['id'] }}">
                                    <h4 class="font-semibold text-gray-800">{{ $task['name'] }}</h4>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        function allowDrop(ev) {
            ev.preventDefault();
        }

        function onDragStart(ev, taskId, columnId) {
            ev.dataTransfer.setData("text/plain", JSON.stringify({ taskId: taskId, columnId: columnId }));
        }

        function onDrop(ev, targetColumnId) {
            ev.preventDefault();
            const data = JSON.parse(ev.dataTransfer.getData("text/plain"));
            const taskId = data.taskId;
            const sourceColumnId = data.columnId;

            if (targetColumnId !== sourceColumnId) {
                const taskElement = document.querySelector(`[data-sprint-backlog-id='${taskId}']`);
                ev.target.appendChild(taskElement);
            @this.call('updateTaskColumn', taskId, targetColumnId)
            }
        }

        window.allowDrop = allowDrop;
        window.onDragStart = onDragStart;
        window.onDrop = onDrop;
    });

</script>
