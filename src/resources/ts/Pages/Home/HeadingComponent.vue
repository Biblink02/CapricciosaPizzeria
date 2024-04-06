<script setup lang="ts">
import {ref} from 'vue'
import {Dialog, DialogPanel} from '@headlessui/vue'
import {Bars3Icon, XMarkIcon} from '@heroicons/vue/24/outline'
import {images} from "@/Types/ImageHelper.js";
import Carousel from "primevue/carousel";
import Button from "primevue/button";
import {usePage} from "@inertiajs/vue3";
import route from "ziggy-js";

defineProps<{
    slidingImages: SlidingImage[]
}>()

const page = usePage();
const navigation = page.props.sidebar;

const responsiveOptions = ref([
    {
        breakpoint: '1400px',
        numVisible: 1,
        numScroll: 1
    },
    {
        breakpoint: '1199px',
        numVisible: 1,
        numScroll: 1
    },
    {
        breakpoint: '767px',
        numVisible: 1,
        numScroll: 1
    },
    {
        breakpoint: '575px',
        numVisible: 1,
        numScroll: 1
    }
]);

const mobileMenuOpen = ref(false)
</script>

<template>
    <div class="overflow-hidden relative bg-white">
        <div class="mx-auto max-w-7xl">
            <div class="relative z-10 lg:w-full lg:max-w-2xl">
                <svg class="absolute inset-y-0 right-8 hidden h-full w-80 translate-x-1/2 transform fill-white lg:block"
                     viewBox="0 0 100 100" preserveAspectRatio="none" aria-hidden="true">
                    <polygon points="0,0 90,0 50,100 0,100"/>
                </svg>

                <div class="relative px-6 pt-6 lg:pl-8 lg:pr-0">
                    <nav class="flex items-center justify-between sm:h-10 lg:justify-start" aria-label="Global">
                        <a href="#" class="-m-1.5 p-1.5">
                            <span class="sr-only">Your Company</span>
                            <img alt="Your Company" class="h-24 w-auto" :src="images.logo"/>
                        </a>
                        <button type="button" class="-m-2.5 rounded-md p-2.5 text-gray-700 lg:hidden"
                                @click="mobileMenuOpen = true">
                            <span class="sr-only">Open main menu</span>
                            <Bars3Icon class="h-6 w-6" aria-hidden="true"/>
                        </button>
                        <div class="hidden lg:ml-12 lg:block lg:space-x-14">
                            <a v-for="item in navigation" :key="item.name" :href="route(item.route)"
                               class="text-sm font-semibold leading-6 text-gray-900">{{ item.name }}</a>
                        </div>
                    </nav>
                    <Dialog as="div" @close="mobileMenuOpen = false" :open="mobileMenuOpen">
                        <DialogPanel class="fixed inset-0 z-10 overflow-y-auto bg-white px-6 py-6 lg:hidden">
                            <div class="flex flex-row-reverse items-center justify-between">
                                <button type="button"
                                        class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-700"
                                        @click="mobileMenuOpen = false">
                                    <span class="sr-only">Close menu</span>
                                    <XMarkIcon class="h-6 w-6" aria-hidden="true"/>
                                </button>
                                <a href="#" class="-m-1.5 p-1.5">
                                    <span class="sr-only">Your Company</span>
                                    <img class="h-8"
                                         src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600" alt=""/>
                                </a>
                            </div>
                            <div class="mt-6 space-y-2">
                                <a v-for="item in navigation" :key="item.name" :href="route(item.route)"
                                   class="-mx-3 block rounded-lg py-2 px-3 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-400/10">{{
                                        item.name
                                    }}</a>
                            </div>
                        </DialogPanel>
                    </Dialog>
                </div>

                <div class="relative py-32 px-6 sm:py-40 lg:py-56 lg:px-8 lg:pr-0">
                    <div class="mx-auto max-w-2xl lg:mx-0 lg:max-w-xl">
                        <div class="hidden sm:mb-10 sm:flex">
                            <div
                                class="relative rounded-full py-1 px-3 text-sm leading-6 text-gray-500 ring-1 ring-gray-900/10 hover:ring-gray-900/20">
                                {{ $t('Eventi organizzati da noi ') }} <a href="#"
                                                                          class="whitespace-nowrap font-semibold text-capricciosa_green"><span
                                class="absolute inset-0" aria-hidden="true"/>{{ $t('Read more') }} <span
                                aria-hidden="true">&rarr;</span></a>
                            </div>
                        </div>
                        <h1 class="text-4xl font-bold tracking-tight text-gray-900 sm:text-6xl">Capricciosa
                            pizzeria</h1>
                        <p class="mt-6 text-lg leading-8 text-gray-600">Anim aute id magna aliqua ad ad non deserunt
                            sunt. Qui irure qui lorem cupidatat commodo. Elit sunt amet fugiat veniam occaecat fugiat
                            aliqua.</p>
                        <div class="mt-10 flex items-center gap-x-6">
                            <a href="#"
                               class="rounded-md bg-capricciosa_green px-3.5 py-1.5 text-base font-semibold leading-7 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Dove
                                siamo</a>
                            <a href="#" class="text-base font-semibold leading-7 text-gray-900">{{ $t('Raggiungici') }}
                                <span aria-hidden="true">→</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-gray-50 lg:absolute lg:inset-y-0 lg:right-0 lg:w-1/2">
            <Carousel
                class="object-cover lg:aspect-auto lg:h-full lg:w-full"
                :value="slidingImages"
                :num-visible="1"
                :num-scroll="1"
                :responsive-options="responsiveOptions"
                circular
                :autoplay-interval="6000"
            >
                <template #item="slotProps">
                    <div>
                        <a :href="slotProps.data.href">
                            <img
                                class="w-screen h-content object-cover"
                                :src="images[slotProps.data.image]"
                                alt="Location"
                            >
                        </a>
                    </div>
                </template>
            </Carousel>
        </div>
    </div>
