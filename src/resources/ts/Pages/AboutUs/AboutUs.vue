<script setup lang="ts">

import AppLayout from "@/Layouts/AppLayout.vue";
import {usePage} from "@inertiajs/vue3";
const page = usePage();
</script>

<template>
<AppLayout :title="$t('Menus')" :footer="page.footer">

    <strong class="md:text-xl sm:text-lg mx-auto my-8 uppercase font-custom">{{ $t('Capricciosa in taste and design') }}</strong>
    <p class="mb-3 w-5/6 mx-auto lg:max-w-4xl md:max-w-3xl"> {{ $t('Our project was born from a desire to get back into the game, in fact, in addition to taking care of our work as Interior Designer Gianluca, Microbiologist and nutritionist Paola and ceramics salesperson Andrea, we wanted to create something original, outside of any box.') }} </p>
    <p class="mb-3 w-5/6 mx-auto lg:max-w-4xl md:max-w-3xl"> {{ $t('Capricciosa was born.') }} </p>
    <p class="mb-3 w-5/6 mx-auto lg:max-w-4xl md:max-w-3xl"> {{ $t('In the past we have had other experiences in the world of catering both as designers and entrepreneurs, but in this case we wanted to create something absolutely special and unique, "finally free from any pattern" says Gianluca.') }} </p>
    <p class="mb-3 w-5/6 mx-auto lg:max-w-4xl md:max-w-3xl"> {{ $t('Capricciosa is made with a play of contrasts: a modern cut and a delicately vintage flavor. The tables on the veranda were recovered from an old bacaro, the handcrafted Cerasarda tiles contrast the minimal iron tables and the Olev glass lighting created by master glassmakers enhances the color of the modern Thibaut wallpapers, made in America. There is also a piano, one of the latest models built with wood from the Fiemme valley, which invites, as in the venues of the past, live performances. The wood used inside Capricciosa comes from the recovery of a 19th century villa, expertly crafted by an imaginative Venetian craftsman. It is a visual harmony that recalls that of jazz-blues which also vibrates in the countless Bose speakers present in the venue.') }} </p>
    <p class="mb-3 w-5/6 mx-auto lg:max-w-4xl md:max-w-3xl"> {{ $t('What about our menu chosen with particular attention to the quality of the PDO or organic raw materials, to have genuine in all aspects, both organoleptic and healthy. The dough is a highly digestible semi-wholemeal dough, because the "after" of pizza is also important. We have also decided to propose as an alternative cold cuts or cheese platters to pair with the wines in our wine shop which we have pleasantly called Viziosa: it contains wine from small wineries with limited production and artisanal care.') }} </p>
    <p class="w-5/6 mx-auto lg:max-w-4xl md:max-w-3xl"> {{ $t('Our intention is to propose themed evenings with the combination of music, beer, wine and gastronomic delicacies.') }} </p>



</AppLayout>
</template>

<style scoped>

</style>
