<script setup lang="ts">
const props = defineProps<{
    suppliers: Supplier[]
}>()
</script>

<template>
    <p
        class="mx-auto text-5xl md:text-7xl sacramento-regular tracking-tight text-gray-900"
    >
        {{ $t('Our excellences') }}
    </p>
    <div class="grid place-content-center">
        <div
            class="mx-auto gap-8 max-w-5xl flex flex-row flex-wrap justify-center place-content-center"
        >
            <template v-for="supplier in suppliers">
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
</template>

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Sacramento&display=swap');
.sacramento-regular {
    font-family: 'Sacramento', cursive;
    font-weight: 400;
    font-style: normal;
}
</style>
