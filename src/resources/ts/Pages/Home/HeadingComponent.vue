<script setup lang="ts">
import {ref} from 'vue'
import {images} from "@/Types/ImageHelper.js";
import Carousel from "primevue/carousel";
import {router, usePage} from "@inertiajs/vue3";
import route from "ziggy-js";
import ButtonComponent from "@/Components/ButtonComponent.vue";
import NavbarComponent from "@/Components/NavbarComponent.vue";

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
const visitAboutUs = () => {
    router.visit(route('about-us'))
}


</script>

<template>
    <div class="overflow-hidden lg:-mr-5 relative bg-white">
        <div class="mx-auto max-w-7xl">
            <div class="relative z-10 lg:w-full lg:max-w-2xl">
                <svg
                    class="absolute inset-y-0 right-8 hidden h-full w-80 translate-x-1/2 transform fill-white lg:block"
                    viewBox="0 0 100 100" preserveAspectRatio="none" aria-hidden="true">
                    <polygon points="0,0 90,0 50,100 0,100"/>
                </svg>
                <div class="relative pt-6 lg:pl-8 lg:pr-0 max-sm:pb-8">
                    <NavbarComponent class="shadow-none"></NavbarComponent>
                </div>
                <div class="relative sm:py-20 lg:py-20 lg:pr-0">
                    <div class="mx-auto max-w-2xl lg:mx-0 lg:max-w-xl">
                        <div class="hidden sm:mb-10 sm:flex">
                            <div
                                @click="visitEvents"
                                class="relative rounded-full py-1 px-3 text-sm leading-6 text-gray-500 ring-1 ring-gray-900/10 hover:ring-gray-900/20">
                                {{ $t('Events organized by us') }} <a href="/events"
                                                                      class="whitespace-nowrap font-semibold text-capricciosa_green"><span
                                class="absolute inset-0" aria-hidden="true"/>{{ $t('Read more') }} <span
                                aria-hidden="true">&rarr;</span></a>
                            </div>
                        </div>
                        <div class="w-fit my-16 max-w-2xl">
                            <img :src="images.name" alt="name">
                        </div>
                            <p class="mt-8 text-lg leading-8 text-gray-500 md:whitespace-nowrap text-center md:text-left">
                                {{ $t('Welcome to our pizzeria, where design meets quality.') }}
                            </p>
                        <div class="mt-10 flex items-center gap-x-6">
                            <ButtonComponent @click="visitAboutUs">
                                {{ $t('Our story') }}
                            </ButtonComponent>
                            <a href="https://maps.app.goo.gl/QscbV2P8b47SzXWm7" target="_blank"
                               class="text-base font-semibold leading-7 text-gray-900">{{ $t('Find us') }}
                                <span aria-hidden="true">→</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="overflow-hidden lg:absolute lg:inset-y-0 lg:right-0 lg:w-1/2">
            <Carousel
                class="overflow-hidden object-cover lg:aspect-auto lg:h-full lg:w-full"
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
