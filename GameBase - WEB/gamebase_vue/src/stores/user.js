import { ref, computed } from 'vue'
import { defineStore } from 'pinia'

export const useUserStore = defineStore('user', () => {
  const username = ref("")
  const [logged, loginModal] = [ref(false),ref(false)]
  const [balance, balanceInEUR] = [ref(0),computed(() => {return balance.value / 350})]
  const returnToMain = () => loginModal.value = false
  const goToLogin = () => loginModal.value = true
  const login = () => [logged.value,loginModal.value] = [true,false]
  const logout = () => [logged.value,balance.value] = [false,0]
  const addBalance = (amount) => balance.value += amount

  return { logged, loginModal, balance, balanceInEUR, username, returnToMain, goToLogin, login, logout, addBalance }
})