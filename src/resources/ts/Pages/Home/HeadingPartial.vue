<script setup lang="ts">
import { ref } from 'vue'
import { images } from '@/Types/ImageHelper'
import { route } from 'ziggy-js'
import NavbarComponent from '@/Components/NavbarComponent.vue'
import { SlidingImage } from '@/Types/SlidingImage'
import { ArrowRightIcon } from '@heroicons/vue/16/solid'

const props = defineProps<{
    slidingImages: SlidingImage[]
}>()

const headerImage = ref(0)

const bookDialog = ref(false)
const showBookDialog = () => {
    bookDialog.value = !bookDialog.value
}

const openingHoursDialog = ref(false)
const showOpeningHoursDialog = () => {
    openingHoursDialog.value = !openingHoursDialog.value
}

setInterval(() => {
    headerImage.value = (headerImage.value + 1) % props.slidingImages.length
}, 6000)
</script>

<template>
    <header class="overflow-hidden relative" role="banner" :aria-label="$t('main_header_label')">
        <!-- Dialog for Opening Hours -->
        <Dialog
            v-model:visible="openingHoursDialog"
            modal
            :header="$t('opening_hours_label')"
            :aria-label="$t('opening_hours_dialog_label')"
        >
            <p class="py-4">
                {{ $t('opening_hours_text') }}
            </p>
            <div class="flex justify-end gap-2">
                <Button
                    type="button"
                    :label="$t('close_button_label')"
                    severity="secondary"
                    @click="showOpeningHoursDialog()"
                ></Button>
            </div>
        </Dialog>

        <!-- Dialog for Booking -->
        <Dialog
            v-model:visible="bookDialog"
            modal
            :header="$t('book_label')"
            :aria-label="$t('booking_dialog_label')"
        >
            <p class="pb-4">
                {{ $t('booking_info_text') }}:
            </p>
            <p>
                <a href="tel:+390444022349" class="font-bold">
                    {{ 'Tel: +39 0444 022 349' }}
                </a>
            </p>
            <p>
                <a href="tel:+393292983245" class="font-bold">
                    {{ 'Mobile: +39 329 298 3245' }}
                </a>
            </p>
            <p class="py-4">
                {{ $t('opening_hours_text') }}
            </p>
            <div class="flex justify-end gap-2">
                <Button
                    type="button"
                    :label="$t('close_button_label')"
                    severity="secondary"
                    @click="showBookDialog()"
                ></Button>
            </div>
        </Dialog>

        <!-- Main container for header content -->
        <div class="mx-auto max-w-7xl">
            <section class="relative z-10 lg:w-full lg:max-w-2xl">
                <svg
                    class="absolute inset-y-0 right-8 hidden h-full w-80 translate-x-1/2 transform fill-white lg:block"
                    viewBox="0 0 100 100"
                    preserveAspectRatio="none"
                    aria-hidden="true"
                >
                    <polygon points="0,0 90,0 50,100 0,100" />
                </svg>

                <!-- Navbar -->
                <NavbarComponent
                    :simplified="true"
                    current-page="Home"
                    class="sm:p-10"
                    :aria-label="$t('main_navigation_label')"
                ></NavbarComponent>

                <!-- Header content -->
                <div class="relative px-3 mx-auto max-w-2xl lg:mx-0 lg:max-w-xl">
                    <figure class="mt-10 max-w-2xl sm:w-88 w-40 mx-auto">
                        <img :src="images.name" alt="Capricciosa Logo" />
                    </figure>
                    <h1
                        class="mt-8 max-md:text-4xl text-5xl text-center leading-15 font-cursive"
                        :aria-label="$t('welcome_message_label')"
                    >
                        {{
                            $t('welcome_message_text')
                        }}
                    </h1>

                    <!-- CTA Buttons -->
                    <section
                        class="flex-wrap mt-10 flex flex-row gap-5 justify-center"
                        :aria-label="$t('primary_actions_label')"
                    >
                        <a :href="route('menus')">
                            <Chip
                                class="whitespace-pre cursor-pointer"
                                :label="$t('menu_label')"
                                icon="pi pi-clipboard"
                            />
                        </a>
                        <Chip
                            class="whitespace-pre cursor-pointer"
                            @click="showBookDialog()"
                            :label="$t('book_label')"
                            icon="pi pi-phone"
                        />
                        <Chip
                            class="whitespace-pre"
                            @click="showOpeningHoursDialog()"
                            :label="$t('opening_hours_label')"
                            icon="pi pi-calendar-clock"
                        />
                    </section>

                    <!-- Additional Navigation -->
                    <nav
                        class="mt-10 flex items-center justify-center gap-x-6"
                        :aria-label="$t('additional_navigation_label')"
                    >
                        <Button as="a" :href="route('about-us')">
                            {{ $t('our_story_label') }}
                        </Button>
                        <a
                            href="https://maps.app.goo.gl/QscbV2P8b47SzXWm7"
                            target="_blank"
                            class="inline-flex items-center text-base font-semibold leading-7 gap-2"
                            :aria-label="$t('find_us_label')"
                        >
                            {{ $t('find_us_text') }}
                            <ArrowRightIcon class="w-5 h-5 text-black" aria-hidden="true"></ArrowRightIcon>
                        </a>
                    </nav>
                </div>
            </section>
        </div>

        <!-- Background Image -->
        <figure
            class="max-lg:px-3 max-lg:mt-10 overflow-hidden lg:absolute lg:inset-y-0 lg:right-0 lg:w-1/2"
        >
            <img
                class="overflow-hidden w-screen h-[812px] lg:h-content max-lg:h-96 max-lg:rounded-xl object-cover"
                :src="images[slidingImages[headerImage].image]"
                :alt="$t('restaurant_interior_label')"
            />
        </figure>
    </header>
</template>

<style scoped></style>
