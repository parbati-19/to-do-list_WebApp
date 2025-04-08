import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();
localStorage.setItem('theme', value ? 'dark' : 'light')
