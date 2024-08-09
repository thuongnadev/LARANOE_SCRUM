<div>
    <button id="createSprintButton" class="btn btn-primary">Create Sprint</button>

    <!-- Sprint Creation Modal -->
    <div class="modal fade" tabindex="-1" id="sprintModal">
        <div class="modal-dialog">
            <div class="modal-content position-absolute">
                <div class="modal-header">
                    <h3 class="modal-title font-medium text-xl">Create Sprint</h3>
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                        <i class="ki-duotone ki-cross fs-2x"></i>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="sprintNameInput" class="form-label">Sprint Name</label>
                        <input type="text" id="sprintNameInput" wire:model="sprint_name" class="form-control" placeholder="Sprint Name">
                    </div>
                    <div class="mb-3">
                        <label for="durationInput" class="form-label">Duration</label>
                        <select id="durationInput" wire:model="duration" class="form-control">
                            <option value="7">1 week</option>
                            <option value="14">2 weeks</option>
                            <option value="30">1 month</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="startDateInput" class="form-label">Start Date</label>
                        <input type="datetime-local" id="startDateInput" wire:model="start_date" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="endDateInput" class="form-label">End Date</label>
                        <input type="datetime-local" id="endDateInput" wire:model="end_date" class="form-control" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="goalInput" class="form-label">Goal</label>
                        <textarea id="goalInput" wire:model="goal" class="form-control" placeholder="Goal" rows="3"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                    <button type="button" wire:click="createSprint" class="btn btn-primary" wire:loading.attr="disabled">
                        <svg wire:loading wire:target="createSprint" class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                        <span wire:loading.remove>Create Sprint</span>
                        <span wire:loading>Loading...</span>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div id="accordion-table">
        @foreach ($sprints as $sprint)
            <div data-accordion="collapse">
                <h2 id="accordion-heading-{{ $sprint->id }}"
                    class="flex items-center rounded-lg hover:bg-gray-100 bg-gray-100 focus:ring-4 border-2 hover:border-neutral-300 dark:text-white focus:ring-gray-50 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-600 my-4">
                    <button type="button" class="flex items-center justify-between w-full p-5 font-medium text-gray-500"
                            data-accordion-target="#accordion-body-{{ $sprint->id }}" aria-expanded="false" aria-controls="accordion-body-{{ $sprint->id }}">
                        <div class="flex items-center justify-center">
                            <svg data-accordion-icon class="w-3 h-3 mx-4 rotate-180 shrink-0" aria-hidden="true"
                                 xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M9 5 5 1 1 5" />
                            </svg>
                            <span class="text-neutral-700">Inventory {{ $sprint->id }}</span>
                        </div>
                        <div class="flex items-center">
                            {{-- <span class="mx-4 text-neutral-600 bg-gray-200 hover:bg-slate-300 p-3 rounded-md">{{ $sprint->sprint_name }}</span> --}}
                            <span class="mx-4 text-neutral-600 bg-gray-200 hover:bg-sky-300 p-3 rounded-md" wire:click="startSprint({{ $sprint->id }})"
                                  @if ($startingSprintId === $sprint->id) disabled style="cursor: wait;" @endif>
                                Start sprint
                            </span>
                            <div>
                                <span class="bg-gray-200 text-gray-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-gray-300">{{ $sprint->duration }}</span>
                                <span class="bg-blue-100 text-blue-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">0</span>
                                <span class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">0</span>
                            </div>
                        </div>
                    </button>

                    <div class="flex items-center justify-center cursor-pointer hover:bg-gray-100">
                        <div id="dropdownMenuIconHorizontalButton" data-dropdown-toggle="dropdownDotsHorizontal-{{ $sprint->id }}"
                             class="z-50 inline-flex items-center p-2 text-sm font-medium text-center text-gray-900 bg-gray-200 hover:bg-gray-100 mr-3 rounded-md">
                            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                 viewBox="0 0 16 3">
                                <path
                                    d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z" />
                            </svg>
                        </div>

                        <!-- Dropdown menu -->
                        <div id="dropdownDotsHorizontal-{{ $sprint->id }}"
                             class="hidden bg-gray-200 divide-y divide-gray-100 rounded-lg shadow-lg w-44 dark:bg-gray-700" style="z-index: 9999">
                            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                                aria-labelledby="dropdownMenuIconHorizontalButton">
                                <li>
                                    <a href="#"
                                       class="block px-4 text-lg py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                        Edit sprint
                                    </a>
                                </li>
                                <li>
                                    <a href="#"
                                       class="block px-4 text-lg py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                        Delete sprint
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </h2>

                <div id="accordion-body-{{ $sprint->id }}" class="hidden" aria-labelledby="accordion-heading-{{ $sprint->id }}">
                    <div class="p-5 border border-b-0 border-gray-200 dark:border-gray-700">
                        <div class="relative overflow-x-auto">
                            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                <tbody>
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <div class="mt-4">
                                        <button id="createIssueButton-{{ $sprint->id }}"
                                                class="text-neutral-800 flex items-center gap-x-3 font-medium text-base  bg-slate-200 hover:bg-slate-300 p-2 rounded-md w-full">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                 stroke-width="1.5" stroke="currentColor" class="size-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                      d="M12 4.5v15m7.5-7.5h-15" />
                                            </svg>
                                            Create issue
                                        </button>
                                    </div>
                                    <!-- Issue creation form -->
                                    <div id="issueForm-{{ $sprint->id }}" class="hidden mt-2">
                                        <div class="flex items-center">
                                            <form action="">
                                                <select id="issueType-{{ $sprint->id }}" class="p-2 border-neutral-300 rounded-md w-20 mb-2 ml-2">
                                                    <option value="task">
                                                        Task
                                                    </option>

                                                    <option value="bug">
                                                        Bug
                                                    </option>
                                                    <option value="story">
                                                        Story
                                                    </option>
                                                </select>
                                                <input type="text" id="issueTitle-{{ $sprint->id }}" placeholder="What needs to be done?" class="mx-2 mb-2 border-neutral-300 rounded-md flex-1">
                                                <button type="submit" hidden></button>
                                            </form>
                                        </div>
                                    </div>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

