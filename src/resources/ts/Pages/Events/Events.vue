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
        <div class="px-5">
            <div class="py-24 text-center">
                <h2 class="text-4xl font-[Salmela] tracking-tight text-gray-900 sm:text-4xl">{{ $t('Eventi') }}</h2>
                <p class="mx-auto mt-3 max-w-2xl  text-gray-500 sm:mt-4">
                    {{
                        $t('Join us for our special events, where great food and a warm atmosphere create unforgettable memories. Mark your calendar for our upcoming gatherings.')
                    }}</p>
            </div>
            <div class="mx-auto mt-12 flex flex-row flex-wrap justify-center gap-4">
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
                        $t('There are currently no events scheduled, we will organize one as soon as possible!')
                    }}
                </template>
                <template #button>
                </template>
            </EmptyStateComponent>
        </div>
    </AppLayout>

</template>

