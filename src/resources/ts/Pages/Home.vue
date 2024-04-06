<script setup lang="ts">
import Carousel from 'primevue/carousel';
import AppLayout from "@/Layouts/AppLayout.vue";
import { ref, onMounted } from "vue";
import {images} from "@/Types/ImageHelper";

const props = defineProps<{
    footer: Footer
}>()
const products = ref();
const responsiveOptions = ref([
    {
        breakpoint: '1400px',
        numVisible: 2,
        numScroll: 1
    },
    {
        breakpoint: '1199px',
        numVisible: 3,
        numScroll: 1
    },
    {
        breakpoint: '767px',
        numVisible: 2,
        numScroll: 1
    },
    {
        breakpoint: '575px',
        numVisible: 1,
        numScroll: 1
    }
]);

</script>

<template>
  <AppLayout :footer="footer" title="home">

      <img
          alt="Home"
          :src="images.location"
          class="h-72 max-sm:mx-auto object-scale-down rounded-md"
      >
      <img
          alt="Home"
          :src="images.home_1"
          class="h-72 max-sm:mx-auto object-scale-down rounded-md"
      >

  </AppLayout>

</template>

<style scoped>

</style>
