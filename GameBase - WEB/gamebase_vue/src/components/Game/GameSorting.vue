<script setup>
import {useGameStore} from "@/stores/game.js"
const gameStore = useGameStore()
import {Popover, PopoverButton, PopoverPanel, TabGroup, TabList, Tab, TabPanels, TabPanel} from '@headlessui/vue'
import { AdjustmentsHorizontalIcon, MagnifyingGlassIcon,XMarkIcon, SparklesIcon, TrophyIcon, CircleStackIcon, ReceiptPercentIcon, ChevronDoubleDownIcon, ChevronDoubleUpIcon } from '@heroicons/vue/20/solid'
</script>
<template>
    <div class="w-1/2 flex flex-row gap-2 mx-auto items-center justify-center font-semibold text-white">
        <Popover v-slot="{ open }">
          <PopoverButton
            :class="open ? '' : 'text-opacity-90'"
            class="group inline-flex items-center rounded-md bg-transparent px-3 py-2 text-base font-medium text-white hover:text-opacity-100 focus:outline-none focus-visible:ring-2 focus-visible:ring-white focus-visible:ring-opacity-75"
          >
            <span>Szűrés</span>
            <AdjustmentsHorizontalIcon
              :class="open ? '' : 'text-opacity-70'"
              class="ml-2 h-5 w-5 text-white transition duration-150 ease-in-out group-hover:text-opacity-80"
              aria-hidden="true"
            />
          </PopoverButton>
    
          <transition
            enter-active-class="transition duration-200 ease-out"
            enter-from-class="translate-y-1 opacity-0"
            enter-to-class="translate-y-0 opacity-100"
            leave-active-class="transition duration-150 ease-in"
            leave-from-class="translate-y-0 opacity-100"
            leave-to-class="translate-y-1 opacity-0"
          >
            <PopoverPanel
              class="absolute bottom-0 left-1/2 z-10 mt-3 w-screen max-w-sm -translate-x-1/2 transform px-4 sm:px-0 lg:max-w-3xl"
            >
              <div
                class="overflow-hidden rounded-lg shadow-lg ring-1 ring-black ring-opacity-5"
              >
                <div class="flex w-2/3 mx-auto items-center bg-zinc-900 rounded-lg gap-1 p-2">
                        <input type="text" class="bg-transparent focus:outline-none w-full" v-model="gameStore.searchTerm">
                        <button class="bg-transparent group flex items-center"
                        v-if="gameStore.searchTerm != ''"
                        @click="() => [gameStore.searchTerm = '',gameStore.getAllGames()]">
                            <XMarkIcon class="text-white h-5 w-5"/>
                        </button>
                        <button class="bg-transparent group flex items-center" @click="gameStore.getGamesBySearchTerm()">
                            <MagnifyingGlassIcon class="text-white h-5 w-5"/>
                        </button>
                </div>
                <div class="flex flex-cols gap-2 my-2 items-center justify-center w-3/4 mx-auto">
                    <button class="bg-zinc-900 focus:bg-zinc-800 w-fit p-2 rounded-lg border-zinc-800 drop-shadow-sm hover:drop-shadow-glow border-2 hover:shadow-md hover:shadow-slate-600 flex group items-center justify-center gap-1"
                    @click="gameStore.sortByRating()"
                    >
                    Legjobb
                    <SparklesIcon class="h-5 w-5 text-lime-500"/>
                    </button>
                    <button class="bg-zinc-900 focus:bg-zinc-800 w-fit p-2 rounded-lg border-zinc-800 drop-shadow-sm hover:drop-shadow-glow border-2 hover:shadow-md hover:shadow-slate-600 flex group items-center justify-center gap-1"
                    @click="gameStore.getTopGames()"
                    >
                    Népszerű
                    <TrophyIcon class="h-5 w-5 text-yellow-500"/>
                    </button>
                    <button class="bg-zinc-900 focus:bg-zinc-800 w-fit p-2 rounded-lg border-zinc-800 drop-shadow-sm hover:drop-shadow-glow border-2 hover:shadow-md hover:shadow-slate-600 flex group items-center justify-center gap-1"
                    @click="gameStore.sortByPriceReverse()"
                    >
                    Olcsó
                    <ReceiptPercentIcon class="h-5 w-5 text-cyan-500"/>
                    </button>
                    <button class="bg-zinc-900 focus:bg-zinc-800 w-fit p-2 rounded-lg border-zinc-800 drop-shadow-sm hover:drop-shadow-glow border-2 hover:shadow-md hover:shadow-slate-600 flex group items-center justify-center gap-1"
                    @click="gameStore.sortByPrice()"
                    >
                    Drága
                    <CircleStackIcon class="h-5 w-5 text-yellow-600"/>
                    </button>
                    <button class="bg-zinc-900 focus:bg-zinc-800 w-fit p-2 rounded-lg border-zinc-800 drop-shadow-sm hover:drop-shadow-glow border-2 hover:shadow-md hover:shadow-slate-600 flex group items-center justify-center gap-1"
                    @click="gameStore.sortByAlphabet()"
                    >
                    A-Z
                    <ChevronDoubleDownIcon class="h-5 w-5 text-white"/>
                    </button>
                    <button class="bg-zinc-900 focus:bg-zinc-800 w-fit p-2 rounded-lg border-zinc-800 drop-shadow-sm hover:drop-shadow-glow border-2 hover:shadow-md hover:shadow-slate-600 flex group items-center justify-center gap-1"
                    @click="gameStore.sortByAlphabetReverse()"
                    >
                    Z-A
                    <ChevronDoubleUpIcon class="h-5 w-5 text-white"/>
                    </button>
                </div>
              </div>
            </PopoverPanel>
          </transition>
        </Popover>
    </div>
</template>