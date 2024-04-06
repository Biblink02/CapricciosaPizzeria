<script setup lang="ts">

import AppLayout from "@/Layouts/AppLayout.vue";
import {usePage} from "@inertiajs/vue3";
import Event from "@/Pages/Events/Event.vue";
import EmptyStateComponent from "@/Components/EmptyStateComponent.vue";
import {SparklesIcon} from "@heroicons/vue/16/solid";

const props = defineProps<{
    events: Event[]
}>()

const page = usePage();

</script>

<template>
    <AppLayout :title="$t('Events')" :footer="page.footer">
    <div class="relative px-6 pt-16 pb-20 lg:px-8 lg:pt-24 lg:pb-28">
        <div class="absolute inset-0">
            <div class="h-1/3 bg-white sm:h-2/3" />
        </div>
        <div class="relative mx-auto max-w-7xl">
            <div class="text-center">
                <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">{{$t('Eventi')}}</h2>
                <p class="mx-auto mt-3 max-w-2xl text-xl text-gray-500 sm:mt-4">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ipsa libero labore natus atque, ducimus sed.</p>
            </div>
            <div class="mx-auto mt-12 grid max-w-lg gap-5 lg:max-w-none lg:grid-cols-3">
                <Event v-for="event in events" :event="event"/>
            </div>
            <EmptyStateComponent class="max-w-2xl mx-auto">
                <template #title>
                    {{ $t('Events') }}
                </template>
                <template #icon>
                    <SparklesIcon></SparklesIcon>

                </template>
                <template #description>
                    {{ $t('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc posuere ornare velit, non efficitur nisl imperdiet vitae. Donec mi turpis, accumsan eu sagittis in, iaculis nec tellus. Maecenas maximus consequat ante, eget aliquam ligula vehicula eu. In non augue quis purus scelerisque placerat sed in justo. Vivamus justo dolor, c') }}
                </template>
                <template #button>
                </template>
            </EmptyStateComponent>
        </div>
    </div>
    </AppLayout>

</template>

