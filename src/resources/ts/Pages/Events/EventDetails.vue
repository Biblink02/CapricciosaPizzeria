<script setup lang="ts">
import { Event } from '@/Types/Event'
import { formatDate } from '@/Types/DateFormatterHelper'

defineProps<{
    event: Event
    reverse: boolean
}>()
</script>

<template>
    <article
        class="flex items-center gap-5 max-lg:flex-col w-full max-w-7xl"
        :class="reverse ? 'lg:flex-row-reverse' : 'lg:flex-row'"
        :aria-labelledby="'event-title-' + event.uuid"
    >
        <!-- Event image (desktop) -->
        <figure
            class="max-lg:hidden shadow-lg flex-grow rounded-2xl max-w-sm w-full aspect-square bg-cover"
            :style="{ 'background-image': 'url(images/' + event.img_url + ')' }"
            aria-hidden="true"
        ></figure>

        <!-- Event details (desktop) -->
        <section
            class="flex-1 max-sm:hidden max-w-5xl w-full h-full"
            :aria-label="$t('event_details_label')"
        >
            <Card class="h-full">
                <template #title>
                    <h1
                        class="font-cursive text-4xl m-0"
                        :id="'event-title-' + event.uuid"
                    >
                        {{ event.name }}
                    </h1>
                    <figure
                        class="lg:hidden my-5 shadow-lg flex-grow rounded-2xl max-w-sm w-full aspect-square bg-cover"
                        :style="{ 'background-image': 'url(images/' + event.img_url + ')' }"
                        aria-hidden="true"
                    ></figure>
                </template>
                <template #content>
                    <div class="h-full flex flex-col gap-5 w-full">
                        <p
                            class="text-gray-600 whitespace-pre-wrap"
                            :aria-label="$t('event_description_label')"
                        >
                            {{ event.description }}
                        </p>
                        <div class="flex space-x-1 text-sm text-gray-500">
                            <time
                                :datetime="event.starts_at"
                                :aria-label="$t('event_start_label')"
                            >
                                {{ $t('event_from_text') }}{{ formatDate(event.starts_at) }}
                            </time>
                            <time
                                :datetime="event.ends_at"
                                :aria-label="$t('event_end_label')"
                            >
                                {{ $t('event_to_text') }}{{ formatDate(event.ends_at) }}
                            </time>
                        </div>
                    </div>
                </template>
            </Card>
        </section>

        <!-- Event details (mobile) -->
        <section
            class="sm:hidden flex flex-col items-center w-full"
            :aria-label="$t('event_details_label')"
        >
            <h1 class="font-cursive text-4xl m-0" :id="'event-title-' + event.uuid">
                {{ event.name }}
            </h1>
            <figure
                class="lg:hidden my-5 shadow-lg flex-grow rounded-2xl max-w-sm w-full aspect-square bg-cover"
                :style="{ 'background-image': 'url(images/' + event.img_url + ')' }"
                aria-hidden="true"
            ></figure>
            <div class="h-full flex flex-col gap-5 w-full">
                <p
                    class="text-gray-600 whitespace-pre-wrap"
                    :aria-label="$t('event_description_label')"
                >
                    {{ event.description }}
                </p>
                <div class="flex space-x-1 text-sm text-gray-500">
                    <time
                        :datetime="event.starts_at"
                        :aria-label="$t('event_start_label')"
                    >
                        {{ $t('event_from_text') }}{{ formatDate(event.starts_at) }}
                    </time>
                    <time
                        :datetime="event.ends_at"
                        :aria-label="$t('event_end_label')"
                    >
                        {{ $t('event_to_text') }}{{ formatDate(event.ends_at) }}
                    </time>
                </div>
            </div>
        </section>
    </article>
</template>

<style scoped></style>