<!-- Include this script for handling accordion behavior -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const accordionButtons = document.querySelectorAll('[data-accordion-target]');

        accordionButtons.forEach(button => {
            button.addEventListener('click', function() {
                const target = document.querySelector(button.getAttribute(
                    'data-accordion-target'));
                const isOpen = button.getAttribute('aria-expanded') === 'true';

                if (isOpen) {
                    button.setAttribute('aria-expanded', 'false');
                    target.classList.add('hidden');
                } else {
                    button.setAttribute('aria-expanded', 'true');
                    target.classList.remove('hidden');
                }
            });
        });
    });

    // // issue
    // const createIssueButton = document.getElementById('createIssueButton');
    // const issueForm = document.getElementById('issueForm');

    // createIssueButton.addEventListener('click', function(event) {
    //     event.stopPropagation(); // Ngăn việc click vào button gây ra sự kiện click của document
    //     issueForm.classList.remove('hidden'); // Hiển thị form
    //     createIssueButton.classList.add('hidden'); // Ẩn nút Create issue
    // });

    // document.addEventListener('click', function(event) {
    //     if (!issueForm.contains(event.target) && !createIssueButton.contains(event.target)) {
    //         issueForm.classList.add('hidden'); // Ẩn form
    //         createIssueButton.classList.remove('hidden'); // Hiển thị lại nút Create issue
    //     }
    // });

    // issueForm.addEventListener('click', function(event) {
    //     event.stopPropagation(); // Ngăn sự kiện click lan tới document khi click vào form
    // });


    // modal sprint

    document.addEventListener('DOMContentLoaded', function () {
        var createSprintButton = document.getElementById('createSprintButton');
        var sprintModal = new bootstrap.Modal(document.getElementById('sprintModal'));

        createSprintButton.addEventListener('click', function () {
            sprintModal.show();  // Show the modal when button is clicked
        });
    });

</script>
