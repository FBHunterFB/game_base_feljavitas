<script setup>
defineProps(['logged','loginModal','balance','balanceInHUF','devMode'])
import { useUserStore } from '../../stores/user'
import router from '@/router'
import { Menu, MenuButton, MenuItems, MenuItem } from '@headlessui/vue'
import { ArrowLeftOnRectangleIcon, CreditCardIcon, IdentificationIcon, FolderIcon, Cog6ToothIcon, BarsArrowDownIcon, CurrencyEuroIcon } from '@heroicons/vue/20/solid'
const userStore = useUserStore()
</script>
<template>
    <div class="flex flex-row-reverse items-center p-2 col-start-4 col-span-2" v-if="logged && !loginModal">
        <Menu as="div" class="relative inline-block text-left mx-2">
      <div>
        <MenuButton
        class="inline-flex w-full items-center gap-2 justify-center rounded-md px-4 py-2 text-md font-medium text-white hover:bg-opacity-30 focus:outline-none focus-visible:ring-2 focus-visible:ring-white focus-visible:ring-opacity-75"
        >
        {{ userStore.shortenUserName() }}
        <BarsArrowDownIcon
          :active="active"
          class="mr-2 h-5 w-5 text-white"
          aria-hidden="true"
        />
        </MenuButton>
      </div>

      <transition
        enter-active-class="transition duration-100 ease-out"
        enter-from-class="transform scale-95 opacity-0"
        enter-to-class="transform scale-100 opacity-100"
        leave-active-class="transition duration-75 ease-in"
        leave-from-class="transform scale-100 opacity-100"
        leave-to-class="transform scale-95 opacity-0"
      >
        <MenuItems
          class="absolute right-0 mt-2 w-56 origin-top-right divide-y divide-transparent rounded-md bg-zinc-900 shadow-lg ring-2 ring-black ring-opacity-5 focus:outline-none"
        >
        <MenuItem as="div" class="flex group items-center justify-center gap-1 text-white p-2 text-semibold text-md bg-black rounded-t-md">
          {{ balance.toFixed(2) }}
          <CurrencyEuroIcon class="w-7 h-7 text-lime-500 text-md"/>
        </MenuItem>
          <div class="px-1 py-1">
            <MenuItem v-slot="{ active }">
              <button
                @click='() => router.push("/profile")'
                :class="[
                  active ? 'bg-zinc-800 text-white' : 'text-white',
                  'group flex w-full items-center rounded-md px-2 py-2 text-md',
                ]"
              >
                <IdentificationIcon
                  :active="active"
                  class="mr-2 h-5 w-5 text-slate-300"
                  aria-hidden="true"
                />
                Profil
              </button>
            </MenuItem>
            <MenuItem v-slot="{ active }">
              <button
                @click='() => router.push("/library")'
                :class="[
                  active ? 'bg-zinc-800 text-white' : 'text-white',
                  'group flex w-full items-center rounded-md p-2 text-md',
                ]"
              >
                <FolderIcon
                  :active="active"
                  class="mr-2 h-5 w-5 text-yellow-400"
                  aria-hidden="true"
                />
                Könyvtár
              </button>
            </MenuItem>
          </div>
          <div class="px-1 py-1">
            <MenuItem v-slot="{ active }">
              <button
                @click="() => router.push('/addbalance')"
                :class="[
                  active ? 'bg-zinc-800 text-white' : 'text-white',
                  'group flex w-full items-center rounded-md p-2 text-md',
                ]"
              >
                <CreditCardIcon
                  :active="active"
                  class="mr-2 h-5 w-5 text-lime-500"
                  aria-hidden="true"
                />
                Egyenleg hozzáadása
              </button>
            </MenuItem>
            <MenuItem v-slot="{ active }">
              <button
                :class="[
                  active ? 'bg-zinc-800 text-white' : 'text-white',
                  'group flex w-full items-center rounded-md p-2 text-md',
                ]"
              >
                <Cog6ToothIcon
                  :active="active"
                  class="mr-2 h-5 w-5 text-cyan-200"
                  aria-hidden="true"
                />
                Beállítások
              </button>
            </MenuItem>
          </div>

          <div class="px-1 py-1">
            <MenuItem v-slot="{ active }">
              <button
                @click="userStore.logout()"
                :class="[
                  active ? 'bg-zinc-800 text-white' : 'text-white',
                  'group flex w-full items-center rounded-md p-2 text-md',
                ]"
              >
                <ArrowLeftOnRectangleIcon
                  :active="active"
                  class="mr-2 h-5 w-5 text-white"
                  aria-hidden="true"
                />
                Kijelentkezés
              </button>
            </MenuItem>
          </div>
        </MenuItems>
      </transition>
    </Menu>
        <div class="py-2 px-4 mx-2 rounded-lg flex items-center justify-center space-x-3 bg-gray-800">
            <button 
            class="text-white font-semibold uppercase"
            @click="userStore.toggleDev()">Dev</button>
            <div
            class="w-3 h-3 rounded-full bg-red-600 drop-shadow transition ease-in-out delay-100"
            v-if="!devMode"></div>
            <div
            class="w-3 h-3 rounded-full bg-green-600 transition ease-in-out delay-100"
            v-if="devMode"></div>
        </div>
    </div>
</template>