<script setup lang="ts">
import NavbarComponent from "@/Components/NavbarComponent.vue";
import { Head as InertiaHead } from '@inertiajs/vue3';
import FooterComponent from "@/Components/FooterComponent.vue";

defineProps<{
    title: string,
    footer: Footer
}>();

</script>

<template>
    <InertiaHead :title="title"></InertiaHead>

    <div
            class="sticky top-0 z-40"
    >
        <NavbarComponent />
    </div>

    <div
            class="w-full h-content flex flex-col"
    >
        <slot />
    </div>
    <!-- <FooterComponent :footer="footer" /> -->
</template>
