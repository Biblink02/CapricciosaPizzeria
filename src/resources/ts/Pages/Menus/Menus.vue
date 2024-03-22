<script setup lang="ts">

import AppLayout from "@/Layouts/AppLayout.vue";
import {usePage} from "@inertiajs/vue3";
import Dish from "@/Pages/Menus/Dish.vue";
import PageHeader from "@/Components/PageHeader.vue";
import Menu from "@/Pages/Menus/Menu.vue";
import {ref} from "vue";
import TabMenu from 'primevue/tabmenu';


const props = defineProps<{
    menus: Menu[]
}>()


const page = usePage();


const items = ref([
    { label: 'Dashboard', icon: 'pi pi-home' },
    { label: 'Transactions', icon: 'pi pi-chart-line' },
    { label: 'Products', icon: 'pi pi-list' },
    { label: 'Messages', icon: 'pi pi-inbox' }
]);

</script>

<template>

    <AppLayout :footer="page.footer" title="Menu">
        <img
            alt="menu"
            :src="cciao"
            class="w-44 h-44 max-sm:mx-auto object-scale-down rounded-md"
        >

        <PageHeader class="bg-gray"> {{ $t('Menù') }} </PageHeader>
        <Dish v-for="dish in menus.dishes" :dish="dish.name" class="flex justify-center"/>
    </AppLayout>
    <div class="card">
        <TabMenu :model="items"/>
    </div>
    <PageHeader>ciao</PageHeader>

</template>

<style scoped>

</style>
