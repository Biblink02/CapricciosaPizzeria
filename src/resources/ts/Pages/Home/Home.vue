<script setup lang="ts">

import AppLayout from "@/Layouts/AppLayout.vue";
import {ref} from "vue";
import Carousel from "primevue/carousel";
import {images} from "@/Types/ImageHelper";
import Events from "@/Pages/Home/Events.vue";
import Suppliers from "@/Pages/Home/Suppliers.vue";
import {Dialog, DialogPanel} from '@headlessui/vue'
import {Bars3Icon, XMarkIcon} from '@heroicons/vue/24/outline'
import Button from "primevue/button";
import ButtonComponent from "@/Components/ButtonComponent.vue";
import HeadingComponent from "@/Pages/Home/HeadingComponent.vue";
import IncentivesComponent from "@/Pages/Home/IncentivesComponent.vue";
import NavbarComponent from "@/Components/NavbarComponent.vue";
import Social from "@/Pages/Home/Social.vue";

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
        <div class="flex px-5 flex-col w-full gap-24">

            <HeadingComponent :sliding-images="slidingImages"></HeadingComponent>

            <Events :event="event"></Events>

            <div class="mx-auto mt-12 max-w-7xl flex flex-col gap-10">
                <div class="flex flex-col">
                    <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">
                        {{ $t('Some of our Dishes') }}</h2>
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
                                    class=" w-screen h-[30rem] object-cover rounded-xl"
                                    :src="images[slotProps.data.image]"
                                    alt="Location"
                                >
                            </a>
                        </div>
                    </template>
                </Carousel>
            </div>

            <Suppliers class="mt-12" :suppliers="suppliers"/>

            <Social/>
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

