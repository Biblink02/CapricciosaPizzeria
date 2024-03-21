<script setup lang="ts">

import AppLayout from "@/Layouts/AppLayout.vue";

const props = defineProps<{
    footer: Footer
}>()

</script>

<template>
  <AppLayout :footer="footer" title="home"/>
</template>

<style scoped>

</style>
