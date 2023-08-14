<script setup>
import {ref} from 'vue'
import {useUserStore} from "@/stores/user.js"
const userStore = useUserStore()
const prices = ref([[350,1],[1750,5],[7000,20],[17500,50],[35000,100]])
</script>
<template>
    <h1 class="text-center text-white text-2xl">Egyenleg hozzáadása</h1>
    <div class="flex flex-col mx-auto w-2/5 text-center my-10">
    <h2 class="text-white">Opciók</h2>
        <div v-for="price in prices" class="my-3 flex flex-row mx-auto w-2/4">
            <p class="bg-slate-500 font-semibold text-cyan-300 p-2 w-full rounded-l-lg">{{ price[0] }} Ft / {{ price[1] }} € </p>
            <button
            @click="userStore.addBalance(price[1])"
            class="bg-lime-600 hover:bg-lime-500 hover:shadow-lg hover:shadow-lime-500/50 p-2 rounded-r-lg text-white font-semibold">Hozzáadás</button>
        </div>
    </div>
</template>