import { ref, computed } from 'vue'
import { defineStore } from 'pinia'

export const useGameStore = defineStore('game', () => {
  const games = ref([
    {
        title : "Payday 3",
        price : 9.99,
        tags : ["Co-op", "Multiplayer", "Action", "Shooter"],
        rating : 74,
        filesize : 4500
    },
    {
        title : "Fallout 3",
        price : 2.99,
        tags : ["Singleplayer", "Story", "Action", "Shooter"],
        rating : 89,
        filesize : 1900
    }]
    )

   const megabyteOrGigabyte = (filesize) => {return filesize >= 1000 ? filesize / 1000 + " GB" : filesize + " MB"}

  return { games, megabyteOrGigabyte }
})