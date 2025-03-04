<script setup lang="ts">
import { images } from '@/Types/ImageHelper.js'
</script>

<template>
    <footer
        class="max-sm:items-center flex max-sm:flex-col max-sm:gap-5 flex-row max-sm:p-2 justify-around text-base-content my-24"
    >
        <section class="w-fit">
            <img
                :src="images.logo"
                alt="Capricciosa Pizzeria Logo"
                class="object-scale-down w-48 -mt-20"
            />
            <p class="text-gray-500 w-full text-center">
                <strong>{{ $t('footer.company_name') }}</strong><br />
                {{ $t('footer.vat_number') }}
            </p>
        </section>

        <!-- Address & Contact Information -->
        <nav class="max-sm:text-center">
            <h6 class="font-bold uppercase text-gray-500">
                {{ $t('footer.pizzeria_name') }}
            </h6>
            <address class="not-italic text-gray-500">
                <p>
                    <a
                        href="https://maps.app.goo.gl/QscbV2P8b47SzXWm7"
                        class="hover:underline"
                        target="_blank"
                        rel="noopener noreferrer"
                        :aria-label="$t('footer.google_maps')"
                    >
                        {{ $t('footer.address') }}
                    </a>
                </p>
                <p>
                    <a
                        :href="'tel:+390444022349'"
                        class="hover:underline"
                        :aria-label="$t('footer.call_landline')"
                    >
                        {{ $t('footer.call_landline') }}
                    </a>
                </p>
                <p>
                    <a
                        href="tel:+393292983245"
                        class="hover:underline"
                        :aria-label="$t('footer.call_mobile')"
                    >
                        {{ $t('footer.call_mobile') }}
                    </a>
                </p>
                <p>
                    <a
                        :href="'mailto:info@capricciosapizzerie.it'"
                        class="hover:underline"
                        :aria-label="$t('footer.email')"
                    >
                        {{ $t('footer.email_label') }}: info@capricciosapizzerie.it
                    </a>
                </p>
            </address>
        </nav>

        <!-- Opening Hours Section -->
        <nav class="max-sm:text-center">
            <h6 class="font-bold uppercase text-gray-500">
                {{ $t('footer.opening_hours') }}
            </h6>
            <p class="text-gray-500 w-full">
                <time datetime="18:00-23:30">{{ $t('footer.hours_range') }}</time>
            </p>
            <p class="text-gray-500 w-full">
                {{ $t('footer.closed_thursday') }}
            </p>
        </nav>
    </footer>
</template>
