<script setup lang="ts">

import AppLayout from "@/Layouts/AppLayout.vue";
import {usePage} from "@inertiajs/vue3";
import Dish from "@/Pages/Menus/Dish.vue";
import TabMenu from 'primevue/tabmenu';
import {ref} from "vue";
import route from "ziggy-js";
import ButtonComponent from "@/Components/ButtonComponent.vue";
import VuePdfEmbed from 'vue-pdf-embed'


/*const props = defineProps<{
    menus: Menu[]
}>()*/

const visitAllergens = () => {
    window.open(route('allergens-table'), '_blank');
}
const page = usePage();
// either URL, Base64, binary, or document proxy
const getCurrentLang = () =>{
    if (navigator.languages && navigator.languages.length) {
        return navigator.languages[0].split('-')[0];
    } else if (navigator.language) {
        return navigator.language.split('-')[0];
    } else {
        return 'it';
    }
}
const pdfSource = route('pdf-menu', {lang: getCurrentLang()})

</script>

<template>

    <AppLayout :footer="page.footer" :title="$t('Menus')">
        <VuePdfEmbed class="md:w-3/4 w-full mx-auto" annotation-layer text-layer :source="pdfSource"/>
        <div class="flex justify-center pt-6 pb-6">
            <ButtonComponent @click="visitAllergens">
                {{ $t('Allergenes list') }}
            </ButtonComponent>
        </div>
    </AppLayout>
</template>

<style>
.p-tabmenu-ink-bar {
    display: none;
}

.hiddenCanvasElement {
    display: none;
}
</style>

