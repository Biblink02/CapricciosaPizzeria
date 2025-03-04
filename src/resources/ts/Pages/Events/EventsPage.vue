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
        :title="$t('events_section_title')"
    >
        <!-- Main content area -->
        <main class="px-3" role="main" :aria-label="$t('main_content_label')">
            <!-- Header section for the page title and description -->
            <header role="banner" :aria-label="$t('events_header_label')">
                <TitleComponent class="my-20">
                    <template #title>
                        {{ $t('events_section_title') }}
                    </template>
                    <template #description>
                        {{
                            $t('events_description_text')
                        }}
                    </template>
                </TitleComponent>
            </header>

            <!-- Section for listing events -->
            <section
                :aria-label="$t('event_listings_label')"
                class="mx-auto flex flex-col items-center gap-4 space-y-7"
            >
                <EventDetails
                    v-for="(event, index) in events"
                    :reverse="index % 2 != 0"
                    :key="event.uuid"
                    :event="event"
                    :aria-label="$t('event_details_for_label') + ' ' + event.name"
                />
            </section>

            <!-- Section for empty state -->
            <section
                v-if="showEmptyState"
                aria-live="polite"
                aria-atomic="true"
                class="max-w-2xl mx-auto"
                :aria-label="$t('no_events_available_label')"
            >
                <EmptyStateComponent>
                    <template #icon>
                        <SparklesIcon aria-hidden="true" />
                    </template>
                    <template #description>
                        {{
                            $t('no_events_text')
                        }}
                    </template>
                    <template #button></template>
                </EmptyStateComponent>
            </section>
        </main>
    </AppLayout>
</template>

<style scoped></style>
