<script setup lang="ts"></script>

<template>
    <div
        class="bg-white text-center rounded-lg border-2 border-dashed p-5 border-gray-500"
    >
        <div class="mx-auto h-12 w-12">
            <slot name="icon" />
        </div>
        <h3 class="mt-2 text-lg font-bold">
            <slot name="title" />
        </h3>

        <p class="mt-1 text-lg text-gray-500">
            <slot name="description" />
        </p>
        <div class="mt-6">
            <slot name="button" />
        </div>
    </div>
</template>

<style scoped></style>
