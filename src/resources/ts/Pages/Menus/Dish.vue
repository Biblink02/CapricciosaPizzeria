<script setup lang="ts">



const dishes = [
    { name: '1' },
    { name: '2' },
    { name: '5' },
    { name: '4' },
    { name: '6' },
    // More items...
]

</script>

<template>
    <ul role="list" class="divide-y divide-gray-200">
        <li v-for="dish in dishes" :key="dish.name" class="py-4">
            {{dish.name}}
        </li>
    </ul>
</template>

<style scoped>

</style>
