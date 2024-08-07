<script setup lang="ts">


const props = defineProps<{
    suppliers: Supplier[]
}>()

</script>

<template>

    <div>
        <div class="grid place-content-center">

            <div>
                <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">{{ $t('Our excellences') }}</h2>
                <div class="mt-8 sm:flex">
                </div>
            </div>


            <div class="mx-auto gap-8 max-w-5xl flex flex-row flex-wrap justify-center place-content-center">
                <template v-for="supplier in suppliers">
                    <a class="flex w-1/2 sm:w-1/5" :href="supplier.link" @click="console.log(supplier.link)" target="_blank">
                        <img
                            class="my-auto h-auto object-scale-down"
                            :src="'images/'+ supplier?.img_url"
                            :alt="supplier.name"
                        >
                    </a>
                </template>
            </div>
        </div>
    </div>
</template>

<style scoped>

</style>
