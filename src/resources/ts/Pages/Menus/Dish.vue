<script setup lang="ts">


const props = defineProps<{
    dish: Dish
}>()
</script>

<template>
    <div class="flex justify-center text-lg">
        <strong>{{ $t(dish.name) }}&nbsp</strong>
        <div v-for="(allergen, index) in dish.allergens" class="inline-flex text-xs text-gray-400">
            {{ allergen.number }}
            <span v-if="index < dish.allergens.length - 1">,&nbsp;</span>
        </div>
    </div>
    <div class="flex justify-center">
        <div v-for="(ingredient, index) in dish.ingredients" class="inline-flex">
            {{ $t(ingredient.name) }}
            <span v-if="index < dish.ingredients.length - 1">,&nbsp;</span>
        </div>
    </div>
    <div class="flex justify-center pt-3"> €&nbsp; {{ $t(dish.pivot.price) }}</div>

</template>

<style scoped>

</style>
