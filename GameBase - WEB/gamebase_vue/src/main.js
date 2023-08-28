import { createApp, ref } from 'vue'
import { createPinia } from 'pinia'
import App from './App.vue'
import router from './router'
import './index.css'
const server = ref("http://localhost/gamebase/action.php")
const app = createApp(App)
app.provide('server',server)
app.use(createPinia())
app.use(router)
app.mount('#app')