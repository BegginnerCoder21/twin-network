import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

import { createApp } from 'vue'
import TwinnersList from "@/components/students/TwinnersList.vue";

const app = createApp();

app.component('twinners-list',TwinnersList);

app.mount('#app')
