<script setup lang="ts">
import Event from '@/Pages/Events/Event.vue'
import { SparklesIcon } from '@heroicons/vue/16/solid'
import EmptyStateComponent from '@/Components/EmptyStateComponent.vue'

defineProps<{
    event: Event
}>()
</script>

<template>
    <div class="h-full max-w-3xl w-full p-10 relative">
        <div
            class="-z-1 absolute inset-0 background opacity-80 rounded-md"
        ></div>
        <EmptyStateComponent v-if="!event" class="max-w-xl mx-auto bg-white">
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
            <template #button> </template>
        </EmptyStateComponent>
        <Event class="h-full" type="big" v-if="event" :event="event"></Event>
    </div>
</template>

<style scoped>
.background {
    background: url('~/media/pages/home/wall_paper.jpg');
    background-size: 50%;
}
</style>
