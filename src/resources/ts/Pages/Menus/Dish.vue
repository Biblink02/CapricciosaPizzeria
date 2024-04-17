<script setup lang="ts">


const props = defineProps<{
    dish: Dish
}>()

</script>

<template>
    <div class="w-full">
        <!-- NOME + ALLERGENI -->
        <div class="flex justify-center text-lg w-full">
            <!-- (NOME) -->
            <strong class="lg:max-w-[80%] md:max-w-[85%] sm:max-w-[90%] text-center w-min-[80%]">{{ $t(dish.name) }}&nbsp</strong>
            <!-- (ALLERGENI) -->


            <!-- servirà avere un "link" per gli allergeni?
            <div class="inline-flex text-xs text-gray-400">
                {{ dish.allergens.map(allergen => allergen.number).join(', ') }}
            </div>
            -->

            <div v-for="(allergen, index) in dish.allergens" class="inline-flex text-xs text-gray-400">
                {{ allergen.number }}
                <span class="lg:max-w-[80%] md:max-w-[85%] sm:max-w-[90%] text-center" v-if="index < dish.allergens.length - 1">,&nbsp;</span>
            </div>
        </div>
        <!-- INGREDIENTI -->
        <div class="flex justify-center">
            <div class="lg:max-w-[80%] md:max-w-[85%] sm:max-w-[90%] text-center">
                <!-- Non cambiare con un join perché servirà per i futuri link tra ingredienti e aziende -->
                <div v-for="(ingredient, index) in dish.ingredients" class="inline-flex">
                    {{ $t(ingredient.name) }}
                    <span v-if="index < dish.ingredients.length - 1">,&nbsp;</span>
                </div>
            </div>
        </div>
        <!-- PREZZO -->
        <div class="flex justify-center pt-3 w-full"> €&nbsp; {{ $t(dish.pivot.price) }}</div>
    </div>
</template>

<style scoped>

</style>
