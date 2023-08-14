<script setup>
import {useGameStore} from "@/stores/game.js"
import {useUserStore} from "@/stores/user.js"
const gameStore = useGameStore()
const userStore = useUserStore()
</script>

<template>
    <div class="grid grid-cols-2 w-1/2 mx-auto h-full p-10 gap-2">
        <div class="bg-zinc-900 rounded-lg p-4 border-solid border-2 border-zinc-700" v-for="game in gameStore.games">
            <div class="font-semibold mx-auto w-full">
                <h1 class="text-2xl text-center text-white bg-cyan-900 border-2 border-solid border-sky-950 rounded-lg py-2">{{ game.title }}</h1>
            </div>
            <div class="w-full mx-auto grid grid-cols-3 my-4 items-center">
                <button class="bg-slate-700 rounded border-2 border-solid border-zinc-950 py-2 rounded-l-lg text-white font-semibold" 
                @click="userStore.purchaseGame(game.title, game.filesize, game.price)"
                v-if="userStore.ownedTitles.indexOf(game.title) == -1">Vásárlás</button>
                <router-link class="bg-slate-700 rounded border-2 border-solid border-zinc-950 py-2 rounded-l-lg text-white font-semibold text-center" 
                to="/library"
                v-if="userStore.ownedTitles.indexOf(game.title) != -1">Könyvtárba</router-link>
                <p class="text-center text-lime-500 bg-lime-900 border-2 border-solid border-lime-700 py-2 rounded-r-lg">{{ game.price }}€</p>
                <p class="text-center text-lime-300 font-semibold" v-if="game.rating >= 75">{{ game.rating }}%</p>
                <p class="text-center text-yellow-500 font-semibold" v-if="game.rating >= 50 && game.rating <= 74">{{ game.rating }}%</p>
                <p class="text-center text-red-500 font-semibold" v-if="game.rating < 50">{{ game.rating }}%</p>
            </div>
            <div class="w-full mx-auto grid grid-cols-4 my-4 gap-2">
                <div v-for="tag in game.tags" class="bg-slate-500 py-2 rounded-lg text-center font-semibold text-slate-200">{{ tag }}</div>
            </div>
        </div>
    </div>
</template>