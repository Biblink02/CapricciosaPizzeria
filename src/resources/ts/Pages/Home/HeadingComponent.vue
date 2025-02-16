<script setup lang="ts">
import { ref } from 'vue'
import { images } from '@/Types/ImageHelper'
import { router } from '@inertiajs/vue3'
import { route } from 'ziggy-js'
import NavbarComponent from '@/Components/NavbarComponent.vue'
import SlidingImage from '@/Types/SlidingImage'

const props = defineProps<{
    slidingImages: SlidingImage[]
}>()

const visitEvents = () => {
    router.visit(route('events'))
}
const visitAboutUs = () => {
    router.visit(route('about-us'))
}

const headerImage = ref(0)

setInterval(() => {
    headerImage.value = (headerImage.value + 1) % props.slidingImages.length
}, 6000)
</script>

<template>
    <div class="overflow-hidden lg:-mr-5 relative bg-white">
        <div class="mx-auto max-w-7xl">
            <div class="relative z-10 lg:w-full lg:max-w-2xl">
                <svg
                    class="absolute inset-y-0 right-8 hidden h-full w-80 translate-x-1/2 transform fill-white lg:block"
                    viewBox="0 0 100 100"
                    preserveAspectRatio="none"
                    aria-hidden="true"
                >
                    <polygon points="0,0 90,0 50,100 0,100" />
                </svg>
                <div class="relative lg:pl-8 lg:pr-0">
                    <NavbarComponent
                        current-page="Home"
                        class="shadow-none"
                    ></NavbarComponent>
                </div>
                <div class="relative lg:pr-0">
                    <div class="mx-auto max-w-2xl lg:mx-0 lg:max-w-xl">
                        <div class="hidden sm:mb-10 sm:flex">
                            <div
                                v-if="false"
                                @click="visitEvents"
                                class="relative rounded-full py-1 px-3 text-sm leading-6 text-gray-500 ring-1 ring-gray-900/10 hover:ring-gray-900/20"
                            >
                                {{ $t('Events organized by us') }}
                                <a
                                    href="/events"
                                    class="whitespace-nowrap font-semibold text-capricciosa_green"
                                >
                                    <span
                                        class="absolute inset-0"
                                        aria-hidden="true"
                                    />
                                    {{ $t('Read more') }}
                                    <span aria-hidden="true">&rarr;</span>
                                </a>
                            </div>
                        </div>
                        <div class="max-w-2xl w-88 w-fit">
                            <img :src="images.name" alt="name" />
                        </div>
                        <p
                            class="mt-8 max-md:text-4xl text-5xl text-center leading-[1.3] font-cursive"
                        >
                            {{
                                $t(
                                    'Benvenuti nella nostra pizzeria, dove il design incontra la qualità.'
                                )
                            }}
                        </p>
                        <section
                            class="flex-wrap mt-10 flex flex-row gap-5 justify-center"
                        >
                            <Chip
                                class="whitespace-pre"
                                @click="visitMenus()"
                                :label="$t('Menu')"
                                icon="pi pi-clipboard"
                            />
                            <Chip
                                class="whitespace-pre"
                                @click="visitMenus()"
                                :label="$t('Book')"
                                icon="pi pi-phone"
                            />
                            <Chip
                                class="whitespace-pre"
                                @click="showOpeningHoursDialog"
                                :label="$t('Opening hours')"
                                icon="pi pi-calendar-clock"
                            />
                        </section>
                        <div
                            class="mt-10 flex items-center justify-center gap-x-6"
                        >
                            <Button @click="visitAboutUs">
                                {{ $t('Our story') }}
                            </Button>
                            <a
                                href="https://maps.app.goo.gl/QscbV2P8b47SzXWm7"
                                target="_blank"
                                class="text-base font-semibold leading-7 text-gray-900"
                                >{{ $t('Find us') }}
                                <span aria-hidden="true">→</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div
            class="max-lg:mt-10 overflow-hidden lg:absolute lg:inset-y-0 lg:right-0 lg:w-1/2"
        >
            <img
                class="overflow-hidden w-screen h-[812px] lg:h-content max-lg:h-96 max-lg:rounded-xl object-cover"
                :src="images[slidingImages[headerImage].image]"
                alt="Location"
            />
        </div>
    </div>
</template>
<style scoped></style>
