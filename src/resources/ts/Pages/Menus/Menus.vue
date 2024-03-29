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


        <div :style="'background-image: url(images/'+menus[numMenu]?.img_url" class="h-80 grid place-content-center bg-cover bg-center text-white font-bold text-6xl">
            {{ $t('Menù') }} {{ $t(menus[numMenu]?.name ?? '') }}
        </div>

        <TabMenu :model="menus" v-model:active-index="numMenu" class="mx-auto pb-3 bg-gray-50"/>
        <div class="bg-gray-50">
            <div class="grid place-content-center text-bold text-3xl pb-8 pt-6 bg-gray-50">
                {{ $t('Menu') }}  {{ $t(menus[numMenu]?.name ?? '') }}
            </div>

            <div class="grid place-content-center space-y-6">
                <hr>
                <div v-for="dish in menus[numMenu]?.dishes">
                    <div class="pb-6">
                        <Dish :dish="dish"/>
                    </div>
                    <hr>
                </div>

            </div>
        </div>
    </AppLayout>
</template>

<style>
.p-tabmenu-ink-bar{
    display: none;
}
</style>

