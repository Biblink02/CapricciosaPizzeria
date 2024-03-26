<script setup lang="ts">


const props = defineProps<{
    dish: Dish
}>()
</script>

<template>
    <strong class="grid place-content-center text-lg"> {{ $t(dish.name) }} </strong>
    <div>
        <div v-for="ingredient in dish.ingredients" class="inline-flex ">
            {{ $t(ingredient.name) }},&nbsp
        </div>
    </div>
    <div class="grid place-content-center"> €&nbsp{{ $t(dish.pivot.price) }} </div>
</template>

<style scoped>

</style>
