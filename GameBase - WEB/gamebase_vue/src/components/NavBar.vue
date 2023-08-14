<script setup>
import {useUserStore} from "@/stores/user.js"
const userStore = useUserStore()
</script>

<template>
    <nav class="rounded-lg p-2 sticky top-1 w-full mx-auto grid grid-cols-5 z-50">
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
        <div class="rounded-lg col-start-5 flex flex-row-reverse items-center p-2" v-if="!userStore.logged && !userStore.loginModal">
            <button
            class="p-2 mx-2 font-semibold hover:bg-cyan-500 hover:shadow-lg hover:shadow-cyan-500/50 text-white hover:text-black rounded-lg transition ease-in-out delay-100">Regisztráció</button>
            <button
            @click="userStore.goToLogin()"
            class="p-2 mx-2 font-semibold hover:bg-cyan-500 hover:shadow-lg hover:shadow-cyan-500/50 text-white hover:text-black rounded-lg transition ease-in-out delay-100">Bejelentkezés</button>
        </div>
        <div class="flex flex-col items-center p-2 col-start-5" v-if="!userStore.logged && userStore.loginModal">
            <div class="flex flex-row-reverse my-1 w-full">
                <button
                @click="userStore.returnToMain()"
                class="text-white font-semibold bg-slate-700/50 p-2 rounded-r-lg w-1/4">Vissza</button>
                <input
                v-model="userStore.username"
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
        <div class="flex flex-row-reverse items-center p-2 col-start-4 col-span-2" v-if="userStore.logged && !userStore.loginModal">
            <button
            @click="userStore.logout()"
            class="text-white p-2 font-semibold">Kijelentkezés</button>
            <router-link
            to="/addbalance"
            class="text-white px-3 py-2 bg-lime-600/50 rounded-r-lg font-semibold">{{ userStore.balanceInHUF }} Ft - {{ userStore.balance }} €</router-link>
            <p class="text-white p-2 font-semibold rounded-l-lg bg-slate-600/50 px-6 py-2">{{ userStore.shortenUserName() }}</p>
        </div>
    </nav>
</template>