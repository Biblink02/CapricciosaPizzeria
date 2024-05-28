<script setup lang="ts">

import AppLayout from "@/Layouts/AppLayout.vue";
import {usePage} from "@inertiajs/vue3";
import Event from "@/Pages/Events/Event.vue";
import EmptyStateComponent from "@/Components/EmptyStateComponent.vue";
import {SparklesIcon} from "@heroicons/vue/16/solid";

const props = defineProps<{
    events: Event[]
}>()

const showEmptyState = props.events.length === 0

const page = usePage();

</script>

<template>
    <AppLayout :title="$t('Events')" :footer="page.footer">
        <div class="text-center">
            <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">{{ $t('Eventi') }}</h2>
            <p class="mx-auto mt-3 max-w-2xl text-xl text-gray-500 sm:mt-4">
                {{
                    $t('Join us for our special events, where great food and a warm atmosphere create unforgettable memories. Mark your calendar for our upcoming gatherings.')
                }}</p>
        </div>
        <div class="mx-auto mt-12 flex flex-row flex-wrap gap-4">
            <Event v-for="event in events" :event="event"/>
        </div>
        <EmptyStateComponent v-if="showEmptyState" class="max-w-2xl mx-auto">
            <template #title>
                {{ $t('Events') }}
            </template>
            <template #icon>
                <SparklesIcon></SparklesIcon>

            </template>
            <template #description>
                {{
                    $t('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc posuere ornare velit, non efficitur nisl imperdiet vitae. Donec mi turpis, accumsan eu sagittis in, iaculis nec tellus. Maecenas maximus consequat ante, eget aliquam ligula vehicula eu. In non augue quis purus scelerisque placerat sed in justo. Vivamus justo dolor, c')
                }}
            </template>
            <template #button>
            </template>
        </EmptyStateComponent>
    </AppLayout>

</template>

