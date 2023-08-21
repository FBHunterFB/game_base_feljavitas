import { ref, computed } from 'vue'
import { defineStore } from 'pinia'
import router from '@/router'

export const useUserStore = defineStore('user', () => {
  const username = ref("")
  const [library,ownedTitles] = [ref([]),ref([])]
  const [logged, loginModal, devMode] = [ref(false),ref(false),ref(false)]
  const [balance, balanceInHUF] = [ref(0.00),computed(() => {return (balance.value * 350).toFixed(2)})]

  const returnToMain = () => loginModal.value = false
  const goToLogin = () => loginModal.value = true
  const shortenUserName = () => {return username.value.length > 15 ? username.value.substring(0,15) + "..." : username.value}
  const login = () => [logged.value,loginModal.value] = [true,false]
  const logout = () => [logged.value,balance.value,library.value,ownedTitles.value] = [false,0.00,[],[]]
  const toggleDev = () => devMode.value = !devMode.value
  const addBalance = (amount) => (balance.value += amount).toFixed(2)
  const purchaseGame = (title, filesize, price) => {
    if(balance.value >= price && logged.value == true){
      (balance.value -= price).toFixed(2)
      let ownedGame = { title : title, filesize : filesize, playtime : 0} 
      library.value.push(ownedGame)
      ownedTitles.value.push(title)
    } else if(logged.value != true)
      goToLogin()
    else
      router.push("/addbalance")
  }

  return { logged, loginModal, balance, balanceInHUF, username, library, ownedTitles, devMode, returnToMain, goToLogin, login, logout, addBalance, shortenUserName, purchaseGame, toggleDev}
})