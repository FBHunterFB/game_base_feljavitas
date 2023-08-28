<script setup>
import {ref} from 'vue'
defineProps(["ownedGames","username","displayName"])
const gameDetails = ref(false)
</script>
<template>
    <div class="w-1/4 grid grid-cols-1">

    </div>
    <div class="w-1/2 mx-auto grid-cols-2 grid items-center gap-1 justify-center">
        <h1 class="text-center text-white w-full bg-zinc-800 rounded-tl-lg p-2 font-bold">{{ username }}</h1>
        <div class="w-full">
            <button
            class="bg-zinc-800 text-white w-full p-2 rounded-tr-lg font-bold"
            @click="() => gameDetails = !gameDetails">Játékok
            </button>
            <div
            class="bg-zinc-900 w-full col-start-2"
            v-if="gameDetails">
                <p v-for="ownedGame in ownedGames">{{ ownedGame }}</p>
            </div>
        </div>
    </div>
</template>