<div>
    <div id="calendar" wire:ignore></div>

    <!-- Add Event Modal -->
    <div class="modal fade" tabindex="-1" id="kt_modal_3">
        <div class="modal-dialog">
            <div class="modal-content position-absolute">
                <div class="modal-header">
                    <h3 class="modal-title font-medium text-xl">Add Sprint</h3>
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                        aria-label="Close">
                        <i class="ki-duotone ki-cross fs-2x"><span class="path1"></span><span
                                class="path2"></span></i>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="eventTitleInput" class="form-label">Event Title</label>
                        <input type="text" id="eventTitleInput" class="form-control" placeholder="Event Title">
                    </div>
                    <div class="mb-3">
                        <label for="eventDescriptionInput" class="form-label">Description</label>
                        <textarea id="eventDescriptionInput" class="form-control" placeholder="Description" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="eventStartInput" class="form-label">Start Date & Time</label>
                        <input type="datetime-local" id="eventStartInput" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="eventEndInput" class="form-label">End Date & Time</label>
                        <input type="datetime-local" id="eventEndInput" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="eventBackgroundColorInput" class="form-label">Color</label>
                        <div id="colorPalette" class="flex gap-3">
                            <!-- Add color options here -->
                            <div class="w-7 h-7 cursor-pointer rounded-full color-option"
                                style="background-color: #1E90FF;" data-color="#1E90FF"></div>
                            <div class="w-7 h-7 cursor-pointer rounded-full color-option"
                                style="background-color: #FF4500;" data-color="#FF4500"></div>
                            <div class="w-7 h-7 cursor-pointer rounded-full color-option"
                                style="background-color: #32CD32;" data-color="#32CD32"></div>
                            <div class="w-7 h-7 cursor-pointer rounded-full color-option"
                                style="background-color: #FFD700;" data-color="#FFD700"></div>
                            <div class="w-7 h-7 cursor-pointer rounded-full color-option"
                                style="background-color: #8A2BE2;" data-color="#8A2BE2"></div>
                        </div>
                        <input type="hidden" id="eventBackgroundColorInput" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                    <button type="button" id="saveEventButton" class="btn btn-primary" wire:loading.attr="disabled">
                        <svg wire:loading wire:target="save" class="animate-spin -ml-1 mr-3 h-5 w-5 text-white"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor"
                                d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                            </path>
                        </svg>
                        <span wire:loading.remove>Save</span>
                        <span wire:loading>Loading...</span>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Event Modal -->
    <div class="modal fade" tabindex="-1" id="kt_modal_edit_event">
        <div class="modal-dialog modal-dialog-scrollable"">
            <div class="modal-content position-absolute">
                <div class="modal-header">
                    <h3 class="modal-title font-medium text-xl">Edit Event</h3>
                    <div class="flex items-center gap-x-2">
                        {{-- icon xóa --}}
                        <div id="deleteEventButton"
                            class="btn btn-icon btn-danger btn-sm btn-active-light-primary ms-2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                            </svg>
                        </div>
                        {{-- icon close --}}
                        <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                            aria-label="Close">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="editEventTitleInput" class="form-label">Event Title</label>
                        <input type="text" id="editEventTitleInput" class="form-control"
                            placeholder="Event Title">
                    </div>
                    <div class="mb-3">
                        <label for="editEventDescriptionInput" class="form-label">Description</label>
                        <textarea id="editEventDescriptionInput" class="form-control" placeholder="Description" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="editEventStartInput" class="form-label">Start Date & Time</label>
                        <input type="datetime-local" id="editEventStartInput" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="editEventEndInput" class="form-label">End Date & Time</label>
                        <input type="datetime-local" id="editEventEndInput" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="editEventBackgroundColorInput" class="form-label">Color</label>
                        <div id="editColorPalette" class="flex gap-3">
                            <div class="w-7 h-7 cursor-pointer rounded-full color-option"
                                style="background-color: #1E90FF;" data-color="#1E90FF"></div>
                            <div class="w-7 h-7 cursor-pointer rounded-full color-option"
                                style="background-color: #FF4500;" data-color="#FF4500"></div>
                            <div class="w-7 h-7 cursor-pointer rounded-full color-option"
                                style="background-color: #32CD32;" data-color="#32CD32"></div>
                            <div class="w-7 h-7 cursor-pointer rounded-full color-option"
                                style="background-color: #FFD700;" data-color="#FFD700"></div>
                            <div class="w-7 h-7 cursor-pointer rounded-full color-option"
                                style="background-color: #8A2BE2;" data-color="#8A2BE2"></div>
                        </div>
                        <input type="hidden" id="editEventBackgroundColorInput" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="eventCreatedAt" class="form-label">Created At</label>
                        <input type="text" id="eventCreatedAt" class="form-control" disabled>
                    </div>
                    <div class="mb-3 relative">
                        <label for="eventCreatedBy" class="form-label">Created By</label>
                        <input type="text" id="eventCreatedBy" class="form-control" disabled>
                        <div class="absolute right-3 top-9">
                            <img class="w-9 h-9 p-1 rounded-full"
                                src="https://flowbite.com/docs/images/people/profile-picture-4.jpg"
                                alt="Bordered avatar">
                        </div>
                    </div>
                    <input type="hidden" id="editEventId">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                    <button type="button" id="updateEventButton" class="btn btn-primary"
                        wire:loading.attr="disabled">
                        <svg wire:loading wire:target="save" class="animate-spin -ml-1 mr-3 h-5 w-5 text-white"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor"
                                d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                            </path>
                        </svg>
                        <span wire:loading.remove>Save Changes</span>
                        <span wire:loading>Loading...</span>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                selectable: true,
                editable: true,
                dayMaxEvents: true,
                timeZone: 'Asia/Ho_Chi_Minh',
                eventTimeFormat: { // định dạng thời gian cho các sự kiện
                    hour: 'numeric',
                    minute: '2-digit',
                    meridiem: 'short' // AM/PM
                },
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay'
                },
                events: @json($events),
                dateClick: function(info) {
                    alert('clicked ' + info.dateStr);
                },
                select: function(info) {
                    modalElement.show();
                    document.getElementById('eventStartInput').value = formatDateForDatetimeLocal(info
                        .startStr);
                    document.getElementById('eventEndInput').value = formatDateForDatetimeLocal(info
                        .endStr);
                },
                eventDrop: function(info) {
                    var event = info.event;
                    var id = event.id;
                    @this.call('updateEvent', id, event.title, event.extendedProps.description, event
                        .start.toISOString(), event.end ? event.end.toISOString() : null, event
                        .backgroundColor);
                },
                eventResize: function(info) {
                    var event = info.event;
                    var id = event.id;
                    @this.call('updateEvent', id, event.title, event.extendedProps.description, event
                        .start.toISOString(), event.end ? event.end.toISOString() : null, event
                        .backgroundColor);
                },
                eventClick: function(info) {
                    var event = info.event;
                    var id = event.id;
                    document.getElementById('editEventId').value = id;
                    document.getElementById('editEventTitleInput').value = event.title;
                    document.getElementById('editEventDescriptionInput').value = event.extendedProps.description;
                    document.getElementById('editEventStartInput').value = formatDateForDatetimeLocal(event.start);
                    document.getElementById('editEventEndInput').value = formatDateForDatetimeLocal(event.end);
                    document.getElementById('editEventBackgroundColorInput').value = event.backgroundColor;
                    document.getElementById('eventCreatedAt').value = event.extendedProps.created_at;
                    document.getElementById('eventCreatedBy').value = event.extendedProps.created_by;

                    document.querySelectorAll('.color-option').forEach(function(el) {
                        el.classList.remove('selected');
                        if (el.dataset.color === event.backgroundColor) {
                            el.classList.add('selected');
                        }
                    });
                    modalEditElement.show();
                },
            });
            calendar.render();

            var modalElement = new bootstrap.Modal(document.getElementById('kt_modal_3'));
            var modalEditElement = new bootstrap.Modal(document.getElementById('kt_modal_edit_event'));

            document.getElementById('saveEventButton').addEventListener('click', function() {
                saveEvent();
            });

            document.getElementById('updateEventButton').addEventListener('click', function() {
                updateEvent();
            });

            document.getElementById('deleteEventButton').addEventListener('click', function() {
                deleteEvent();
            });

            function saveEvent() {
                var title = document.getElementById('eventTitleInput').value;
                var description = document.getElementById('eventDescriptionInput').value;
                var start = document.getElementById('eventStartInput').value;
                var end = document.getElementById('eventEndInput').value;
                var backgroundColor = document.getElementById('eventBackgroundColorInput').value;

                if (title && start) {
                    @this.call('addEvent', null, title, description, start, end, backgroundColor).then(response => {
                        calendar.addEvent({
                            id: response.id,
                            title: title,
                            description: description,
                            start: start,
                            end: end,
                            backgroundColor: backgroundColor,
                            created_at: response.created_at || 'N/A',
                            created_by: response.created_by || 'Unknown'
                        });
                        modalElement.hide();
                    });
                }
            }

            function updateEvent() {
                var id = document.getElementById('editEventId').value;
                var title = document.getElementById('editEventTitleInput').value;
                var description = document.getElementById('editEventDescriptionInput').value;
                var start = document.getElementById('editEventStartInput').value;
                var end = document.getElementById('editEventEndInput').value;
                var backgroundColor = document.getElementById('editEventBackgroundColorInput').value;

                if (id && title && start) {
                    @this.call('updateEvent', id, title, description, start, end, backgroundColor).then(
                    response => {
                        var calendarEvent = calendar.getEventById(id);
                        calendarEvent.setProp('title', title);
                        calendarEvent.setExtendedProp('description', description);
                        calendarEvent.setStart(start);
                        calendarEvent.setEnd(end);
                        calendarEvent.setProp('backgroundColor', backgroundColor);
                        modalEditElement.hide();
                    });
                }
            }

            function deleteEvent() {
                var id = document.getElementById('editEventId').value;
                if (id) {
                    @this.call('deleteEvent', id).then(response => {
                        var calendarEvent = calendar.getEventById(id);
                        if (calendarEvent) {
                            calendarEvent.remove();
                        }
                        modalEditElement.hide();
                    });
                }
            }


            document.getElementById('kt_modal_3').addEventListener('keydown', function(event) {
                if (event.key === 'Enter') {
                    saveEvent();
                } else if (event.key === 'Escape') {
                    modalElement.hide();
                }
            });

            Livewire.on('eventAdded', function(event) {
                calendar.addEvent({
                    id: event.id,
                    title: event.title,
                    description: event.description,
                    start: event.start,
                    end: event.end,
                    backgroundColor: event.backgroundColor,
                    created_at: event.created_at || 'Unknown',
                    created_by: event.created_by || 'Unknown'
                });
            });

            Livewire.on('eventUpdated', function(event) {
                var calendarEvent = calendar.getEventById(event.id);
                if (calendarEvent) {
                    calendarEvent.setProp('title', event.title);
                    calendarEvent.setExtendedProp('description', event.description);    
                    calendarEvent.setStart(event.start);
                    calendarEvent.setEnd(event.end);
                    calendarEvent.setProp('backgroundColor', event.backgroundColor);
                    calendarEvent.setExtendedProp('created_at', event.created_at || 'Unknown');
                    calendarEvent.setExtendedProp('created_by', event.created_by || 'Unknown');
                }
            });

            Livewire.on('eventDeleted', function(event) {
                var calendarEvent = calendar.getEventById(event.id);
                if (calendarEvent) {
                    calendarEvent.remove();
                }
            });

            function formatDateForDatetimeLocal(dateStr) {
                var date = new Date(dateStr);
                var isoString = date.toISOString();
                return isoString.substring(0, isoString.length - 1);
            }

            document.querySelectorAll('.color-option').forEach(function(element) {
                element.addEventListener('click', function() {
                    document.querySelectorAll('.color-option').forEach(function(el) {
                        el.classList.remove('selected');
                    });
                    element.classList.add('selected');
                    document.getElementById('eventBackgroundColorInput').value = element.dataset
                        .color;
                    document.getElementById('editEventBackgroundColorInput').value = element.dataset
                        .color;
                });
            });
        });
    </script>


    @push('stylesCalendar')
        <style>
            .fc .fc-highlight {
                background-color: rgba(55, 136, 216, 0.3);
                border-color: #3788d8;
            }

            .color-option.selected {
                border: 2px solid #000;
            }
        </style>
    @endpush
</div>
