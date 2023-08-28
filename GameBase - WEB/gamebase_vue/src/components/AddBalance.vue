<script setup>
defineProps(['prices'])
import { useUserStore } from '../stores/user'
import { CurrencyEuroIcon, ShoppingCartIcon } from '@heroicons/vue/20/solid'
const userStore = useUserStore()
</script>
<template>
    <div class="flex flex-col mx-auto w-2/5 text-center my-10">
        <div v-for="price in prices" class="my-3 flex flex-col mx-auto w-2/4">
            <p class="bg-zinc-800 font-semibold text-white w-full rounded-t-lg flex group items-center justify-center gap-1 p-4 text-lg">{{ price[1] }}
            <CurrencyEuroIcon class="h-7 w-7 text-lime-500"/>
            </p>
            <button
            @click="userStore.addBalance(price[1])"
            class="bg-zinc-900 p-2 text-white font-semibold rounded-b-lg flex group items-center justify-center gap-2">
            <ShoppingCartIcon class="w-5 h-5 text-blue-500"/>
            Hozzáadás
            </button>
        </div>
    </div>
</template>