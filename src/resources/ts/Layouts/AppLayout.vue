<script setup lang="ts">
import NavbarComponent from '@/Components/NavbarComponent.vue'
import { Head as InertiaHead } from '@inertiajs/vue3'
import FooterComponent from '@/Components/FooterComponent.vue'

const props = defineProps<{
    title: string
    currentPage: string
    navbarHidden?: boolean
}>()

const isNavbarHidden = props.navbarHidden ?? false
</script>

<template>
    <InertiaHead :title="title"></InertiaHead>

    <NavbarComponent :current-page="currentPage" v-if="!isNavbarHidden" />
    <div class="w-full h-content flex flex-col">
        <slot />
    </div>
    <FooterComponent class="max-w-7xl mx-auto" />
</template>
