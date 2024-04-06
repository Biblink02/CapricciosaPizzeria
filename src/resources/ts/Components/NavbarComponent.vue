<script setup lang="ts">
import {Disclosure, DisclosureButton, DisclosurePanel} from '@headlessui/vue';
import {Bars3Icon, XMarkIcon} from '@heroicons/vue/24/outline';
import {getSidebar} from '@/actions/GetSidebar';
import {computed} from 'vue';
import route from 'ziggy-js';
import {router} from '@inertiajs/vue3';

const sidebar = computed(() => getSidebar());

</script>

<template>
    <Disclosure
        v-slot="{ open }"
        as="nav"
        class="w-full bg-white shadow border-b-4 border-red-500"
    >
        <div class="flex flex-col justify-center navbar mx-auto max-w-screen-2xl px-4 h-32">
            <div class="flex flex-row h-16">
                <img :src="images.logo" alt="logo" class="object-scale-down w-24 mx-5">
                <div class="flex">
                    <div class="hidden sm:flex sm:space-x-5">
                        <a
                            v-for="item in sidebar"
                            :key="item.name"
                            :href="item.href"
                            :class="[item.current ? 'border-[#a5b977] text-gray-900' : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700']"
                            class="inline-flex uppercase items-center border-b-2 px-1 pt-1 text-xs font-bold "
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
            <div class="space-y-1 pt-2 pb-3 border-b-4 border-red-500">
                <DisclosureButton
                    v-for="item in sidebar"
                    :key="item.name"
                    as="a"
                    :href="item.href"
                    :class="[item.current ? 'bg-orange-50 border-orange-500 text-orange-700' : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700']"
                    class="block border-l-4 border-transparent py-2 pl-3 pr-4 text-base font-medium text-gray-500 hover:border-gray-300 hover:text-gray-700"
                >
                    {{ $t(item.name) }}
                </DisclosureButton>
            </div>
        </DisclosurePanel>
    </Disclosure>
</template>
