<script setup>
defineProps(['title','filesize','price'])
import { useUserStore } from '../../stores/user'
const userStore = useUserStore()
</script>
<template>
    <div class="w-full mx-auto grid grid-cols-3 p-4">
        <button 
        class="bg-slate-500 col-span-2 p-2 rounded-l-lg border-2 border-solid border-slate-700 text-white font-semibold hover:shadow-lg hover:shadow-slate-700 transition ease-in-out delay-100" 
        @click="userStore.purchaseGame(title, filesize, price)"
        v-if="userStore.ownedTitles.indexOf(title) == -1">Vásárlás</button>
        <router-link 
        class="bg-slate-500 col-span-2 p-2 rounded-l-lg border-2 border-solid border-slate-700 text-white font-semibold text-center" 
        to="/library"
        v-if="userStore.ownedTitles.indexOf(title) != -1">Könyvtárba</router-link>
        <p class="text-center text-lime-500 bg-lime-900 border-2 border-solid border-lime-700 py-2 rounded-r-xl">{{ price }}€</p>
    </div>
</template>