import axios from 'axios';
import 'preline';
import 'flowbite';
import { Livewire, Alpine } from '../../vendor/livewire/livewire/dist/livewire.esm';
import sort from '@alpinejs/sort';

Alpine.plugin(sort);
Alpine.start();
Livewire.start();


window.Alpine = Alpine;
window.axios = axios;
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
