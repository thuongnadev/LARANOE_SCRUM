<div>
    <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
        <!--begin::Table head-->
        <thead>
            <tr class="fw-bolder text-muted">
                <th class="w-25px">
                    <div class="form-check form-check-sm form-check-custom form-check-solid">
                        <input class="form-check-input" type="checkbox" value="1" data-kt-check="true"
                            data-kt-check-target=".widget-9-check" />
                    </div>
                </th>
                <th class="min-w-100px">Title</th>
                <th class="min-w-120px text-start">Type</th>
                <th class="min-w-120px text-center">Time line</th>
                <th class="min-w-120px text-center">Date time</th>
                <th class="min-w-100px text-center">Status</th>
                <th class="min-w-100px text-center">Action</th>
            </tr>
        </thead>
        <tbody id="sortable">
            @foreach ($sprintBacklogs as $item)
                <tr data-id="{{ $item->id }}" draggable="true" wire:key="{{ $item->id }}" class="cursor-move"
                    ondragstart="drag(event)" ondrop="drop(event)" ondragover="allowDrop(event)">
                    <td>
                        <div class="form-check form-check-sm form-check-custom form-check-solid">
                            <input class="form-check-input widget-9-check" type="checkbox" value="1" />
                        </div>
                    </td>
                    <td>
                        <div class="flex items-center justify-start">
                            <div class="d-flex justify-content-start flex-column">
                                <a href="#"
                                    class="text-dark fw-bolder text-hover-primary fs-6">{{ $item->name }}</a>
                                <span class="text-muted fw-bold text-muted d-block fs-7">HTML, JS, ReactJS</span>
                            </div>
                        </div>
                    </td>
                    <td>
                        <span
                            class="text-center fw-bold fs-7 w-20 h-6 flex items-center justify-center
                            @if ($item->type == 'Done') bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300
                            @elseif($item->type == 'task') bg-blue-100 text-blue-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300
                            @elseif($item->type == 'Stuck') bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300
                            @elseif($item->type == 'To do') bg-yellow-100 text-yellow-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-yellow-900 dark:text-yellow-300 @endif">
                            {{ ucfirst($item->type) }}
                        </span>
                    </td>
                    <td class="text-start">
                        <div class="d-flex flex-column w-100 me-2">
                            <div class="d-flex flex-stack mb-2">
                                <span class="text-muted me-2 fs-7 fw-bold">50%</span>
                            </div>
                            <div class="progress h-6px w-100">
                                <div class="progress-bar bg-primary" role="progressbar" style="width: 50%"
                                    aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </td>
                    <td class="text-center bg-green-300">
                        <span class="fw-bold text-black d-block text-xl">{{ $item->start_date }}</span>
                    </td>
                    <td class="text-center">
                        <span class="fw-bold d-block">{{ $item->column->column_name }}</span>
                    </td>
                    <td>
                        <div class="d-flex justify-content-center flex-shrink-0">
                            <a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                                <span class="svg-icon svg-icon-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none">
                                        <path
                                            d="M17.5 11H6.5C4 11 2 9 2 6.5C2 4 4 2 6.5 2H17.5C20 2 22 4 22 6.5C22 9 20 11 17.5 11ZM15 6.5C15 7.9 16.1 9 17.5 9C18.9 9 20 7.9 20 6.5C20 5.1 18.9 4 17.5 4C16.1 4 15 5.1 15 6.5Z"
                                            fill="black" />
                                        <path opacity="0.3"
                                            d="M17.5 22H6.5C4 22 2 20 2 17.5C2 15 4 13 6.5 13H17.5C20 13 22 15 22 17.5C22 20 20 22 17.5 22ZM4 17.5C4 18.9 5.1 20 6.5 20C7.9 20 9 18.9 9 17.5C9 16.1 7.9 15 6.5 15C5.1 15 4 16.1 4 17.5Z"
                                            fill="black" />
                                    </svg>
                                </span>
                            </a>
                            <a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                                <span class="svg-icon svg-icon-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none">
                                        <path opacity="0.3"
                                            d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z"
                                            fill="black" />
                                        <path
                                            d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z"
                                            fill="black" />
                                    </svg>
                                </span>
                            </a>
                            <a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm">
                                <span class="svg-icon svg-icon-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none">
                                        <path
                                            d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z"
                                            fill="black" />
                                        <path opacity="0.5"
                                            d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z"
                                            fill="black" />
                                        <path opacity="0.5"
                                            d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z"
                                            fill="black" />
                                    </svg>
                                </span>
                            </a>
                        </div>
                    </td>
                </tr>
            @endforeach
            <tr id="add-button-row">
                <td colspan="7" class="text-center">
                    <button id="add-button" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" onclick="showForm()">
                        + Add Sprint Backlog
                    </button>
                </td>
            </tr>
    
            <tr id="add-form-row" class="hidden">
                <td></td>
                <td class="text-left">
                    <input type="text" id="title" class="form-input mt-1 w-30 h-10 rounded-md p-2" placeholder="Title">
                </td>
                <td>
                    <select id="type" class="form-select mt-1 block w-full">
                        <option value="Done">Done</option>
                        <option value="task">Task</option>
                        <option value="Stuck">Stuck</option>
                        <option value="To do">To do</option>
                    </select>
                </td>
                <td>
                    <input type="date" id="created_at" class="form-input mt-1 block w-full" placeholder="Created At">
                    <input type="date" id="start_day" class="form-input mt-1 block w-full" placeholder="Start Day">
                    <input type="date" id="end_day" class="form-input mt-1 block w-full" placeholder="End Day">
                </td>
                <td>
                    <select id="status" class="form-select mt-1 block w-full">
                        <option value="Pending">Pending</option>
                        <option value="In Progress">In Progress</option>
                        <option value="Completed">Completed</option>
                    </select>
                </td>
                ]
                <td colspan="">
                    <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded mt-2" onclick="addSprintBacklog()">Add</button>
                </td>
                <td>
                    <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded mt-2" onclick="hideForm()">Cancel</button>
                </td>
            </tr>
        </tbody>
        <!--end::Table body-->
    </table>
    
</div>
