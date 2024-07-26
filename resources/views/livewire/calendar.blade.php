<div>
    <div id="calendar" wire:ignore></div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            if (calendarEl.innerHTML.trim() !== "") {
                var existingCalendar = FullCalendar.Calendar.getCalendar(calendarEl);
                if (existingCalendar) {
                    existingCalendar.destroy();
                }
            }
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                selectable: true,
                editable: true, // Cho phép kéo thả sự kiện
                events: @json($events),
                select: function(info) {
                    var title = prompt('Enter Event Title:');
                    if (title) {
                        calendar.addEvent({
                            title: title,
                            start: info.startStr,
                            end: info.endStr
                        });

                        @this.call('addEvent', title, info.startStr, info.endStr);
                    }
                },
                eventDrop: function(info) {
                    var event = info.event;
                    var id = event.id;

                    if (id) {
                        @this.call('updateEvent', id, event.start.toISOString(), event.end ? event.end
                            .toISOString() : null);
                    }
                },
                eventResize: function(info) {
                    var event = info.event;
                    var id = event.id;

                    if (id) {
                        @this.call('updateEvent', id, event.start.toISOString(), event.end ? event.end
                            .toISOString() : null);
                    }
                },

                eventClick: function(info) {
                    var event = info.event;
                    var id = event.id;

                    if (confirm('Do you really want to delete this event?')) {
                        event.remove();
                        @this.call('deleteEvent', id);
                    }
                },
            });
            calendar.render();
        });
    </script>
</div>
