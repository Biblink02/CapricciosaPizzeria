<script setup lang="ts">
import { Bars3Icon, XMarkIcon } from '@heroicons/vue/24/outline'
import { getSidebar } from '@/actions/GetSidebar'
import { images } from '@/Types/ImageHelper'
import { computed } from 'vue'
import { usePage } from '@inertiajs/vue3'
import { ref } from 'vue'

defineProps<{
    currentPage: string
}>()

const sidebar = computed(() => getSidebar())

const open = ref(false)
</script>

<template>
    <nav>
        <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
            <div class="relative flex h-16 items-center justify-between">
                <div
                    class="absolute inset-y-0 left-0 flex items-center sm:hidden"
                >
                    <!-- Mobile menu button-->
                    <button
                        type="button"
                        class="relative inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:ring-2 focus:ring-white focus:outline-hidden focus:ring-inset"
                        aria-controls="mobile-menu"
                        aria-expanded="false"
                        @click="open = !open"
                    >
                        <span class="absolute -inset-0.5"></span>
                        <span class="sr-only">Open main menu</span>
                        <!--
                          Icon when menu is closed.

                          Menu open: "hidden", Menu closed: "block"
                        -->
                        <x-mark-icon v-if="open" class="w-6 h-6"> </x-mark-icon>
                        <bars3-icon v-else class="w-6 h-6"> </bars3-icon>
                    </button>
                </div>
                <div
                    class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start"
                >
                    <div class="hidden sm:ml-6 sm:block">
                        <div class="flex space-x-4">
                            <a
                                v-for="page in sidebar"
                                :key="page.name"
                                :href="page.href"
                                class="rounded-md px-3 py-2 text-sm font-medium"
                                aria-current="page"
                                >{{ $t(page.name) }}</a
                            >
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Mobile menu, show/hide based on menu state. -->
        <div v-if="open" class="sm:hidden" id="mobile-menu">
            <div class="space-y-1 px-2 pt-2 pb-3">
                <a
                    v-for="page in sidebar"
                    :key="page.name"
                    :href="page.href"
                    class="block rounded-md px-3 py-2 text-base font-medium"
                    :class="{
                        'bg-green-50 text-capricciosa_dark_green':
                            currentPage === page.name,
                    }"
                    aria-current="page"
                    >{{ $t(page.name) }}</a
                >
            </div>
        </div>
    </nav>
</template>
