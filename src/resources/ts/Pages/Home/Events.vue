<script setup lang="ts">
import Event from '@/Pages/Events/Event.vue'
import { SparklesIcon } from '@heroicons/vue/16/solid'
import EmptyStateComponent from '@/Components/EmptyStateComponent.vue'
import { images } from '@/Types/ImageHelper'

defineProps<{
    event: Event
}>()
</script>

<template>
    <div v-if="event" class="relative md:p-5">
        <Event
            :reverse="false"
            class="h-full"
            type="big"
            v-if="event"
            :event="event"
        ></Event>
        <div
            class="max-md:hidden -z-1 absolute rounded-2xl inset-0 opacity-80 h-full bg-repeat"
            :style="{
                'background-size': 'auto 130%',
                'background-image': 'url(' + images.wall_paper + ')',
            }"
        ></div>
    </div>
    <div v-else class="sm:h-90 h-96 max-w-7xl w-full mx-auto relative">
        <div
            class="absolute rounded-2xl inset-0 opacity-80 h-full bg-repeat"
            :style="{
                'background-size': 'auto 130%',
                'background-image': 'url(' + images.wall_paper + ')',
            }"
        ></div>
        <div
            class="flex-wrap absolute inset-0 h-fit m-auto flex flex-row justify-around max-w-2xl p-3"
        >
            <EmptyStateComponent class="h-fit max-w-3xl" v-if="!event">
                <template #title>
                    {{ $t('There are no events') }}
                </template>
                <template #icon>
                    <SparklesIcon></SparklesIcon>
                </template>
                <template #description>
                    {{
                        $t(
                            'There are currently no events scheduled, we will organize one as soon as possible!'
                        )
                    }}
                </template>
            </EmptyStateComponent>
        </div>
    </div>
</template>

<style scoped></style>
