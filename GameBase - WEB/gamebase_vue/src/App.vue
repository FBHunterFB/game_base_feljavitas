<script setup>
import NavBar from './components/navbar.vue'
</script>

<template>
  <NavBar/>
  <RouterView/>
</template>

<style>
body{
  @apply bg-zinc-950
}
</style>