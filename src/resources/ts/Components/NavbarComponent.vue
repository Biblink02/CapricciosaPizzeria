<script setup lang="ts">
import { Bars3Icon, XMarkIcon } from '@heroicons/vue/24/outline'
import { getSidebar } from '@/actions/GetSidebar'
import { computed, ref } from 'vue'
import { images } from '@/Types/ImageHelper'

defineProps<{
    currentPage: string
    simplified: boolean
}>()

const sidebar = computed(() => getSidebar())
const open = ref(false)
</script>

<template>
    <nav
        aria-label="Main Navigation"
        class="flex flex-col items-center justify-center"
        :class="{ 'sm:shadow-md': !simplified }"
    >
        <div
            class="w-full max-w-4xl p-3 flex max-sm:flex-row-reverse items-center"
            :class="{ 'justify-between': !simplified }"
        >
            <!-- Mobile menu toggle button with dynamic aria-expanded -->
            <button
                type="button"
                class="sm:hidden text-gray-400 hover:bg-gray-700 hover:text-white focus:ring-2 focus:ring-white focus:outline-hidden focus:ring-inset"
                aria-controls="mobile-menu"
                :aria-expanded="open.toString()"
                @click="open = !open"
            >
                <x-mark-icon v-if="open" class="w-6 h-6"></x-mark-icon>
                <bars3-icon v-else class="w-6 h-6"></bars3-icon>
            </button>
            <img
                v-if="!simplified"
                class="sm:h-25 h-15 object-scale-down"
                :src="images.name"
                alt="name"
            />
            <ul class="max-sm:hidden flex space-x-10">
                <li v-for="page in sidebar" :key="page.name">
                    <a
                        :class="
                            page.name === currentPage
                                ? 'border-capricciosa_green border-b-2'
                                : 'text-gray-500'
                        "
                        :href="page.href"
                        class="py-2 text-sm font-medium"
                        aria-current="page"
                    >
                        {{ $t(page.name) }}
                    </a>
                </li>
            </ul>
        </div>

        <!-- Mobile navigation menu -->
        <div v-if="open" id="mobile-menu" class="w-full sm:hidden">
            <ul
                class="space-y-1 px-2 pt-2 pb-3"
                role="menu"
                aria-label="Mobile Navigation"
            >
                <li v-for="page in sidebar" :key="page.name" role="none">
                    <a
                        :href="page.href"
                        class="text-right block rounded-md px-3 py-2 text-base font-medium"
                        :class="{
                            'bg-green-50 text-capricciosa_dark_green':
                                currentPage === page.name,
                        }"
                        aria-current="page"
                        role="menuitem"
                    >
                        {{ $t(page.name) }}
                    </a>
                </li>
            </ul>
        </div>
    </nav>
</template>
