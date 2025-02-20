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
        class="flex items-center gap-5 max-lg:flex-col"
        :class="reverse ? 'lg:flex-row-reverse' : 'lg:flex-row'"
        aria-labelledby="event-title"
    >
        <figure
            class="max-lg:hidden shadow-lg flex-grow rounded-2xl max-w-sm max-h-xl w-full h-full aspect-square bg-cover"
            :style="{
                'background-image': 'url(images/' + event.img_url + ')',
            }"
            aria-hidden="true"
        ></figure>
        <section class="flex-1 max-sm:hidden max-w-5xl">
            <Card>
                <template #title>
                    <h1 class="font-cursive text-4xl" id="event-title">
                        {{ event.name }}
                    </h1>
                    <figure
                        class="lg:hidden my-5 shadow-lg flex-grow rounded-2xl max-w-sm max-h-xl w-full h-full aspect-square bg-cover"
                        :style="{
                            'background-image':
                                'url(images/' + event.img_url + ')',
                        }"
                        aria-hidden="true"
                    ></figure>
                </template>
                <template #content>
                    <div class="h-full flex flex-col gap-5">
                        <p class="text-gray-600 whitespace-pre-wrap">
                            {{ event.description }}
                        </p>
                        <div class="flex space-x-1 text-sm text-gray-500">
                            <time :datetime="event.starts_at"
                                >{{ $t('Dal ')
                                }}{{ formatDate(event.starts_at) }}</time
                            >
                            <time :datetime="event.ends_at"
                                >{{ $t('al ')
                                }}{{ formatDate(event.ends_at) }}</time
                            >
                        </div>
                    </div>
                </template>
            </Card>
        </section>
        <section class="sm:hidden flex flex-col items-center">
            <h1 class="font-cursive text-4xl">{{ event.name }}</h1>
            <figure
                class="lg:hidden my-5 shadow-lg flex-grow rounded-2xl max-w-sm max-h-xl w-full h-full aspect-square bg-cover"
                :style="{
                    'background-image': 'url(images/' + event.img_url + ')',
                }"
                aria-hidden="true"
            ></figure>
            <div class="h-full flex flex-col gap-5">
                <p class="text-gray-600 whitespace-pre-wrap">
                    {{ event.description }}
                </p>
                <div class="flex space-x-1 text-sm text-gray-500">
                    <time :datetime="event.starts_at"
                        >{{ $t('Dal ') }}{{ formatDate(event.starts_at) }}</time
                    >
                    <time :datetime="event.ends_at"
                        >{{ $t('al ') }}{{ formatDate(event.ends_at) }}</time
                    >
                </div>
            </div>
        </section>
    </article>
</template>

<style scoped></style>
