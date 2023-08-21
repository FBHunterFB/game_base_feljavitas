<script setup>
import {ref} from 'vue'
import AddBalance from '../components/AddBalance.vue'
const prices = ref([[350,1],[1750,5],[7000,20],[17500,50],[35000,100]])
</script>
<template>
    <AddBalance
    :prices="prices"
    />
</template>