<script setup lang="ts">
import AppLayout from '@/Layouts/AppLayout.vue'
import { usePage } from '@inertiajs/vue3'
import EmptyStateComponent from '@/Components/EmptyStateComponent.vue'
import { SparklesIcon } from '@heroicons/vue/16/solid'
import EventDetails from '@/Pages/Events/EventDetails.vue'
import TitleComponent from '@/Components/TitleComponent.vue'

const props = defineProps<{
    events: Event[]
}>()

const showEmptyState = props.events.length === 0

const page = usePage()
</script>

<template>
    <AppLayout
        current-page="Events"
        :title="$t('Events')"
    >
        <!-- Main content area -->
        <main class="px-3" role="main" :aria-label="$t('Main content')">
            <!-- Header section for the page title and description -->
            <header role="banner" :aria-label="$t('Events Header')">
                <TitleComponent class="my-20">
                    <template #title>
                        {{ $t('Events') }}
                    </template>
                    <template #description>
                        {{
                            $t(
                                'Join us for our special events, where great food and a warm atmosphere create unforgettable memories. Mark your calendar for our upcoming gatherings.'
                            )
                        }}
                    </template>
                </TitleComponent>
            </header>

            <!-- Section for listing events -->
            <section
                :aria-label="$t('Event Listings')"
                class="mx-auto flex flex-col items-center gap-4 space-y-7"
            >
                <EventDetails
                    v-for="(event, index) in events"
                    :reverse="index % 2 != 0"
                    :key="event.uuid"
                    :event="event"
                    :aria-label="$t('Event details for') + ' ' + event.name"
                />
            </section>

            <!-- Section for empty state -->
            <section
                v-if="showEmptyState"
                aria-live="polite"
                aria-atomic="true"
                class="max-w-2xl mx-auto"
                :aria-label="$t('No events available')"
            >
                <EmptyStateComponent>
                    <template #icon>
                        <SparklesIcon aria-hidden="true" />
                    </template>
                    <template #description>
                        {{
                            $t(
                                'There are currently no events scheduled, we will organize one as soon as possible!'
                            )
                        }}
                    </template>
                    <template #button></template>
                </EmptyStateComponent>
            </section>
        </main>
    </AppLayout>
</template>

<style scoped></style>
