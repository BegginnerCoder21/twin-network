<script setup lang="ts">

import {onMounted, ref} from "vue";
import axios from "axios";
import useStudents from "@/composables/students/useStudents";

const {
    getUser,
    getImageUrl,
    twinnerslist

} = useStudents();

onMounted(async () => {
    await getUser();
});

</script>

<template >
    <div class="container mt-10 space-y-9 mb-7">
        <div class="flex flex-row items-end space-x-16 max-w-4xl border-[1px] border-blue-500 px-8  rounded-2xl" v-for="twinner in twinnerslist" :key="twinner.id">
            <div class="flex flex-row items-center flex-1 py-10 space-x-6">
                <div class="max-w-xs">
                    <img :src="getImageUrl(twinner.images)" alt="" class="rounded-full w-32 ">
                </div>
                <ul class="flex flex-col space-y-4 text-blue-600">
                    <li><strong>NOM:</strong>  {{twinner.name + ' ' + twinner.lastname}}</li>
                    <li><strong>E-MAIL:</strong> {{twinner.email}}</li>
                    <li><strong>NUMERO: </strong> {{twinner.number}}</li>
                    <li><strong>COMPETENCE: </strong> {{twinner.speciality}} </li>
                </ul>
            </div>
            <div class="py-3">
                <button class="flex flex-row items-center bg-blue-500 px-5 space-x-2 py-2 rounded-md hover:bg-blue-600">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-white">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M7.5 8.25h9m-9 3H12m-9.75 1.51c0 1.6 1.123 2.994 2.707 3.227 1.129.166 2.27.293 3.423.379.35.026.67.21.865.501L12 21l2.755-4.133a1.14 1.14 0 01.865-.501 48.172 48.172 0 003.423-.379c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0012 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018z" />
                    </svg>
                    <span class="text-lg text-white">Chat</span>
                </button>
            </div>
        </div>
    </div>
</template>

<style scoped>

</style>
