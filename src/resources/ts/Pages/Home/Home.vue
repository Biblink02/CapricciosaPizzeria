<script setup lang="ts">

import AppLayout from "@/Layouts/AppLayout.vue";
import {ref} from "vue";
import Carousel from "primevue/carousel";
import {images} from "@/Types/ImageHelper";
import ActivityTimings from "@/Pages/Home/ActivityTimings.vue";
import Suppliers from "@/Pages/Home/Suppliers.vue";

const props = defineProps<{
    footer: Footer
    slidingImages: SlidingImage[]
    suppliers: Supplier[]
}>()

const responsiveOptions = ref([
    {
        breakpoint: '1400px',
        numVisible: 1,
        numScroll: 1
    },
    {
        breakpoint: '1199px',
        numVisible: 1,
        numScroll: 1
    },
    {
        breakpoint: '767px',
        numVisible: 1,
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
        <div class="bg-gray-50 flex flex-row">
            <div class="text-center font-extrabold text-5xl w-2/5 text [writing-mode:vertical-lr] rotate-180 mr-5">
                <p>{{ $t('Location') }}</p>
            </div>
            <div class="w-3/5 max-w-[120rem] mx-auto w-full">
                <Carousel
                    :value="slidingImages"
                    :num-visible="1"
                    :num-scroll="1"
                    :responsive-options="responsiveOptions"
                    circular
                    :autoplay-interval="6000"
                >
                    <template #item="slotProps">
                        <div>
                            <a :href="slotProps.data.href">
                                <img
                                    class="w-full h-fit object-scale-down"
                                    :src="images[slotProps.data.image]"
                                    alt="Location"
                                >
                            </a>
                        </div>
                    </template>
                </Carousel>
            </div>
        </div>
        <div class="bg-gray-50">
            <ActivityTimings/>
        </div>
    </AppLayout>
  <AppLayout :footer="footer" title="home">
      <div class="grid gap-5">
          <div class="flex flex-row">
              <div class="text-center font-extrabold text-5xl w-2/5 text [writing-mode:vertical-lr] rotate-180 mr-5">
                  <p>{{$t('Location')}}</p>
              </div>
              <div class="w-3/5 max-w-[120rem] mx-auto w-full">
                  <Carousel
                      :value="slidingImages"
                      :num-visible="1"
                      :num-scroll="1"
                      :responsive-options="responsiveOptions"
                      circular
                      :autoplay-interval="6000"
                  >
                      <template #item="slotProps">
                          <div >
                              <a :href="slotProps.data.href">
                                  <img
                                      class="w-full h-fit object-scale-down"
                                      :src="images[slotProps.data.image]"
                                      alt="Location"
                                  >
                              </a>
                          </div>
                      </template>
                  </Carousel>
              </div>
          </div>
          <ActivityTimings></ActivityTimings>


          <!-- ROBA ALBERTO -->

          <Suppliers :suppliers="suppliers"/>


      </div>
  </AppLayout>
</template>

<style>

.p-carousel-indicators {
    display: none;
}

.p-carousel-prev {
    display: none;
}

.p-carousel-next {
    display: none;
}
</style>
