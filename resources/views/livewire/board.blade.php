<div>
    <div class="container mx-auto rounded-lg p-2">
        <div class="grid grid-cols-6 gap-4 mt-2">

            <!-- Add Column -->
            <div
                class="w-block flex justify-items-center content-center items-center justify-content-between">
                <div>
                    <div id="tooltip-left" role="tooltip"
                         class="absolute z-50 invisible inline-block px-3 py-2 text-sm font-medium text-black transition-opacity duration-300 bg-white-600 rounded-lg shadow-lg opacity-0 tooltip dark:bg-white-700">
                        <span class="block font-semibold mb-1">Create Column</span>
                        <div class="tooltip-arrow" data-popper-arrow></div>
                    </div>

                    <div class="relative" x-cloak x-data="{ isEditing: false }">
                        <!-- Button -->
                        <button
                            x-show="!isEditing"
                            @click="isEditing = true"
                            data-tooltip-target="tooltip-left"
                            data-tooltip-placement="left"
                            type="button"
                            class="h-12 w-12 min-w-12 cursor-pointer rounded-lg text-xl gap-2 text-white bg-gradient-to-br from-green-400 to-blue-600 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-green-200 dark:focus:ring-green-800 font-medium px-3 py-2 text-center me-2 mb-2 flex items-center justify-center transition-all duration-300"
                        >
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                 stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M12 4.5v15m7.5-7.5h-15"/>
                            </svg>
                        </button>

                        <!-- Input và buttons -->
                        <div x-show="isEditing" class="flex flex-col space-y-2 w-60">
                            <input
                                type="text"
                                wire:model="columnName"
                                class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Enter column name"
                            >
                            <div class="flex justify-between space-x-2">
                                <button
                                    @click="isEditing = false"
                                    class="flex-1 p-2 text-gray-500 bg-white rounded-lg hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 shadow-md hover:shadow-lg transition-shadow duration-300"
                                >
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                         stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mx-auto">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M6 18L18 6M6 6l12 12"/>
                                    </svg>
                                </button>
                                <button
                                    @click="isEditing = false"
                                    wire:click="addColumn"
                                    class="flex-1 p-2 text-white bg-green-500 rounded-lg hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-300 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800 shadow-md hover:shadow-lg transition-shadow duration-300"
                                >
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                         stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mx-auto">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M4.5 12.75l6 6 9-13.5"/>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- SearchBox -->
            <div class="col-start-1 col-end-3">

                <!-- SearchBox -->
                <div class="max-w-sm">
                    <div class="relative" data-hs-combo-box='{
                        "groupingType": "default",
                        "isOpenOnFocus": true,
                        "apiGroupField": "category",
                        "outputItemTemplate": "<div data-hs-combo-box-output-item><span class=\"flex items-center cursor-pointer py-2 px-4 w-full text-sm text-gray-800 hover:bg-gray-100 dark:bg-neutral-800 dark:hover:bg-neutral-700 dark:text-neutral-200\"><div class=\"flex items-center w-full\"><div class=\"flex items-center justify-center rounded-full bg-gray-200 size-6 overflow-hidden me-2.5\"><img class=\"shrink-0\" data-hs-combo-box-output-item-attr=&apos;[{\"valueFrom\": \"image\", \"attr\": \"src\"}, {\"valueFrom\": \"name\", \"attr\": \"alt\"}]&apos; /></div><div data-hs-combo-box-output-item-field=\"name\" data-hs-combo-box-search-text data-hs-combo-box-value></div></div><span class=\"hidden hs-combo-box-selected:block\"><svg class=\"shrink-0 size-3.5 text-blue-600 dark:text-blue-500\" xmlns=\"http:.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><polyline points=\"20 6 9 17 4 12\"></polyline></svg></span></span></div>",
                        "groupingTitleTemplate": "<div class=\"text-xs uppercase text-gray-500 m-3 mb-1 dark:text-neutral-500\"></div>"
                    }'>
                        <div class="relative">
                            <div class="absolute inset-y-0 start-0 flex items-center pointer-events-none z-20 ps-3.5">
                                <svg class="shrink-0 size-4 text-gray-600 dark:text-white/60"
                                     xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round">
                                    <circle cx="11" cy="11" r="8"></circle>
                                    <path d="m21 21-4.3-4.3"></path>
                                </svg>
                            </div>
                            <input
                                class="py-3 ps-10 pe-4 block w-full border-gray-500 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                type="text" role="combobox" aria-expanded="false" placeholder="Search...." value=""
                                data-hs-combo-box-input="">
                        </div>
                    </div>
                </div>
                <!-- End SearchBox -->
            </div>
            <!-- Complete Sprint And Dropdown menu -->
            <div class="col-end-7 col-span-2 flex justify-content-end gap-3">

                <!-- Complete Sprint -->
                <button type="button"
                        class="py-3 px-4 text-white shadow-lg bg-gradient-to-br from-green-400 to-blue-600 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-green-200 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
                    Complete Sprint
                </button>
                <!-- Dropdown menu -->
                <div id="dropdown123">
                    <button id="dropdownMenuIconHorizontalButton" data-dropdown-toggle="dropdownDotsHorizontal"
                            class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700"
                            type="button">
                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                             viewBox="0 0 16 3">
                            <path
                                d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z"/>
                        </svg>
                    </button>
                    <div id="dropdownDotsHorizontal"
                         class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-32 dark:bg-gray-700 dark:divide-gray-600">
                        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                            aria-labelledby="dropdownMenuIconHorizontalButton">
                            <li>
                                <a href="#"
                                   class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Edit
                                    sprint</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>


            <!-- Column -->
            <div class="col-start-1 col-end-7 mt-5 mb-2">
                <div class="bg-white leaflet-marker-shadow">
                    <div x-data="sortableColumns()" x-init="init()"
                         class="flex overflow-x-auto whitespace-nowrap space-x-4">
                        @foreach($columns as $columnId => $columnData)
                            <div x-sortable-item="{{ $columnData->first()->column_id }}"
                                 draggable="true"
                                 class="inline-block p-4 bg-white shadow rounded-lg min-w-[300px] max-w-sm bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">

                                <!-- Name Column -->
                                <div x-data="{ editing: false, columnName: '{{ strtoupper($columnData->first()->column_name) }}', originalColumnName: '' }" class="flex justify-between items-center mb-3">
                                    <p
                                        x-show="!editing"
                                        @click="editing = true"
                                        class="ms-5 text-sm text-black text-xl font-semibold title-text cursor-pointer"
                                    >
                                        {{ strtoupper($columnData->first()->column_name) }}
                                    </p>
                                    <div class="flex-grow" x-show="editing" x-cloak>
                                        <input
                                            type="text"
                                            x-model="columnName"
                                            class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            placeholder="Enter column name"
                                        >
                                        <div class="flex justify-end space-x-2 mt-2">
                                            <button
                                                @click="editing = false;"
                                                class="p-2 text-gray-500 bg-white rounded-lg hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 shadow-md hover:shadow-lg transition-shadow duration-300"
                                            >
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mx-auto">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                                                </svg>
                                            </button>
                                            <button
                                                @click="editing = false; $wire.updateColumn({{ $columnData->first()->column_id }}, columnName).then(() => { originalColumnName })"
                                                class="p-2 text-white bg-blue-500 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 shadow-md hover:shadow-lg transition-shadow duration-300"
                                            >
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mx-auto">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"/>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>

                                    <div class="relative" x-data="{ open: false }" x-show="!editing">
                                        <button @click="open = !open" class="inline-block p-2 text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm" type="button">
                                            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 3">
                                                <path d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z"/>
                                            </svg>
                                        </button>
                                        <div x-show="open" @click.away="open = false" x-cloak class="absolute right-0 z-10 mt-2 bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                                            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200">
                                                <li>
                                                    <a href="#" wire:click="deleteColumn({{ $columnData->first()->column_id }})" @click="open = false" class="block px-4 py-2 hover:bg-red-100 dark:hover:bg-red-600 dark:hover:text-white">Delete</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>


                                <div x-data="{
                                        dragOver: false,
                                        dropTask(taskId) {
                                            $wire.updateTaskColumn(taskId, {{ $columnData->first()->column_id }})
                                        }
                                    }"
                                    @dragover.prevent="dragOver = true"
                                    @dragleave.prevent="dragOver = false"
                                    @drop.prevent="dragOver = false; dropTask($event.dataTransfer.getData('text/plain'))"
                                    :class="{ 'bg-gray-100': dragOver }"
                                    class="min-h-[50px] p-2"
                                >
                                    <!-- Tasks -->
                                    @foreach($columnData as $task)
                                        @if($task->task_id)
                                            <div
                                                draggable="true"
                                                @dragstart="event.dataTransfer.setData('text/plain', {{ $task->task_id }})"
                                                wire:key="task-{{ $task->task_id }}"
                                                class="border border-gray-200 rounded-lg shadow-sm m-2 p-2 bg-gray-200">
                                                <!-- Title Task -->
                                                <div class="flex justify-content-between align-items-center mb-3">
                                                    <p class="group ms-2 text-lg text-black font-medium inline-flex items-center justify-center relative cursor-pointer task-name">
                                                        <span
                                                            class="group-hover:underline">{{ $task->task_name }}</span>
                                                        <span
                                                            class="absolute bottom-full left-1/2 transform -translate-x-1/2 bg-gray-800 text-white text-xs rounded py-1 px-2 opacity-0 group-hover:opacity-100 transition-opacity duration-300 pointer-events-none">Edit</span>
                                                    </p>
                                                    <input
                                                        class="p-2 m-2 block w-full border-gray-500 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600 hidden task-input"
                                                        type="text" value="Task 1">
                                                    <div x-data="{ open: false }" x-ref="dropdown{{ $task->task_id }}"
                                                         class="relative">
                                                        <button @click="open = !open"
                                                                class="inline-block p-2 m-2 text-gray-500 dark:text-gray-400 bg-gray-100 hover:bg-gray-100 hover:border-white dark:hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-1.5 action-button"
                                                                type="button">
                                                            <svg class="w-5 h-5" aria-hidden="true"
                                                                 xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                                 viewBox="0 0 16 3">
                                                                <path
                                                                    d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z"/>
                                                            </svg>
                                                        </button>
                                                        <div x-show="open" @click.away="open = false" x-cloak
                                                             class="absolute right-0 z-10 mt-2 bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                                                            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200">
                                                                <li>
                                                                    <a wire:click="deleteTask({{ $task->task_id }})"
                                                                       class=" cursor-pointer block px-4 py-2 hover:bg-red-100 dark:hover:bg-red-600 dark:hover:text-white">Delete</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>

                                                </div>
                                                <!-- Sprint And Avatar -->
                                                <div class="flex justify-content-between align-items-center">

                                                    <div class="flex justify-content-start gap-0 align-items-center">
                                                        @if($task->type_task == 'task')
                                                            <div class="relative group">
                                                                <button
                                                                    data-tooltip-target="task-{{ $task->task_id }}"
                                                                    data-tooltip-placement="bottom" type="button"
                                                                    class="ms-2 w-20px inline-flex justify-center align-items-center h-20px text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                                                >
                                                                    <svg class="shrink-0 size-3 text-white"
                                                                         xmlns="http://www.w3.org/2000/svg" width="24"
                                                                         height="24" viewBox="0 0 24 24" fill="none"
                                                                         stroke="currentColor" stroke-width="2"
                                                                         stroke-linecap="round" stroke-linejoin="round">
                                                                        <path d="M9 11l3 3L22 4"/>
                                                                        <path d="M4 20h7"/>
                                                                        <path d="M4 16h4"/>
                                                                    </svg>
                                                                </button>
                                                            </div>
                                                            <div id="task-{{ $task->task_id }}" role="tooltip"
                                                                 class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                                                Task
                                                                <div class="tooltip-arrow" data-popper-arrow></div>
                                                            </div>
                                                        @elseif($task->type_task == 'bug')
                                                            <div class="relative group">
                                                                <button
                                                                    data-tooltip-target="bug-{{ $task->task_id }}"
                                                                    data-tooltip-placement="bottom" type="button"
                                                                    class="w-20px inline-flex justify-center align-items-center h-20px text-white bg-red-500 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                                                >
                                                                    <svg class="shrink-0 size-3 text-white"
                                                                         xmlns="http://www.w3.org/2000/svg" width="24"
                                                                         height="24" viewBox="0 0 24 24" fill="none"
                                                                         stroke="currentColor" stroke-width="2"
                                                                         stroke-linecap="round" stroke-linejoin="round">
                                                                        <path d="M19 9l-2 2-2-2"/>
                                                                        <path d="M5 9l2 2 2-2"/>
                                                                        <path d="M12 19v-8"/>
                                                                        <path d="M3 13l1 2h16l1-2"/>
                                                                        <path
                                                                            d="M18 20H6a1 1 0 0 1-1-1v-7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1Z"/>
                                                                    </svg>
                                                                </button>
                                                            </div>
                                                            <div id="bug-{{ $task->task_id }}" role="tooltip"
                                                                 class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                                                Bug
                                                                <div class="tooltip-arrow" data-popper-arrow></div>
                                                            </div>
                                                        @elseif($task->type_task == 'story')
                                                            <div class="relative group">
                                                                <button
                                                                    data-tooltip-target="story-{{ $task->task_id }}"
                                                                    data-tooltip-placement="bottom" type="button"
                                                                    class="w-20px inline-flex justify-center align-items-center h-20px text-white bg-green-500 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                                                >
                                                                    <svg class="shrink-0 size-3 text-white"
                                                                         xmlns="http://www.w3.org/2000/svg" width="24"
                                                                         height="24" viewBox="0 0 24 24" fill="none"
                                                                         stroke="currentColor" stroke-width="2"
                                                                         stroke-linecap="round" stroke-linejoin="round">
                                                                        <path
                                                                            d="M2 7h20M2 7v15a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V7"/>
                                                                        <path d="M2 7V5a2 2 0 0 1 2-2h4"/>
                                                                        <path d="M20 7V5a2 2 0 0 0-2-2h-4"/>
                                                                        <path d="M7 13h10"/>
                                                                        <path d="M7 17h10"/>
                                                                    </svg>
                                                                </button>
                                                            </div>
                                                            <div id="story-{{ $task->task_id }}" role="tooltip"
                                                                 class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                                                Story
                                                                <div class="tooltip-arrow" data-popper-arrow></div>
                                                            </div>
                                                        @endif
                                                        <p class="text-lg ms-2 font-semibold text-gray-900 dark:text-white">
                                                            Sprint 1</p>
                                                    </div>
                                                    <div class="flex -space-x-4 rtl:space-x-reverse">
                                                        <img
                                                            class="w-10 h-10 p-1 rounded-full ring-2 ring-gray-300 dark:ring-gray-500"
                                                            src="https://i.pinimg.com/564x/3b/2d/57/3b2d577ddd1d4b56aba582f878327954.jpg"
                                                            alt="Bordered avatar">
                                                    </div>

                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                                <!-- Issue -->
                                <div x-data="{ showForm: false }" class="relative" @click.away="showForm = false">
                                    <button type="button"
                                            x-show="!showForm"
                                            @click="showForm = true"
                                            class="group w-100 h-10 text-lg m-2 block rounded-lg font-semibold text-gray-900 bg-white inline-flex items-center gap-x-2 text-sm font-medium">
                                        <span
                                            class="w-full h-full flex items-center rounded-lg group-hover:bg-gray-200">
                                            <svg class="ms-2 me-2 w-6 h-6 text-black dark:text-white" aria-hidden="true"
                                                 xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                                 viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                      stroke-linejoin="round" stroke-width="2" d="M5 12h14m-7 7V5"/>
                                            </svg>
                                            Create issue
                                        </span>
                                    </button>

                                    <!-- Create issue -->
                                    <div x-show="showForm" x-cloak
                                         x-transition:enter="transition ease-out duration-300"
                                         x-transition:enter-start="opacity-0 transform scale-90"
                                         x-transition:enter-end="opacity-100 transform scale-100"
                                         x-transition:leave="transition ease-in duration-300"
                                         x-transition:leave-start="opacity-100 transform scale-100"
                                         x-transition:leave-end="opacity-0 transform scale-90"
                                         class=" top-full left-0 w-full bg-white m-2 border-2 border-blue-500 rounded-lg dark:bg-gray-800 dark:border-gray-700 p-4">
                                        <input
                                            id="message"
                                            wire:model="name"
                                            placeholder="What needs to be done?"
                                            class="block p-2.5 w-full text-sm text-gray-900 bg-white rounded-lg mb-4 focus:outline-none focus:ring-0 focus:border-gray-300 dark:focus:border-gray-600"
                                        />

                                        <div class="flex justify-content-between align-items-center gap-8">
                                            <!-- Select -->
                                            <div wire:ignore>
                                                <select id="typeSelect" data-hs-select='{
                                                "placeholder": "Select option...",
                                                "toggleTag": "<button type=\"button\" aria-expanded=\"false\"><span class=\"me-2\" data-icon></span></button>",
                                                "toggleClasses": "hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50 relative py-3 px-4 pe-9 flex items-center text-nowrap w-full cursor-pointer bg-white border border-gray-200 rounded-lg text-start text-sm focus:border-blue-500 focus:ring-blue-500 before:absolute before:inset-0 before:z-[1] dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-neutral-600",
                                                "dropdownClasses": "mt-2 z-50 w-full max-h-72 p-1 space-y-0.5 bg-white border border-gray-200 rounded-lg overflow-hidden overflow-y-auto [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300 dark:[&::-webkit-scrollbar-track]:bg-neutral-700 dark:[&::-webkit-scrollbar-thumb]:bg-neutral-500 dark:bg-neutral-900 dark:border-neutral-700",
                                                "optionClasses": "py-2 px-4 w-full text-sm text-gray-800 cursor-pointer hover:bg-gray-100 rounded-lg focus:outline-none focus:bg-gray-100 dark:bg-neutral-900 dark:hover:bg-neutral-800 dark:text-neutral-200 dark:focus:bg-neutral-800",
                                                "optionTemplate": "<div><div class=\"flex items-center\"><div class=\"me-2\" data-icon></div><div class=\"font-semibold text-gray-800 dark:text-neutral-200 \" data-title></div></div><div class=\"mt-1.5 text-sm text-gray-500 dark:text-neutral-500 \" data-description></div></div>",
                                                "extraMarkup": "<div class=\"absolute top-1/2 end-3 -translate-y-1/2\"><svg class=\"shrink-0 size-3.5 text-gray-500 dark:text-neutral-500 \" xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><path d=\"m7 15 5 5 5-5\"/><path d=\"m7 9 5-5 5 5\"/></svg></div>"
                                            }' wire:model="type">
                                                    <option value="">Choose</option>
                                                    <option value="task" selected="" data-hs-select-option='{
                                                    "icon": "<svg class=\"shrink-0 size-4 text-gray-800 dark:text-neutral-200 \" xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><path d=\"M9 11l3 3L22 4\"/><path d=\"M4 20h7\"/><path d=\"M4 16h4\"/></svg>"
                                                }'>Task
                                                    </option>
                                                    <option value="bug" data-hs-select-option='{
                                                    "icon": "<svg class=\"shrink-0 size-4 text-gray-800 dark:text-neutral-200 \" xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><path d=\"M19 9l-2 2-2-2\"/><path d=\"M5 9l2 2 2-2\"/><path d=\"M12 19v-8\"/><path d=\"M3 13l1 2h16l1-2\"/><path d=\"M18 20H6a1 1 0 0 1-1-1v-7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1Z\"/></svg>"
                                                }'>Bug
                                                    </option>
                                                    <option value="story" data-hs-select-option='{
                                                    "icon": "<svg class=\"shrink-0 size-4 text-gray-800 dark:text-neutral-200 \" xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><path d=\"M2 7h20M2 7v15a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V7\"/><path d=\"M2 7V5a2 2 0 0 1 2-2h4\"/><path d=\"M20 7V5a2 2 0 0 0-2-2h-4\"/><path d=\"M7 13h10\"/><path d=\"M7 17h10\"/></svg>"
                                                }'>Story
                                                    </option>
                                                </select>
                                            </div>
                                            <!-- End Select -->

                                            <button
                                                id="createButton"
                                                type="button"
                                                wire:click="createIssue({{ $columnData->first()->column_id }})"
                                                @click="showForm = false"
                                                class="w-60px text-white bg-blue-700 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center justify-center disabled:bg-gray-500 disabled:cursor-not-allowed disabled:hover:bg-gray-500 dark:disabled:bg-gray-600"
                                            >
                                                Create
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

