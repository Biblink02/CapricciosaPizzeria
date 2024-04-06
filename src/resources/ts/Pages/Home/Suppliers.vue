<script setup lang="ts">

const props = defineProps<{
    suppliers: Supplier[]
}>()

</script>

<template>

    <div class="bg-white">
        <div class="mx-auto max-w-7xl px-6">
            <div class="lg:grid lg:grid-cols-2 lg:items-center lg:gap-8">
                <div>
                    <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">{{$t('Le nostre eccellenze')}}</h2>
                    <p class="mt-3 max-w-3xl text-lg text-gray-500">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Et, egestas tempus tellus etiam sed. Quam a scelerisque amet ullamcorper eu enim et fermentum, augue.</p>
                    <div class="mt-8 sm:flex">
                    </div>
                </div>
                <div class=" mt-8 grid grid-cols-2 gap-0.5 md:grid-cols-3 lg:mt-0 lg:grid-cols-2">
                    <template v-for="supplier in suppliers">
                        <div class="col-span-1 flex justify-center py-8 px-8">
                            <img
                                class="max-h-12"
                                :src="'images/'+ supplier?.img_url"
                                :alt="supplier.name"
                            >
                        </div>
                    </template>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped>

</style>
