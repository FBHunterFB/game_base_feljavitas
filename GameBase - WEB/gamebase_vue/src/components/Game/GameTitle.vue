<script setup>
defineProps(['title','tags',])
</script>
<template>
    <h1 class="text-2xl text-center text-white bg-zinc-950 rounded-t-lg py-2">{{ title }}</h1>
    <div class="w-full mx-auto flex flex-cols gap-2 p-2 items-center justify-center">
        <div v-for="tag in tags" class="bg-zinc-800 p-2 rounded-lg text-center font-semibold text-slate-200">{{ tag }}</div>
    </div>
</template>