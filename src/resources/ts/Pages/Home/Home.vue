<script setup lang="ts">
import AppLayout from '@/Layouts/AppLayout.vue'
import { ref } from 'vue'
import Carousel from 'primevue/carousel'
import { images } from '@/Types/ImageHelper'
import Events from '@/Pages/Home/Events.vue'
import HeadingComponent from '@/Pages/Home/HeadingComponent.vue'
import Social from '@/Pages/Home/Social.vue'
import Supplier from '@/Types/Supplier'
import SuppliersComponent from '@/Pages/Home/SuppliersComponent.vue'

defineProps<{
    suppliers: Supplier[]
    event: Event
}>()

const responsiveOptions = ref([
    {
        breakpoint: '1400px',
        numVisible: 1,
        numScroll: 1,
    },
    {
        breakpoint: '1199px',
        numVisible: 1,
        numScroll: 1,
    },
    {
        breakpoint: '767px',
        numVisible: 1,
        numScroll: 1,
    },
    {
        breakpoint: '575px',
        numVisible: 1,
        numScroll: 1,
    },
])

const locationImages = [
    {
        image: 'carousel_1',
    },
    {
        image: 'carousel_2',
    },
    {
        image: 'carousel_3',
    },
    {
        image: 'carousel_4',
    },
]

const dishesImages = [
    {
        image: 'dish_1',
    },
    {
        image: 'dish_2',
    },
    {
        image: 'dish_3',
    },
    {
        image: 'dish_4',
    },
]
</script>

<template>
    <AppLayout :navbar-hidden="true" title="home" class="font-sans">
        <div class="flex px-5 flex-col w-full gap-24">
            <HeadingComponent
                :sliding-images="locationImages"
            ></HeadingComponent>

            <Events :event="event"></Events>

            <div class="mx-auto mt-12 max-w-7xl flex flex-col gap-10">
                <div class="flex flex-col">
                    <h1
                        class="mx-auto text-5xl md:text-7xl bold mb-6 sacramento-regular font-cursive"
                    >
                        {{ $t('Our Dishes') }}
                    </h1>
                </div>

                <Carousel
                    class="overflow-hidden lg:h-full lg:w-full max-w-7xl mx-auto rounded-xl"
                    :value="dishesImages"
                    :num-visible="2"
                    :num-scroll="1"
                    :responsive-options="responsiveOptions"
                    circular
                    :autoplay-interval="2000"
                >
                    <template #item="slotProps">
                        <div class="p-3">
                            <img
                                class="w-150 h-100 object-cover rounded-xl"
                                :src="images[slotProps.data.image]"
                                alt="Location"
                            />
                        </div>
                    </template>
                </Carousel>
            </div>

            <SuppliersComponent class="mt-12" :suppliers="suppliers" />

            <Social />
        </div>
    </AppLayout>
</template>
