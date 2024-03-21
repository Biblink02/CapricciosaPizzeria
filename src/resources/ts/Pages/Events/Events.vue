<script setup lang="ts">

import AppLayout from "@/Layouts/AppLayout.vue";
import PageHeader from "@/Components/PageHeader.vue";
import {usePage} from "@inertiajs/vue3";
import Event from "@/Pages/Events/Event.vue";

const props = defineProps<{
    events: Event[]
}>()

const page = usePage();

</script>

<template>
    <AppLayout :title="$t('Events')" :footer="page.footer">
        <PageHeader>
            <div class="w-fit">
                {{ $t('Eventi') }}
            </div>
        </PageHeader>
        <div>
            <Event v-for="event in events" :event="event"/>
        </div>
    </AppLayout>
</template>

<style scoped>

</style>
