<script setup>
import { useUserStore } from '../stores/user'
import ProfileUser from '../components/ProfileUser.vue'
const userStore = useUserStore()
</script>
<template>
    <ProfileUser
    :username="userStore.username"
    :ownedGames="userStore.ownedTitles"
    />
</template>