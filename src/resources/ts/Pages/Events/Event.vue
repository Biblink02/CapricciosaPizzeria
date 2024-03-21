<script setup lang="ts">

import {images} from "@/Types/ImageHelper";

defineProps<{
    event: Event
}>()
</script>

<template>
    <div>
        <img
            alt="event"
            :src="images[event.image]"
            class="w-44 h-44 max-sm:mx-auto object-scale-down rounded-md"
        >
    </div>
    <div>
        <div class="flex flex-row">
            <p class="text-gray-50">
                {{ event.starts_at }}
            </p>
            <p class="text-gray-50">
                {{ event.ends_at }}
            </p>
        </div>
        <div>
            <a class="font-bold text-2xl">
                {{ $t(event.title) }}
            </a>
        </div>
    </div>
</template>

<style scoped>

</style>
