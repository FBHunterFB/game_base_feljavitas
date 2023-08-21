<script setup>
defineProps(['logged','loginModal'])
import { useUserStore } from '../../stores/user'
const userStore = useUserStore()
</script>
<template>
    <div class="rounded-lg col-start-5 flex flex-row-reverse items-center p-2" v-if="!logged && !loginModal">
        <button
        class="p-2 mx-2 font-semibold hover:bg-cyan-500 hover:shadow-lg hover:shadow-cyan-500/50 text-white hover:text-black rounded-lg transition ease-in-out delay-100">Regisztráció</button>
        <button
        @click="userStore.goToLogin()"
        class="p-2 mx-2 font-semibold hover:bg-cyan-500 hover:shadow-lg hover:shadow-cyan-500/50 text-white hover:text-black rounded-lg transition ease-in-out delay-100">Bejelentkezés</button>
    </div>
</template>