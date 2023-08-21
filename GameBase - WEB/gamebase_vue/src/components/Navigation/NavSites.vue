<script setup>
import { useUserStore } from '../../stores/user'
const userStore = useUserStore()
</script>
<template>
    <div class="flex flex-row items-center">
        <router-link to="/about" class="p-2 mx-2 font-semibold bg-zinc-700/25 hover:bg-zinc-700/50 text-white text-2xl rounded-lg shadow-sm">GameBase</router-link>
        <router-link
        to="/"
        class="font-bold uppercase p-2 mx-2 text-white hover:bg-lime-500 hover:shadow-lg hover:shadow-lime-500/50 hover:text-black rounded-lg transition ease-in-out delay-100">Áruház</router-link>
        <router-link
        to="/library"
        v-if="userStore.logged"
        class="font-bold uppercase p-2 mx-2 text-white hover:bg-purple-500 hover:shadow-lg hover:shadow-purple-500/50 hover:text-black rounded-lg transition ease-in-out delay-100">Könyvtár</router-link>
        </div>
</template>