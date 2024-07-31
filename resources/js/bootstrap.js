import axios from 'axios';
import { Calendar } from '@fullcalendar/core';
import 'preline'
import 'flowbite';
import interactionPlugin, { Draggable } from '@fullcalendar/interaction';
import { Livewire, Alpine } from '../../vendor/livewire/livewire/dist/livewire.esm';



Livewire.start();
Alpine.start();

window.Alpine = Alpine;
window.axios = axios;
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
