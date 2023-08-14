<script setup>
import {useGameStore} from "@/stores/game.js"
import {useUserStore} from "@/stores/user.js"
const gameStore = useGameStore()
const userStore = useUserStore()
</script>
<template>
    <div class="w-1/2 flex flex-col gap-4 mx-auto">
        <div class="bg-zinc-900 rounded-lg p-4 border-solid border-2 border-zinc-700 w-full" v-for="lib in userStore.library" @click="() => lib.playtime += 1">
            <div class="font-semibold mx-auto w-full">
                <h1 class="text-2xl text-center text-white bg-cyan-900 border-2 border-solid border-sky-950 rounded-lg py-2">{{ lib.title }}</h1>
            </div>
            <div class="w-full mx-auto grid grid-cols-4 my-4 items-center">
                <p class="rounded-l-lg bg-zinc-700 p-2 text-center font-semibold text-white">Méret</p>
                <h1 class="rounded-r-lg bg-zinc-800 p-2 text-center font-semibold text-white mr-2">{{ gameStore.megabyteOrGigabyte(lib.filesize) }}</h1>
                <p class="rounded-l-lg bg-gray-700 p-2 text-center font-semibold text-white">Játszott órák</p>
                <h1 class="rounded-r-lg bg-gray-800 p-2 text-center font-semibold text-white">{{ lib.playtime }}</h1>
            </div>
        </div>
    </div>
</template>