<script setup>
defineProps(['logged','loginModal','username'])
defineEmits(['update:username'])
import { useUserStore } from '../../stores/user'
const userStore = useUserStore()
</script>
<template>
    <div class="flex flex-col items-center p-2 col-start-5" v-if="!logged && loginModal">
        <div class="flex flex-row-reverse my-1 w-full">
            <button
            @click="userStore.returnToMain()"
            class="text-white font-semibold bg-slate-700/50 p-2 rounded-r-lg w-1/4">Vissza</button>
            <input
            :value="username"
            @input="$emit('update:username', $event.target.value)"
            type="text"
            class="p-2 rounded-l-lg focus:outline-none focus:bg-slate-800 transition ease-in-out delay-100 text-center bg-slate-700 text-white font-semibold"
            >
            </div>
        <div class="flex flex-row-reverse my-1 w-full">
            <button
            @click="userStore.login()"
            class="text-white font-semibold bg-slate-700/50 p-2 rounded-r-lg w-1/4">Belépés</button>
            <input
            type="text"
            class="p-2 rounded-l-lg focus:outline-none focus:bg-slate-800 transition ease-in-out delay-100 text-center bg-slate-700 text-white font-semibold"
            >
        </div>
    </div>
</template>