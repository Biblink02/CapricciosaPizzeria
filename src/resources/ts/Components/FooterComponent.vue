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
        class="max-sm:items-center flex max-sm:flex-col max-sm:gap-5 flex-row max-sm:p-2 justify-around text-base-content my-24"
    >
        <aside class="w-fit">
            <img
                :src="images.logo"
                alt="logo"
                class="object-scale-down w-48 -mt-20"
            />
            <p class="text-gray-500 w-full text-center">
                Capricciosa Pizzeria srl<br />P.IVA 01223580554
            </p>
        </aside>
        <nav
            v-for="item in navigation"
            :key="item.name"
            class="max-sm:text-center"
        >
            <h6 class="font-bold uppercase text-gray-500">
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
