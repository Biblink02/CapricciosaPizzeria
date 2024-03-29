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
const getSeverity = (status) => {
    switch (status) {
        case 'INSTOCK':
            return 'success';

        case 'LOWSTOCK':
            return 'warning';

        case 'OUTOFSTOCK':
            return 'danger';

        default:
            return null;
    }
};
</script>

<template>
  <AppLayout :footer="footer" title="home">
      <!--
      <Carousel :value="products" :numVisible="3" :numScroll="3" :responsiveOptions="responsiveOptions">
          <template #item="slotProps">
              <div class="border-1 surface-border border-round m-2  p-3">
                  <div class="mb-3">
                      <div class="relative mx-auto">
                          <img :src="'https://primefaces.org/cdn/primevue/images/product/' + slotProps.data.image" :alt="slotProps.data.name" class="w-full border-round" />
                          <tag :value="slotProps.data.inventoryStatus" :severity="getSeverity(slotProps.data.inventoryStatus)" class="absolute" style="left:5px; top: 5px"/>
                      </div>
                  </div>
                  <div class="mb-3 font-medium">{{ slotProps.data.name }}</div>
                  <div class="flex justify-content-between align-items-center">
                      <div class="mt-0 font-semibold text-xl">${{ slotProps.data.price }}</div>
                      <span>
                    <Button icon="pi pi-heart" severity="secondary" outlined />
                    <Button icon="pi pi-shopping-cart" class="ml-2"/>
                </span>
                  </div>
              </div>
          </template>
      </Carousel>
-->

      <!-- <p class="font-serif font-bold text-red-500 w-10">Location</p> -->
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
