<script setup lang="ts">
import { images } from '@/Types/ImageHelper.js'

const navigation = [
    {
        name: 'Pizzeria Capricciosa',
        rows: [
            'Via nazionale n°32, 36040 Vancimuglio (VI)',
            'Tel: +390444022349',
            'Mobile: +393292983245',
            'Mail: info@capricciosapizzerie.it',
        ],
    },
    {
        name: 'Opening hours',
        rows: ['From 18:00 to 23:30', 'Closed on Thursday'],
    },
]
</script>

<template>
    <footer
        class="flex flex-row p-10 justify-around bg-white text-base-content my-24"
    >
        <aside class="max-sm:mx-auto">
            <img
                :src="images.logo"
                alt="logo"
                class="object-scale-down w-48 mx-5"
            />
            <p class="text-gray-500 w-full max-sm:text-center hidden md:block">
                Capricciosa Pizzeria srl<br />P.IVA 01223580554
            </p>
        </aside>
        <nav
            v-for="item in navigation"
            :key="item.name"
            class="max-sm:mx-auto max-sm:text-center"
        >
            <h6 class="w-full font-bold uppercase text-gray-500">
                {{ $t(item.name) }}
            </h6>
            <p
                v-for="(row, index) in item.rows"
                :key="index"
                class="text-gray-500 w-full"
            >
                {{ $t(row) }}
            </p>
        </nav>
    </footer>
</template>
