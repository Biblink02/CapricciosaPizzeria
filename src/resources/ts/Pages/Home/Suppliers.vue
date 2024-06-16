<script setup lang="ts">

import route from "ziggy-js";


const props = defineProps<{
    suppliers: Supplier[]
}>()

</script>

<template>

    <div>
        <div class="grid place-content-center">

            <div>
                <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">{{ $t('Our excellences')}}</h2>
                    <p class="mt-3 max-w-3xl text-lg text-gray-500">{{$t('We proudly partner with top-quality suppliers to bring you the best ingredients for every dish.')}}</p>
                <div class="mt-8 sm:flex">
                </div>
            </div>


            <div class="mx-auto space-x-8 space-y-10 max-w-5xl flex flex-row flex-wrap justify-around place-content-center" >
                <template v-for="supplier in suppliers">
                    <img
                        class="w-1/5 h-auto object-scale-down"
                        :src="'images/'+ supplier?.img_url"
                        :alt="supplier.name"
                    >
                </template>
            </div>
        </div>
    </div>
</template>

<style scoped>

</style>
