<script setup lang="ts">
import AppLayout from '@/Layouts/AppLayout.vue'
import { ref } from 'vue'
import Carousel from 'primevue/carousel'
import { images } from '@/Types/ImageHelper'
import { Supplier } from '@/Types/Supplier'
import EventPartial from '@/Pages/Home/EventPartial.vue'
import TitleComponent from '@/Components/TitleComponent.vue'
import HeadingPartial from '@/Pages/Home/HeadingPartial.vue'
import SocialPartial from '@/Pages/Home/SocialPartial.vue'
import SuppliersPartial from '@/Pages/Home/SuppliersPartial.vue'

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
    { image: 'location_1' },
    { image: 'location_2' },
    { image: 'location_3' },
    { image: 'location_4' },
    { image: 'location_5' },
    { image: 'location_6' },
]

const dishesImages = [
    { image: 'dish_1' },
    { image: 'dish_2' },
    { image: 'dish_3' },
    { image: 'dish_4' },
    { image: 'dish_5' },
    { image: 'dish_6' },
    { image: 'dish_7' },
    { image: 'dish_8' },
    { image: 'dish_9' },
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
        :title="$t('home_section_title')"
    >
        <!-- Main content area with semantic structure -->
        <main role="main" class="flex flex-col items-center w-full gap-24">
            <!-- Hero Banner / Header -->
            <header class="w-full" :aria-label="$t('homepage_banner_label')">
                <HeadingPartial :sliding-images="locationImages" />
            </header>

            <!-- Events Section -->
            <section
                aria-labelledby="events"
                class="px-3 w-full max-w-6xl"
                :aria-label="$t('upcoming_events_label')"
            >
                <TitleComponent>
                    <template #title>
                        {{ $t('events_section_title') }}
                    </template>
                    <template #description>
                        {{
                            $t('events_description_text')
                        }}
                    </template>
                </TitleComponent>
                <EventPartial :event="event" />
            </section>

            <!-- Our Dishes Section -->
            <section
                aria-labelledby="dishes-heading"
                :aria-label="$t('our_dishes_label')"
            >
                <TitleComponent>
                    <template #title>
                        {{ $t('our_dishes_section_title') }}
                    </template>
                    <template #description>
                        {{
                            $t('our_dishes_description_text')
                        }}
                    </template>
                </TitleComponent>
                <!-- Carousel for larger screens -->
                <div
                    class="max-sm:hidden"
                    :aria-label="$t('dishes_carousel_label')"
                >
                    <Carousel
                        class="overflow-hidden max-w-7xl"
                        :value="dishesImages"
                        :num-visible="2"
                        :responsive-options="responsiveOptions"
                        circular
                        :autoplay-interval="2000"
                    >
                        <template #item="slotProps">
                            <figure class="p-3">
                                <img
                                    class="mx-auto w-150 h-100 object-cover rounded-xl"
                                    :src="images[slotProps.data.image]"
                                    :alt="$t('dish_image_label')"
                                />
                            </figure>
                        </template>
                    </Carousel>
                </div>
                <!-- Single image for smaller screens -->
                <figure class="px-3 w-full">
                    <img
                        class="sm:hidden mx-auto max-w-xl w-full h-100 object-cover rounded-xl"
                        :src="images[dishesImages[currentImage].image]"
                        :alt="$t('dish_image_label')"
                    />
                </figure>
            </section>

            <!-- Suppliers Section -->
            <section
                aria-labelledby="suppliers"
                class="mx-3"
                :aria-label="$t('our_suppliers_label')"
            >
                <TitleComponent>
                    <template #title>
                        {{ $t('our_excellences_section_title') }}
                    </template>
                    <template #description>
                        {{
                            $t('our_excellences_description_text')
                        }}
                    </template>
                </TitleComponent>
                <SuppliersPartial :suppliers="suppliers" />
            </section>

            <!-- Social Media Section -->
            <section
                aria-labelledby="social-media"
                class="px-3 w-full max-w-6xl"
                :aria-label="$t('follow_us_label')"
            >
                <TitleComponent>
                    <template #title>
                        {{ $t('follow_us_section_title') }}
                    </template>
                    <template #description>
                        {{
                            $t('follow_us_description_text')
                        }}
                    </template>
                </TitleComponent>
                <SocialPartial />
            </section>
        </main>
    </AppLayout>
</template>
