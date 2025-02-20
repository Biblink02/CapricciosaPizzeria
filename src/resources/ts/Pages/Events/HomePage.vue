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
        :footer="page.footer"
    >
        <!-- Main content area -->
        <main class="px-5" role="main">
            <!-- Header section for the page title and description -->
            <header role="banner" aria-label="Events Header">
                <TitleComponent class="mt-10 mb-15">
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
                aria-label="Event Listings"
                class="mx-auto flex flex-col items-center gap-4 space-y-7"
            >
                <EventDetails
                    v-for="(event, index) in events"
                    :reverse="index % 2 != 0"
                    :key="event.uuid"
                    :event="event"
                />
            </section>

            <!-- Section for empty state -->
            <section
                v-if="showEmptyState"
                aria-live="polite"
                aria-atomic="true"
                class="max-w-2xl mx-auto"
            >
                <EmptyStateComponent>
                    <template #icon>
                        <SparklesIcon />
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
