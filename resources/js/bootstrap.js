import axios from 'axios';
import { Livewire, Alpine } from '../../vendor/livewire/livewire/dist/livewire.esm';
import sort from '@alpinejs/sort';

Livewire.start();

Alpine.plugin(sort);
Alpine.start();

window.axios = axios;
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
