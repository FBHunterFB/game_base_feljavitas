<script setup>
import {useUserStore} from "@/stores/user.js"
import NavSites from "./Navigation/NavSites.vue"
import NavAccess from "./Navigation/NavAccess.vue"
import NavLoginModal from "./Navigation/NavLoginModal.vue"
import NavUser from "./Navigation/NavUser.vue"
const userStore = useUserStore()
</script>

<template>
    <nav class="rounded-lg p-2 sticky top-1 w-full mx-auto grid grid-cols-5 z-50">
        <NavSites/>
        <NavAccess
        :logged="userStore.logged"
        :loginModal="userStore.loginModal"
        />
        <NavLoginModal
        :logged="userStore.logged"
        :loginModal="userStore.loginModal"
        v-model:username="userStore.username"
        />
        <NavUser
        :logged="userStore.logged"
        :loginModal="userStore.loginModal"
        :balance="userStore.balance"
        :balanceInHUF="userStore.balanceInHUF"
        :devMode="userStore.devMode"
        />
    </nav>
</template>