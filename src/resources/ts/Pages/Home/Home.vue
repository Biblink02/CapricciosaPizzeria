<script setup lang="ts">

import AppLayout from "@/Layouts/AppLayout.vue";
import {ref} from "vue";
import Carousel from "primevue/carousel";
import {images} from "@/Types/ImageHelper";
import Events from "@/Pages/Home/Events.vue";
import Suppliers from "@/Pages/Home/Suppliers.vue";
import HeadingComponent from "@/Pages/Home/HeadingComponent.vue";
import IncentivesComponent from "@/Pages/Home/IncentivesComponent.vue";
import NavbarComponent from "@/Components/NavbarComponent.vue";
import Social from "@/Pages/Home/Social.vue";

const props = defineProps<{
    footer: Footer
    suppliers: Supplier[],
    event: Event
}>();

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

const locationImages = [
    {
        image: "carousel_1"
    },
    {
        image: "carousel_2"
    },
    {
        image: "carousel_3"
    },
    {
        image: "carousel_4"
    }
]

const dishesImages = [
    {
        image: "dish_1"
    },
    {
        image: "dish_2"
    },
    {
        image: "dish_3"
    },
    {
        image: "dish_4"
    }
]

</script>

<template>
    <AppLayout :navbar-hidden="true" :footer="footer" title="home">
        <div class="flex px-5 flex-col w-full gap-24">

            <HeadingComponent :sliding-images="locationImages"></HeadingComponent>

            <Events :event="event"></Events>

            <div class="mx-auto mt-12 max-w-7xl flex flex-col gap-10">
                <div class="flex flex-col">
                    <p class="mx-auto text-4xl tracking-tight text-gray-900 font-[Salmela] mb-6">
                        {{ $t('Our Dishes') }}
                    </p>
                </div>

                <Carousel
                    class="overflow-hidden object-cover lg:aspect-auto lg:h-full lg:w-full max-w-7xl mx-auto rounded-xl"
                    :value="dishesImages"
                    :num-visible="2"
                    :num-scroll="1"
                    :responsive-options="responsiveOptions"
                    circular
                    :autoplay-interval="2000"
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

