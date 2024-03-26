<script setup lang="ts">


const props = defineProps<{
    dish: Dish
}>()
</script>

<template>
    <strong class="grid place-content-center text-lg"> {{dish.name}} </strong>
    <div>
        <div v-for="ingredient in dish.ingredients" class="inline-flex ">
            {{ ingredient.name }},&nbsp
        </div>
    </div>
    <div class="grid place-content-center"> €&nbsp{{dish.pivot.price}} </div>
</template>

<style scoped>

</style>
