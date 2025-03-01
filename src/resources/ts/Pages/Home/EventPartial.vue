<script setup lang="ts">
import EventDetails from '@/Pages/Events/EventDetails.vue'
import { SparklesIcon } from '@heroicons/vue/16/solid'
import EmptyStateComponent from '@/Components/EmptyStateComponent.vue'
import { images } from '@/Types/ImageHelper'

defineProps<{
    event: Event
}>()
</script>

<template>
    <!-- When an event exists -->
    <section
        v-if="event"
        class="relative md:p-5"
        :aria-label="$t('event_details_label')"
    >
        <article>
            <EventDetails
                :reverse="false"
                class="h-full"
                type="big"
                :event="event"
                :aria-label="$t('event_specific_details_label') + ': ' + event.name"
            />
        </article>
        <figure
            aria-hidden="true"
            class="max-md:hidden -z-1 absolute rounded-2xl inset-0 opacity-80 h-full bg-repeat"
            :style="{
                'background-size': 'auto 130%',
                'background-image': 'url(' + images.wall_paper + ')',
            }"
        ></figure>
    </section>

    <!-- When there is no event -->
    <section
        v-else
        class="sm:h-90 h-96 max-w-7xl w-full mx-auto relative"
        :aria-label="$t('no_upcoming_events_label')"
    >
        <figure
            aria-hidden="true"
            class="absolute rounded-2xl inset-0 opacity-80 h-full bg-repeat"
            :style="{
                'background-size': 'auto 130%',
                'background-image': 'url(' + images.wall_paper + ')',
            }"
        ></figure>

        <article
            class="flex-wrap absolute inset-0 h-fit m-auto flex flex-row justify-around max-w-2xl p-3"
            role="status"
            aria-live="polite"
            :aria-label="$t('no_scheduled_events_label')"
        >
            <EmptyStateComponent class="h-fit max-w-3xl">
                <template #title>
                    <h2>
                        {{ $t('no_events_title') }}
                    </h2>
                </template>
                <template #icon>
                    <SparklesIcon aria-hidden="true" />
                </template>
                <template #description>
                    <p>
                        {{
                            $t('no_events_description')
                        }}
                    </p>
                </template>
            </EmptyStateComponent>
        </article>
    </section>
</template>

<style scoped></style>
