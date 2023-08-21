<script setup>
defineProps(['logged','loginModal','balance','balanceInHUF','devMode'])
import { useUserStore } from '../../stores/user'
const userStore = useUserStore()
</script>
<template>
    <div class="flex flex-row-reverse items-center p-2 col-start-4 col-span-2" v-if="logged && !loginModal">
        <button
        @click="userStore.logout()"
        class="text-white p-2 font-semibold">Kijelentkezés</button>
        <router-link
        to="/addbalance"
        class="text-white px-3 py-2 bg-lime-600/50 rounded-r-lg font-semibold">{{ balanceInHUF }} Ft - {{ balance }} €</router-link>
        <p class="text-white p-2 font-semibold rounded-l-lg bg-slate-600/50 px-6 py-2">{{ userStore.shortenUserName() }}</p>
        <div class="py-2 px-4 mx-2 rounded-lg flex items-center justify-center space-x-3 bg-gray-800">
            <button 
            class="text-white font-semibold uppercase"
            @click="userStore.toggleDev()">Dev</button>
            <div
            class="w-3 h-3 rounded-full bg-red-600 transition ease-in-out delay-100"
            v-if="!devMode"></div>
            <div
            class="w-3 h-3 rounded-full bg-green-600 transition ease-in-out delay-100"
            v-if="devMode"></div>
        </div>
    </div>
</template>