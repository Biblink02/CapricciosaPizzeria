<script setup lang="ts">

defineProps<{
    footer: Footer
}>()

</script>

<template>
    <footer class="footer flex flex-row space-x-10 justify-center my-28">
        <div v-for="section in footer.sections">
            <h1 class="font-bold">
                {{ section.title }}
            </h1>
            <hr class="w-full">
            <div>
                <p v-for="row in section.rows">
                    {{ row }}
                </p>
            </div>
        </div>
    </footer>
</template>
