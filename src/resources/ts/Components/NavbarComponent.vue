<script setup lang="ts">
import { Bars3Icon, XMarkIcon } from '@heroicons/vue/24/outline'
import { getSidebar } from '@/actions/GetSidebar'
import { images } from '@/Types/ImageHelper'
import { computed } from 'vue'
import { usePage } from '@inertiajs/vue3'

const sidebar = computed(() => getSidebar())

const page = usePage()
</script>

<template>
    <!--    <Disclosure v-slot="{ open }" as="nav" class="w-full bg-white shadow">
        <div
            class="flex flex-col justify-center navbar mx-auto max-w-2xl py-12 overflow-y-hidden"
        >
            <div class="flex flex-row h-16 justify-between w-full">
                <img
                    v-if="page.url !== '/'"
                    :src="images.logo"
                    alt="logo"
                    class="object-cover w-32 h-24 mt-1"
                />
                <div class="flex">
                    <div class="hidden sm:flex sm:space-x-5">
                        <a
                            v-for="item in sidebar"
                            :key="item.name"
                            :href="item.href"
                            :class="[
                                item.current
                                    ? 'border-capricciosa_green text-gray-900'
                                    : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700',
                            ]"
                            class="inline-flex items-center border-b-2 px-1 pt-1 text-sm font-semibold leading-6"
                        >
                            {{ $t(item.name) }}
                        </a>
                    </div>
                </div>

                <div class="-mr-2 flex items-center sm:hidden">
                    <DisclosureButton
                        class="inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-gray-100 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-orange-500"
                    >
                        <span class="sr-only">Open main menu</span>
                        <Bars3Icon
                            v-if="!open"
                            class="block h-6 w-6"
                            aria-hidden="true"
                        />
                        <XMarkIcon
                            v-else
                            class="block h-6 w-6"
                            aria-hidden="true"
                        />
                    </DisclosureButton>
                </div>
            </div>
        </div>

        <DisclosurePanel class="sm:hidden">
            <div class="space-y-1 pt-2 pb-3">
                <DisclosureButton
                    v-for="item in sidebar"
                    :key="item.name"
                    as="a"
                    :href="item.href"
                    :class="[
                        item.current
                            ? 'bg-green-50 border-orange-500 text-capricciosa_dark_green'
                            : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700',
                    ]"
                    class="block border-l-4 border-transparent py-2 pl-3 pr-4 text-base font-medium hover:border-gray-300 hover:text-gray-700"
                >
                    {{ $t(item.name) }}
                </DisclosureButton>
            </div>
        </DisclosurePanel>
    </Disclosure>-->
</template>
