<script setup lang="ts">

import AppLayout from "@/Layouts/AppLayout.vue";
import {ref} from "vue";
import Carousel from "primevue/carousel";
import {images} from "@/Types/ImageHelper";
import ActivityTimings from "@/Pages/Home/ActivityTimings.vue";
import Suppliers from "@/Pages/Home/Suppliers.vue";
import {Dialog, DialogPanel} from '@headlessui/vue'
import {Bars3Icon, XMarkIcon} from '@heroicons/vue/24/outline'
import Button from "primevue/button";
import ButtonComponent from "@/Components/ButtonComponent.vue";
import HeadingComponent from "@/Pages/Home/HeadingComponent.vue";
import IncentivesComponent from "@/Pages/Home/IncentivesComponent.vue";
import NavbarComponent from "@/Components/NavbarComponent.vue";

const props = defineProps<{
    footer: Footer
    slidingImages: SlidingImage[]
    suppliers: Supplier[],
    event: Event
}>()

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

</script>

<template>
    <AppLayout :navbar-hidden="true" :footer="footer" title="home">
        <div class="h-[30rem] relative">
            <div class="absolute opacity-50 inset-0 w-full h-full bg-repeat"
                 :style="{'background-size': 'auto 100%', 'background-image': 'url(' + images.wall_paper + ')'}">
            </div>
            <div class="absolute left-0 right-0 w-full py-32 mx-auto flex flex-col justify-center">
                <h1 class="w-full text-center mb-24  text-4xl font-bold tracking-tight text-gray-900 sm:text-6xl">Capricciosa
                    pizzeria</h1>
                <NavbarComponent>

                </NavbarComponent>
            </div>

        </div>
        <div class="flex flex-col w-full gap-24">

            <HeadingComponent class="shadow-sm" :sliding-images="slidingImages"></HeadingComponent>

            <ActivityTimings :event="event"></ActivityTimings>

            <div class="mx-auto max-w-7xl px-5 flex flex-col gap-10">
                <div class="flex flex-col">
                    <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">
                        {{ $t('Alcuni dei nostri piatti') }}</h2>
                    <p class="mt-3 max-w-3xl text-lg text-gray-500">Lorem ipsum dolor sit amet, consectetur adipiscing
                        elit. Et, egestas tempus tellus etiam sed. Quam a scelerisque amet ullamcorper eu enim et
                        fermentum, augue.</p>
                </div>

                <Carousel
                    class="overflow-hidden object-cover lg:aspect-auto lg:h-full lg:w-full max-w-7xl mx-auto rounded-xl"
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
                                    class=" w-screen h-96 object-cover rounded-xl"
                                    :src="images[slotProps.data.image]"
                                    alt="Location"
                                >
                            </a>
                        </div>
                    </template>
                </Carousel>
            </div>

            <Suppliers :suppliers="suppliers"/>

            <IncentivesComponent></IncentivesComponent>


        </div>
    </AppLayout>
</template>

<style>

.p-carousel-indicators {
    display: none;
}

.p-carousel-prev {
    display: none;
}

.p-carousel-next {
    display: none;
}
</style>

