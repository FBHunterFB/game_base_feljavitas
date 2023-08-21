<script setup>
import {useGameStore} from "@/stores/game.js"
import GameTitle from "./Game/GameTitle.vue"
import GameRating from "./Game/GameRating.vue"
import GameToLibrary from "./Game/GameToLibrary.vue"
const gameStore = useGameStore()
</script>

<template>
    <div class="grid grid-cols-2 w-1/2 mx-auto h-full p-10 gap-2">
        <div class="bg-zinc-900 rounded-lg border-solid border-2 border-zinc-700" v-for="game in gameStore.games">
            <GameTitle 
            :title="game.title"
            :tags="game.tags"
            />
            <GameRating
            :game="game"
            :rating="game.rating"
            :likes="game.likes"
            :dislikes="game.dislikes"
            />
            <GameToLibrary
            :title="game.title"
            :filesize="game.filesize"
            :price="game.price"
            />
        </div>
    </div>
</template>