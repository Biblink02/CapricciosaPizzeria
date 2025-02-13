<script setup lang="ts">
import NavbarComponent from '@/Components/NavbarComponent.vue'
import { Head as InertiaHead } from '@inertiajs/vue3'
import FooterComponent from '@/Components/FooterComponent.vue'

const props = defineProps<{
    title: string
    navbarHidden?: boolean
}>()

const isNavbarHidden = props.navbarHidden ?? false
</script>

<template>
    <InertiaHead :title="title"></InertiaHead>

    <div class="sticky top-0 z-40">
        <NavbarComponent v-if="!isNavbarHidden" />
    </div>
    <div class="w-full h-content flex flex-col">
        <slot />
    </div>
    <FooterComponent class="max-w-7xl mx-auto" />
</template>
