<script setup lang="ts">

import AppLayout from "@/Layouts/AppLayout.vue";
import {usePage} from "@inertiajs/vue3";
import Dish from "@/Pages/Menus/Dish.vue";
import PageHeader from "@/Components/PageHeader.vue";
import TabMenu from 'primevue/tabmenu';
import {ref} from "vue";

const props = defineProps<{
    menus: Menu[]
}>()

const items = ref([
    { label: 'Dashboard', icon: 'pi pi-home' },
    { label: 'Transactions', icon: 'pi pi-chart-line' },
    { label: 'Products', icon: 'pi pi-list' },
    { label: 'Messages', icon: 'pi pi-inbox' }
]);

const page = usePage();
const numMenu = ref(0);
</script>

<template>

    <AppLayout :footer="page.footer" title="Menu">
        <PageHeader class="bg-gray"> {{ $t('Menù') }} {{ $t(menus[numMenu]?.name) }}</PageHeader>
        <TabMenu :model="menus" v-model:active-index="numMenu" class="mx-auto"/>
        <img
            alt="menu"
            :src="menus[numMenu]?.image"
            class="w-44 h-44 max-sm:mx-auto object-scale-down rounded-md"
        >
        <!-- Qua ci sono le pietanze associate al menù scelto -->
        <div class="grid place-content-center">
            <p v-for="dish in menus[numMenu]?.dishes">
                <Dish :dish="dish"/>
                <hr>
            </p>
        </div>
    </AppLayout>
</template>

<style>
.p-tabmenu-ink-bar{
    display: none;
}
</style>

