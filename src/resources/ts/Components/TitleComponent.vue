<script setup lang="ts">
defineProps<{
    descriptionContent?: {
        beforeText: string
        aText: string
        afterText: string
        href: string
        styles: string
    }
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
            v-if="descriptionContent"
            class="mx-auto mt-3 max-w-2xl text-gray-500 sm:mt-4"
        >
            {{ descriptionContent.beforeText }}
            <a
                :href="descriptionContent.href"
                :class="descriptionContent.styles"
                target="_blank"
            >
                {{ descriptionContent.aText }}
            </a>
            {{ descriptionContent.afterText }}
        </p>
    </div>
</template>

<style scoped></style>
