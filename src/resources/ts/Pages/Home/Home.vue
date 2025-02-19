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
        breakpoint: '1199px',
        numVisible: 2,
        numScroll: 1,
    },
    {
        breakpoint: '830px',
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

const currentImage = ref(0)

setInterval(() => {
    currentImage.value = (currentImage.value + 1) % dishesImages.length
}, 6000)
</script>

<template>
    <AppLayout
        current-page="Home"
        :navbar-hidden="true"
        title="home"
        class="font-sans"
    >
        <div class="flex flex-col items-center w-full gap-24">
            <HeadingComponent
                class="w-full"
                :sliding-images="locationImages"
            ></HeadingComponent>

            <div class="px-3 text-center">
                <h2
                    class="font-cursive tracking-tight text-5xl md:text-7xl sacramento-regular"
                >
                    {{ $t('Events') }}
                </h2>
                <p class="mx-auto mt-3 max-w-2xl text-gray-500 sm:mt-4">
                    {{
                        $t(
                            'Join us for our special events, where great food and a warm atmosphere create unforgettable memories. Mark your calendar for our upcoming gatherings.'
                        )
                    }}
                </p>
            </div>

            <div class="px-3 w-full max-w-6xl">
                <Events :event="event"></Events>
            </div>

            <h1
                class="px-3 text-5xl md:text-7xl sacramento-regular font-cursive"
            >
                {{ $t('Our Dishes') }}
            </h1>

            <div class="max-sm:hidden">
                <Carousel
                    class="overflow-hidden max-w-7xl"
                    :value="dishesImages"
                    :num-visible="2"
                    :responsive-options="responsiveOptions"
                    circular
                    :autoplay-interval="2000"
                >
                    <template #item="slotProps">
                        <div class="p-3">
                            <img
                                class="mx-auto w-150 h-100 object-cover rounded-xl"
                                :src="images[slotProps.data.image]"
                                alt="Location"
                            />
                        </div>
                    </template>
                </Carousel>
            </div>

            <div class="px-3 w-full">
                <img
                    class="sm:hidden mx-auto max-w-xl w-full h-100 object-cover rounded-xl"
                    :src="images[dishesImages[currentImage].image]"
                    alt="Location"
                />
            </div>

            <SuppliersComponent class="mx-3" :suppliers="suppliers" />

            <p
                class="mx-3 font-cursive text-5xl md:text-7xl sacramento-regular"
            >
                {{ $t('Follow us on social media') }}
            </p>

            <div class="px-3 w-full max-w-6xl">
                <Social />
            </div>
        </div>
    </AppLayout>
</template>
