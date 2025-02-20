<script setup lang="ts">
defineProps<{
    htmlDescriptionContent?: string
}>()
</script>

<template>
    <div class="text-center mb-10">
        <h2
            id="events-heading"
            class="font-cursive tracking-tight text-5xl md:text-7xl sacramento-regular"
        >
            <slot name="title" />
        </h2>
        <p class="mx-auto mt-3 max-w-2xl text-gray-500 sm:mt-4">
            <slot name="description" />
        </p>
        <p
            v-if="htmlDescriptionContent"
            v-html="htmlDescriptionContent"
            class="mx-auto mt-3 max-w-2xl text-gray-500 sm:mt-4"
        />
    </div>
</template>

<style scoped></style>
