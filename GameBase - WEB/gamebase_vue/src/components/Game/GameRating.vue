<script setup>
defineProps(['game','rating','likes','dislikes'])
import {useGameStore} from "@/stores/game.js"
const gameStore = useGameStore()
</script>
<template>
    <div class="grid grid-cols-4 items-center px-4 py-2">
        <button 
        class="text-cyan-400 bg-cyan-900 p-2 rounded-l-lg transition delay-100 ease-in-out hover:bg-cyan-800 focus:shadow-lg focus:shadow-cyan-800"
        @click="gameStore.likeThisGame(game)">Like</button>
        <button 
        class="text-orange-400 bg-orange-900 p-2 rounded-r-lg transition delay-100 ease-in-out hover:bg-orange-800 focus:shadow-lg focus:shadow-orange-800" 
        @click="gameStore.dislikeThisGame(game)">Dislike</button>
        <p class="text-center text-lime-500 font-semibold drop-shadow" v-if="rating >= 75">{{ gameStore.calculateRatio(game) }}%</p>
        <p class="text-center text-lime-400 font-semibold" v-if="rating >= 65 && rating <= 74">{{ gameStore.calculateRatio(game) }}%</p>
        <p class="text-center text-yellow-300 font-semibold" v-if="rating >= 50 && rating <= 64">{{ gameStore.calculateRatio(game) }}%</p>
        <p class="text-center text-yellow-500 font-semibold" v-if="rating >= 25 && rating <= 49">{{ gameStore.calculateRatio(game) }}%</p>
        <p class="text-center text-red-500 font-semibold" v-if="rating < 25">{{ gameStore.calculateRatio(game) }}%</p>
        <p class="text-gray-100 font-semibold text-center">{{ likes + dislikes }} <br> szavazat</p>
    </div>
</template>