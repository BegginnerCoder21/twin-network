import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

import { createApp } from 'vue'
import TwinnersList from "@/components/students/TwinnersList.vue";
import TopicalityContent from "@/components/topicalities/TopicalityContent.vue";
import TopicalityReaction from "@/components/topicalities/TopicalityReaction.vue"

const app = createApp();

app.component('twinners-list',TwinnersList);
app.component('topicality-content',TopicalityContent);
app.component('topicality-reaction',TopicalityReaction);

app.mount('#app')
