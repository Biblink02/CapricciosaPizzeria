<script setup lang="ts">

import AppLayout from "@/Layouts/AppLayout.vue";
import {usePage} from "@inertiajs/vue3";
import Dish from "@/Pages/Menus/Dish.vue";
import TabMenu from 'primevue/tabmenu';
import {ref} from "vue";
import route from "ziggy-js";
import ButtonComponent from "@/Components/ButtonComponent.vue";

const props = defineProps<{
    menus: Menu[]
}>()

const visitAllergens = ()=>{
    window.open(route('allergens-table'), '_blank');
}

const page = usePage();
const numMenu = ref(0);
</script>

<template>

    <AppLayout :footer="page.footer" :title="$t('Menus')">

        <div :style="'background-image: url(images/'+menus[numMenu]?.img_url+')'" class="h-80 grid place-content-center bg-cover bg-center text-white font-bold text-6xl">
            {{ $t('Menù') }} {{ $t(menus[numMenu]?.name ?? '') }}
        </div>
        <TabMenu :model="menus" v-model:active-index="numMenu" class="mx-auto pb-3 bg-gray-50"/>

        <div class="bg-gray-50">
            <div class="grid place-content-center text-bold text-3xl pb-8 pt-6 bg-gray-50">
                {{ $t('Menu') }}  {{ $t(menus[numMenu]?.name ?? '') }}
            </div>

            <div class="grid place-content-center space-y-6">
                <div v-for="dish in menus[numMenu]?.dishes">
                    <div class="pb-6">
                        <Dish :dish="dish"/>
                    </div>
                    <hr class="max-w-sm mx-auto">
                </div>
            </div>
            <div class="flex justify-center pt-6 pb-6">
                <ButtonComponent @click="visitAllergens">
                    {{$t('Allergenes list')}}
                </ButtonComponent>
            </div>
        </div>
    </AppLayout>
</template>

<style>
.p-tabmenu-ink-bar{
    display: none;
}
</style>

