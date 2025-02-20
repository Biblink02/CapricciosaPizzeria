<script setup lang="ts">
import AppLayout from '@/Layouts/AppLayout.vue'
import { ref } from 'vue'
import Carousel from 'primevue/carousel'
import { images } from '@/Types/ImageHelper'
import Supplier from '@/Types/Supplier'
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
    { image: 'carousel_1' },
    { image: 'carousel_2' },
    { image: 'carousel_3' },
    { image: 'carousel_4' },
]

const dishesImages = [
    { image: 'dish_1' },
    { image: 'dish_2' },
    { image: 'dish_3' },
    { image: 'dish_4' },
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
        <!-- Main content area with semantic structure -->
        <main role="main" class="flex flex-col items-center w-full gap-24">
            <!-- Hero Banner / Header -->
            <header class="w-full">
                <HeadingPartial :sliding-images="locationImages" />
            </header>

            <!-- Events Section -->
            <section aria-labelledby="events" class="px-3 w-full max-w-6xl">
                <TitleComponent>
                    <template #title>
                        {{ $t('Events') }}
                    </template>
                    <template #description>
                        {{
                            $t(
                                'Join us for our special events, where great food and a warm atmosphere create unforgettable memories. Mark your calendar for our upcoming gatherings.'
                            )
                        }}
                    </template>
                </TitleComponent>
                <EventPartial :event="event" />
            </section>

            <!-- Our Dishes Section -->
            <section aria-labelledby="dishes-heading">
                <TitleComponent>
                    <template #title>
                        {{ $t('Our Dishes') }}
                    </template>
                    <template #description>
                        {{
                            $t(
                                'Scopri le nostre creazioni artigianali, preparate con passione e ingredienti freschi. Vieni a trovarci per provare la nostra cucina!'
                            )
                        }}
                    </template>
                </TitleComponent>
                <!-- Carousel for larger screens -->
                <div class="max-sm:hidden" aria-label="Dishes Carousel">
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
                                    alt="Dish image"
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
                        alt="Dish image"
                    />
                </figure>
            </section>

            <!-- Suppliers Section -->
            <section aria-label="Our Suppliers" class="mx-3">
                <TitleComponent>
                    <template #title>
                        {{ $t('Our excellences') }}
                    </template>
                    <template #description>
                        {{
                            $t(
                                "Selezioniamo con cura i nostri fornitori per garantirti ingredienti di alta qualità. Dalla farina al pomodoro, ogni prodotto proviene da realtà che condividono la nostra passione per il gusto e l'autenticità."
                            )
                        }}
                    </template>
                </TitleComponent>
                <SuppliersPartial :suppliers="suppliers" />
            </section>

            <!-- Social Media Section -->
            <section
                aria-labelledby="social-media"
                class="px-3 w-full max-w-6xl"
            >
                <TitleComponent>
                    <template #title>
                        {{ $t('Follow us on social media') }}
                    </template>
                    <template #description>
                        {{
                            $t(
                                'Resta sempre aggiornato sulle nostre novità, eventi e piatti del giorno, unisciti alla nostra community e condividi la tua esperienza con noi!'
                            )
                        }}
                    </template>
                </TitleComponent>
                <SocialPartial />
            </section>
        </main>
    </AppLayout>
</template>
