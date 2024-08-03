<script setup lang="ts">
import {images} from "@/Types/ImageHelper.js";

const navigation = [
    {
        name: "Capricciosa",
        rows: [
            'Via nazionale n°32, 36040 Vancimuglio (VI)',
            'Tel: +390444022349',
            'Mobile: +393292983245',
            'Mail: info@capricciosapizzerie.it'
        ]
    },
    {
        name: "Opening hours",
        rows: [
            'From 18:00 to 23:30',
            'Closed on Thursday'
        ]
    }
]
</script>

<template>

    <footer class="footer p-10 bg-white text-base-content my-24">
        <aside class="max-sm:mx-auto">
            <img :src="images.logo" alt="logo" class="object-scale-down w-48 mx-5">
            <p class="w-full max-sm:text-center">Capricciosa Pizzeria SRL<br>P.IVA 01223580554</p>
        </aside>
        <nav v-for="item in navigation" class="max-sm:mx-auto max-sm:text-center">
            <h6 class="w-full footer-title">{{ $t(item.name) }}</h6>
            <p v-for="row in item.rows" class="w-full">{{$t(row)}}</p>
        </nav>
    </footer>
</template>
