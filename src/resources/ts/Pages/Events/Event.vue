<script setup lang="ts">
import { Event } from '@/Types/Event'
import { formatDate } from '@/Types/DateFormatterHelper'
import { router } from '@inertiajs/vue3'
import { route } from 'ziggy-js'
import { images } from '@/Types/ImageHelper'

const props = defineProps<{
    event: Event
    reverse: boolean
}>()

const visitEvents = () => {
    router.visit(route('events'))
}
</script>

<template>
    <div
        class="flex items-center gap-5 max-lg:flex-col"
        :class="reverse ? 'lg:flex-row-reverse' : 'lg:flex-row'"
    >
        <div
            class="max-lg:hidden shadow-lg flex-grow rounded-2xl max-w-sm max-h-xl w-full h-full aspect-square h-full bg-cover object-scale-down"
            :style="{
                'background-image': 'url(images/' + event.img_url + ')',
            }"
        ></div>
        <div class="flex-1 max-sm:hidden max-w-5xl">
            <Card>
                <template #title>
                    <p>{{ event.name }}</p>
                    <div
                        class="lg:hidden my-5 shadow-lg flex-grow rounded-2xl max-w-sm max-h-xl w-full h-full aspect-square h-full bg-cover object-scale-down"
                        :style="{
                            'background-image':
                                'url(images/' + event.img_url + ')',
                        }"
                    ></div>
                </template>
                <template #content>
                    <div class="h-full flex flex-col gap-5">
                        <p class="whitespace-pre-wrap">
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
        </div>
        <div class="sm:hidden">
            <p class="font-bold">{{ event.name }}</p>
            <div
                class="lg:hidden my-5 shadow-lg flex-grow rounded-2xl max-w-sm max-h-xl w-full h-full aspect-square h-full bg-cover object-scale-down"
                :style="{
                    'background-image': 'url(images/' + event.img_url + ')',
                }"
            ></div>
            <div class="h-full flex flex-col gap-5">
                <p class="whitespace-pre-wrap">{{ event.description }}</p>
                <div class="flex space-x-1 text-sm text-gray-500">
                    <time :datetime="event.starts_at"
                        >{{ $t('Dal ') }}{{ formatDate(event.starts_at) }}</time
                    >
                    <time :datetime="event.ends_at"
                        >{{ $t('al ') }}{{ formatDate(event.ends_at) }}</time
                    >
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped></style>
