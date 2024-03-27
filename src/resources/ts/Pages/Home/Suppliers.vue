<script setup lang="ts">

import route from "ziggy-js";


const props = defineProps<{
    suppliers: Supplier[]
}>()

</script>

<template>

    <div>
        <div class="grid place-content-center">
            <p class="text-center">{{ $t("Our partners.") }}</p>
            <strong class="text-center text-xl">{{ $t("Excellences of the territory and beyond.") }}</strong>
            <p class="text-center">{{
                    $t("Synergy with leading companies, " +
                        "a winning strategy to ensure our Customers " +
                        "absolute quality products and services")
                }}</p>

            <div class="mx-auto max-w-5xl flex flex-row flex-wrap justify-around" >
                <template v-for="supplier in suppliers">
                    <img
                        class="w-60 h-fit object-scale-down"
                        :src="'images/'+ supplier?.img_url"
                        :alt="supplier.name"
                    >
                </template>
            </div>
            <p>ciao</p>
            <p>ciao</p>
            <p>ciao</p>
            <p>ciao</p>
            <p>ciao</p>
            <p>ciao</p>
            <p>ciao</p>
        </div>



    </div>


</template>

<style scoped>

</style>
