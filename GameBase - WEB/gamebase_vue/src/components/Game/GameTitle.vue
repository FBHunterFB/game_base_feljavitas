<script setup>
defineProps(['title','tags'])
</script>
<template>
    <h1 class="text-2xl text-center text-white bg-zinc-950 rounded-t-lg py-2">{{ title }}</h1>
    <div class="w-full mx-auto grid grid-cols-4 gap-2 px-2 py-4">
        <div v-for="tag in tags" class="bg-zinc-800 py-2 rounded-lg text-center font-semibold text-slate-200">{{ tag }}</div>
    </div>
</template>