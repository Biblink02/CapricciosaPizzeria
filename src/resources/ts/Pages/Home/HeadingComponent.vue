<script setup lang="ts">
import {ref} from 'vue'
import {Dialog, DialogPanel} from '@headlessui/vue'
import {Bars3Icon, XMarkIcon} from '@heroicons/vue/24/outline'
import {images} from "@/Types/ImageHelper.js";
import Carousel from "primevue/carousel";
import Button from "primevue/button";
import {router, usePage} from "@inertiajs/vue3";
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

const visitEvents = () => {
    router.visit(route('events'))
}

const mobileMenuOpen = ref(false)
</script>

<template>
    <div class="overflow-hidden relative bg-white">
        <div class="mx-auto max-w-7xl">
            <div class="relative z-10 lg:w-full lg:max-w-2xl">

                <div class="relative px-6 pt-6 lg:pl-8 lg:pr-0">
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
                        <h1 class="text-4xl font-bold tracking-tight text-gray-900 sm:text-6xl">Location</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="overflow-hidden bg-gray-50 lg:absolute lg:inset-y-0 lg:right-0 lg:w-1/2">
            <Carousel
                class="overflow-hidden max-lg:mx-5 object-cover lg:aspect-auto lg:h-full lg:w-full"
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
                                class="overflow-hidden w-screen h-[812px] lg:h-content max-lg:h-96 max-lg:rounded-xl object-cover"
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
