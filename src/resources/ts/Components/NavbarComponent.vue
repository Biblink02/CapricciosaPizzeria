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
            <div class="flex h-16 items-center justify-between">
                <button
                    type="button"
                    class="sm:hidden p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:ring-2 focus:ring-white focus:outline-hidden focus:ring-inset"
                    aria-controls="mobile-menu"
                    aria-expanded="false"
                    @click="open = !open"
                >
                    <x-mark-icon v-if="open" class="w-6 h-6"> </x-mark-icon>
                    <bars3-icon v-else class="w-6 h-6"> </bars3-icon>
                </button>
                <div
                    class="w-full flex items-center justify-center lg:justify-start"
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

        <div v-if="open" class="sm:hidden">
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
