import axios from 'axios';
import Alpine from 'alpinejs';
import focus from '@alpinejs/focus';

import.meta.glob(['../assets/**']);

window.axios = axios;
window.Alpine = Alpine;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

Alpine.plugin(focus);

Alpine.start();
