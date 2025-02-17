<script setup lang="ts">
import { Supplier } from '@/Types/Supplier'

defineProps<{
    suppliers: Supplier[]
}>()
</script>

<template>
    <div>
        <p
            class="mx-auto text-5xl md:text-7xl sacramento-regular tracking-tight font-cursive"
        >
            {{ $t('Our excellences') }}
        </p>
        <div class="grid place-content-center">
            <div
                class="mx-auto gap-8 max-w-5xl flex flex-row flex-wrap justify-center place-content-center"
            >
                <template v-for="supplier in suppliers" :key="supplier.name">
                    <a
                        class="flex w-1/2 sm:w-1/5"
                        :href="supplier.link"
                        target="_blank"
                    >
                        <img
                            class="my-auto h-auto object-scale-down"
                            :src="'images/' + supplier?.img_url"
                            :alt="supplier.name"
                        />
                    </a>
                </template>
            </div>
        </div>
    </div>
</template>

<style scoped></style>
