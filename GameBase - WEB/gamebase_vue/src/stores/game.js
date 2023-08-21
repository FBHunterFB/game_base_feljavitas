import { ref, computed } from 'vue'
import { defineStore } from 'pinia'

export const useGameStore = defineStore('game', () => {
  const games = ref([
    {
      title : "Payday 3",
      price : 9.99,
      tags : ["Co-op", "Multiplayer", "Action", "Shooter"],
      likes : 0,
      dislikes : 0,
      rating : 100,
      filesize : 4500,
      image : "https://cdn1.epicgames.com/offer/8962863aee2f4e7483fc37d4719c3f69/EGS_PAYDAY3_Starbreeze_S2_1200x1600-80e39c5ee902cba196b484464276c8b7"
    },
    {
      title : "Fallout 3",
      price : 2.99,
      tags : ["Singleplayer", "Story", "Action", "Shooter"],
      likes : 0,
      dislikes : 0,
      rating : 100,
      filesize : 100,
      image : "https://cdn1.epicgames.com/offer/8962863aee2f4e7483fc37d4719c3f69/EGS_PAYDAY3_Starbreeze_S2_1200x1600-80e39c5ee902cba196b484464276c8b7"
    }]
    )
    
   const calculateRatio = (game) => game.rating = game.likes == 0 && game.dislikes == 0 || game.likes > 0 && game.dislikes == 0 ? 100 : ((game.likes / (game.likes + game.dislikes) ) * 100).toFixed(0)
   const megabyteOrGigabyte = (filesize) => {return filesize >= 1000 ? filesize / 1000 + " GB" : filesize + " MB"}
   const likeThisGame = (game) => game.likes++
   const dislikeThisGame = (game) => game.dislikes++
  return { games, megabyteOrGigabyte, likeThisGame, dislikeThisGame, calculateRatio }
})