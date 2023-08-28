import { ref, inject } from 'vue'
import { defineStore } from 'pinia'
import axios from 'axios'

export const useGameStore = defineStore('game', () => {
  const games = ref([])
  const searchTerm = ref("")
  const server = inject('server')
   const getAllGames = () => axios.post(server.value, {action : "fetchall"}).then(resp => games.value = resp.data)
   const getTopGames = () => axios.post(server.value, {action : "fetchTopGames"}).then(resp => games.value = resp.data)
   const getGamesBySearchTerm = () => axios.post(server.value, {action : "foundByGameLike", title : searchTerm.value}).then(resp => resp.data != "No result" ? games.value = resp.data : games.value = games.value)
   const calculateRatio = (game) => game.rating = game.likes == 0 && game.dislikes == 0 || game.likes > 0 && game.dislikes == 0 ? 100 : ((game.likes / (game.likes + game.dislikes) ) * 100).toFixed(0)
   const megabyteOrGigabyte = (filesize) => {return filesize >= 1000 ? filesize / 1000 + " GB" : filesize + " MB"}
   const likeThisGame = (game) => {
    game.likes++
    let id = game.id
    axios.post(server.value,{action : 'likeThisGame', id})
  }
   const dislikeThisGame = (game) => {
    game.dislikes++
    let id = game.id
    axios.post(server.value,{action : 'dislikeThisGame', id})
  }
   const sortByRating = () => games.value = games.value.sort((a,b) => {
    if(a.rating > b.rating) return -1;
    if(a.rating < b.rating) return 1;
    return 0;
   })
   const sortByPrice = () => games.value = games.value.sort((a,b) => {
    if(a.price > b.price) return -1;
    if(a.price < b.price) return 1;
    return 0;
   })
   const sortByPriceReverse = () => games.value = games.value.sort((a,b) => {
    if(a.price > b.price) return 1;
    if(a.price < b.price) return -1;
    return 0;
   })
   const sortByAlphabet = () => games.value = games.value.sort((a,b) => {
    if (a.title < b.title) return -1;
    if (a.title > b.title) return 1;
    return 0;
   })
   const sortByAlphabetReverse = () => games.value = games.value.sort((a,b) => {
    if (a.title < b.title) return 1;
    if (a.title > b.title) return -1;
    return 0;
   })
  return { games, searchTerm, megabyteOrGigabyte, likeThisGame, dislikeThisGame, calculateRatio, sortByAlphabet,sortByAlphabetReverse, sortByRating, getTopGames,sortByPrice, sortByPriceReverse, getGamesBySearchTerm, getAllGames }
})