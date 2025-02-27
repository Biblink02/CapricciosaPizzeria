<script setup lang="ts">
import NavbarComponent from '@/Components/NavbarComponent.vue'
import {Head as InertiaHead} from '@inertiajs/vue3'
import FooterComponent from '@/Components/FooterComponent.vue'
import {onMounted} from 'vue'

const props = defineProps<{
    title: string
    currentPage: string
    navbarHidden?: boolean
}>()

const isNavbarHidden = props.navbarHidden ?? false

// Dynamic SEO metadata
const metaDescription = "Welcome to Pizzeria Capricciosa - Authentic Italian pizza with fresh ingredients. Visit us in Vancimuglio (VI)!"
const metaKeywords = "pizzeria, Italian pizza, best pizza, Pizzeria Capricciosa, Vancimuglio, Italy"
const metaAuthor = "Pizzeria Capricciosa"


const jsonLd = {
    "@context": "https://schema.org",
    "@type": "Restaurant",
    "name": "Pizzeria Capricciosa",
    "image": "/logo.jpeg",
    "description": "Benvenuti alla Pizzeria Capricciosa - Dove il design incontra la qualità. Vieni a trovarci a Vancimuglio (VI)!",
    "address": {
        "@type": "PostalAddress",
        "streetAddress": "Via nazionale n°32",
        "addressLocality": "Vancimuglio",
        "addressRegion": "VI",
        "postalCode": "36040",
        "addressCountry": "IT"
    },
    "telephone": "+390444022349",
    "priceRange": "$$",
    "openingHoursSpecification": [
        {
            "@type": "OpeningHoursSpecification",
            "dayOfWeek": [
                "Lunedì",
                "Mercoledì",
                "Giovedì",
                "Venerdì",
                "Sabato",
                "Domenica"
            ],
            "opens": "18:00",
            "closes": "23:30"
        }
    ],
    "openingHours": "Lun 18:00-23:30, Mer-Dom 18:00-23:30",
    "sameAs": [
        "https://maps.app.goo.gl/QscbV2P8b47SzXWm7",
        "https://www.facebook.com/capricciosapizzerie/",
        "https://www.instagram.com/capricciosapizzerie/"
    ]
}


onMounted(() => {
    const script = document.createElement('script')
    script.type = 'application/ld+json'
    script.textContent = JSON.stringify(jsonLd)
    document.head.appendChild(script)
})
</script>

<template>
    <InertiaHead :title="title">
        <!-- Basic SEO Meta Tags -->
        <meta name="description" :content="metaDescription"/>
        <meta name="keywords" :content="metaKeywords"/>
        <meta name="author" :content="metaAuthor"/>
        <meta name="robots" content="index, follow"/>

        <!-- Open Graph / Facebook Meta Tags -->
        <meta property="og:title" :content="title"/>
        <meta property="og:description" :content="metaDescription"/>
        <meta property="og:image" content="/logo.png"/>
        <meta property="og:url" content="https://capricciosapizzerie.it"/>
        <meta property="og:type" content="restaurant"/>

        <!-- Twitter Meta Tags -->
        <meta name="twitter:card" content="summary_large_image"/>
        <meta name="twitter:title" :content="title"/>
        <meta name="twitter:description" :content="metaDescription"/>
        <meta name="twitter:image" content="/logo.png"/>
    </InertiaHead>

    <NavbarComponent
        :simplified="false"
        :current-page="currentPage"
        v-if="!isNavbarHidden"
    />
    <div class="w-full h-content flex flex-col">
        <slot />
    </div>
    <FooterComponent class="max-w-7xl mx-auto" />
</template>
