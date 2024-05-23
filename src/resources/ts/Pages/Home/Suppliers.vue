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
                <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">{{$t('Le nostre eccellenze')}}</h2>
                <p class="mt-3 max-w-3xl text-lg text-gray-500">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Et, egestas tempus tellus etiam sed. Quam a scelerisque amet ullamcorper eu enim et fermentum, augue.</p>
                <div class="mt-8 sm:flex">
                </div>
            </div>


            <div class="mx-auto space-x-8 space-y-10 max-w-5xl flex flex-row flex-wrap justify-around place-content-centeram" >
                <template v-for="supplier in suppliers">
                    <img
                        class="w-1/6 h-auto object-scale-down"
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
