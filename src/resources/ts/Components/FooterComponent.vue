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
                <strong>Capricciosa Pizzeria srl</strong><br />
                P.IVA 01223580554
            </p>
        </section>

        <!-- Address & Contact Information -->
        <nav class="max-sm:text-center">
            <h6 class="font-bold uppercase text-gray-500">
                Pizzeria Capricciosa
            </h6>
            <address class="not-italic text-gray-500">
                <p>
                    <a
                        href="https://maps.app.goo.gl/QscbV2P8b47SzXWm7"
                        class="hover:underline"
                        target="_blank"
                        rel="noopener noreferrer"
                        :aria-label="$t('View Pizzeria Capricciosa on Google Maps')"
                    >
                        {{ $t('Via nazionale n°32, 36040 Vancimuglio (VI)') }}
                    </a>
                </p>
                <p>
                    <a
                        :href="'tel:+390444022349'"
                        class="hover:underline"
                        :aria-label="$t('Call Pizzeria Capricciosa landline')"
                    >
                        {{ $t('Call: +39 0444 022349') }}
                    </a>
                </p>
                <p>
                    <a
                        href="tel:+393292983245"
                        class="hover:underline"
                        :aria-label="$t('Call Pizzeria Capricciosa mobile number')"
                    >
                        {{ $t('Call: +39 329 2983245') }}
                    </a>
                </p>
                <p>
                    <a
                        :href="'mailto:info@capricciosapizzerie.it'"
                        class="hover:underline"
                        :aria-label="$t('Email Pizzeria Capricciosa')"
                    >
                        {{ $t('Email')}}: info@capricciosapizzerie.it
                    </a>
                </p>
            </address>
        </nav>

        <!-- Opening Hours Section -->
        <nav class="max-sm:text-center">
            <h6 class="font-bold uppercase text-gray-500">
                {{ $t('Opening hours') }}
            </h6>
            <p class="text-gray-500 w-full">
                <time datetime="18:00-23:30">{{ $t('From 18:00 to 23:30') }}</time>
            </p>
            <p class="text-gray-500 w-full">
                {{ $t('Closed on Thursday') }}
            </p>
        </nav>
    </footer>
</template>
