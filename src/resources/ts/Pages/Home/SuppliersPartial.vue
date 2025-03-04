<script setup lang="ts">
import { Supplier } from '@/Types/Supplier'

defineProps<{
    suppliers: Supplier[]
}>()
</script>

<template>
    <div class="grid place-content-center">
        <div
            class="mx-auto gap-8 max-w-5xl flex flex-row flex-wrap justify-center place-content-center"
            :aria-label="$t('our_suppliers_label')"
        >
            <template v-for="supplier in suppliers" :key="supplier.name">
                <a
                    class="flex w-1/2 sm:w-1/5"
                    :href="supplier.link"
                    target="_blank"
                    rel="noopener noreferrer"
                    :aria-label="$t('visit_supplier_label') + ': ' + supplier.name"
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
</template>

<style scoped></style>