</template>

<!--
<template>
    <div class="relative">
        <div class="isolate bg-white">
            <div class="absolute inset-x-0 top-[-10rem] -z-10 transform-gpu overflow-hidden blur-3xl sm:top-[-20rem]">
                <svg class="relative left-[calc(50%-11rem)] -z-10 h-[21.1875rem] max-w-none -translate-x-1/2 rotate-[30deg] sm:left-[calc(50%-30rem)] sm:h-[42.375rem]" viewBox="0 0 1155 678">
                    <path fill="url(#9b2541ea-d39d-499b-bd42-aeea3e93f5ff)" fill-opacity=".3" d="M317.219 518.975L203.852 678 0 438.341l317.219 80.634 204.172-286.402c1.307 132.337 45.083 346.658 209.733 145.248C936.936 126.058 882.053-94.234 1031.02 41.331c119.18 108.451 130.68 295.337 121.53 375.223L855 299l21.173 362.054-558.954-142.079z" />
                    <defs>
                        <linearGradient id="9b2541ea-d39d-499b-bd42-aeea3e93f5ff" x1="1155.49" x2="-78.208" y1=".177" y2="474.645" gradientUnits="userSpaceOnUse">
                            <stop stop-color="#a5b977" />
                            <stop offset="1" stop-color="#a5b977" />
                        </linearGradient>
                    </defs>
                </svg>
            </div>
            <div class="px-6 pt-6 lg:px-8">
                <nav class="flex items-center justify-between" aria-label="Global">
                    <div class="flex lg:flex-1">
                        <a href="#" class="-m-1.5 p-1.5">
                            <span class="sr-only">Your Company</span>
                        </a>
                    </div>
                    <div class="flex lg:hidden">
                        <button type="button" class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-700" @click="mobileMenuOpen = true">
                            <span class="sr-only">Open main menu</span>
                            <Bars3Icon class="h-6 w-6" aria-hidden="true" />
                        </button>
                    </div>
                    <div class="hidden lg:flex lg:gap-x-12">
                        <a v-for="item in navigation" :key="item.name" :href="item.href" class="text-sm font-semibold leading-6 text-gray-900">{{ item.name }}</a>
                    </div>
                    <div class="hidden lg:flex lg:flex-1 lg:justify-end">
                    </div>
                </nav>
                <Dialog as="div" @close="mobileMenuOpen = false" :open="mobileMenuOpen">
                    <DialogPanel focus="true" class="fixed inset-0 z-10 overflow-y-auto bg-white px-6 py-6 lg:hidden">
                        <div class="flex items-center justify-between">
                            <a href="#" class="-m-1.5 p-1.5">
                                <span class="sr-only">Your Company</span>
                            </a>
                            <button type="button" class="-m-2.5 rounded-md p-2.5 text-gray-700" @click="mobileMenuOpen = false">
                                <span class="sr-only">Close menu</span>
                                <XMarkIcon class="h-6 w-6" aria-hidden="true" />
                            </button>
                        </div>
                        <div class="mt-6 flow-root">
                            <div class="-my-6 divide-y divide-gray-500/10">
                                <div class="space-y-2 py-6">
                                    <a v-for="item in navigation" :key="item.name" :href="item.href" class="-mx-3 block rounded-lg py-2 px-3 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-400/10">{{ item.name }}</a>
                                </div>
                                <div class="py-6">
                                    <a href="#" class="-mx-3 block rounded-lg py-2.5 px-3 text-base font-semibold leading-6 text-gray-900 hover:bg-gray-400/10">Log in</a>
                                </div>
                            </div>
                        </div>
                    </DialogPanel>
                </Dialog>
            </div>
            <main>
                <div class="relative py-24 sm:py-32 lg:pb-40">
                    <div class="mx-auto max-w-7xl px-6 lg:px-8">
                        <div class="mx-auto max-w-2xl text-center">
                            <div class="hidden sm:mb-8 sm:flex sm:justify-center">
                                <div class="relative rounded-full py-1 px-3 text-sm leading-6 text-gray-600 ring-1 ring-gray-900/10 hover:ring-gray-900/20">
                                    {{$t('Gli eventi organizzati da noi')}} <a href="#" class="font-semibold text-black"><span class="absolute inset-0" aria-hidden="true" />{{$t('Leggi')}} <span aria-hidden="true">&rarr;</span></a>
                                </div>
                            </div>
                            <h1 class="text-4xl font-bold tracking-tight text-gray-900 sm:text-6xl">Capricciosa pizzeria</h1>
                            <p class="mt-6 text-lg leading-8 text-gray-600">Anim aute id magna aliqua ad ad non deserunt sunt. Qui irure qui lorem cupidatat commodo. Elit sunt amet fugiat veniam occaecat fugiat aliqua.</p>
                            <div class="mt-10 flex items-center justify-center gap-x-6">
                                <a href="#" class="rounded-md bg-capricciosa_green px-3.5 py-1.5 text-base font-semibold leading-7 text-white shadow-sm focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-lime-600">{{$t('Dove ci troviamo')}}</a>
                                <a href="#" class="text-base font-semibold leading-7 text-gray-900">{{$t('Chi siamo')}} <span aria-hidden="true">→</span></a>
                            </div>
                        </div>
                        <div class="mt-16 flow-root sm:mt-24">
                                <Carousel
                                    :value="slidingImages"
                                    :num-visible="1"
                                    :num-scroll="1"
                                    :responsive-options="responsiveOptions"
                                    circular
                                    :autoplay-interval="6000"
                                >
                                    <template #item="slotProps">
                                        <div>
                                            <a :href="slotProps.data.href">
                                                <img
                                                    class="w-screen object-fill rounded-xl"
                                                    :src="images[slotProps.data.image]"
                                                    alt="Location"
                                                >
                                            </a>
                                        </div>
                                    </template>
                                </Carousel>
                        </div>
                    </div>
                    <div class="absolute inset-x-0 top-[calc(100%-13rem)] -z-10 transform-gpu overflow-hidden blur-3xl sm:top-[calc(100%-30rem)]">
                        <svg class="relative left-[calc(50%+3rem)] h-[21.1875rem] max-w-none -translate-x-1/2 sm:left-[calc(50%+36rem)] sm:h-[42.375rem]" viewBox="0 0 1155 678">
                            <path fill="url(#b9e4a85f-ccd5-4151-8e84-ab55c66e5aa1)" fill-opacity=".3" d="M317.219 518.975L203.852 678 0 438.341l317.219 80.634 204.172-286.402c1.307 132.337 45.083 346.658 209.733 145.248C936.936 126.058 882.053-94.234 1031.02 41.331c119.18 108.451 130.68 295.337 121.53 375.223L855 299l21.173 362.054-558.954-142.079z" />
                            <defs>
                                <linearGradient id="b9e4a85f-ccd5-4151-8e84-ab55c66e5aa1" x1="1155.49" x2="-78.208" y1=".177" y2="474.645" gradientUnits="userSpaceOnUse">
                                    <stop stop-color="a5b977" />
                                    <stop offset="1" stop-color="#a5b977" />
                                </linearGradient>
                            </defs>
                        </svg>
                    </div>
                </div>
            </main>
        </div>
    </div>
</template>
-->
