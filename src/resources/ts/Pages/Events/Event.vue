<script setup lang="ts">
import {Event} from "@/Types/Event";
import {formatDate} from "../../Types/DateFormatterHelper";


const props = defineProps<{
    event: Event
}>()
console.log(props.event)
</script>

<template>

    <div class="max-w-sm w-full text-left flex flex-col overflow-hidden rounded-lg shadow-lg">
        <div class="flex-shrink-0">
            <img class="h-48 w-full object-cover" :src="'images/'+event?.img_url" alt=""/>
        </div>
        <div class="flex flex-1 flex-col justify-between bg-white p-6">
            <div class="flex-1">
                <div class="mt-2 block">
                    <p class="text-xl font-semibold text-gray-900">{{ event.name }}</p>
                    <p class="mt-3 text-base text-gray-500">{{ event.description }}</p>
                </div>
            </div>
            <div class="mt-6 flex items-center">
                <div class="flex-shrink-0">
                    <span class="sr-only">{{ $t('Giorno evento') }}</span>
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-900">
                        {{ $t('Giorno evento') }}
                    </p>
                    <div class="flex space-x-1 text-sm text-gray-500">
                        <time :datetime="event.starts_at">{{$t('Dal ')}}{{ formatDate(event.starts_at) }}</time>
                        <time :datetime="event.ends_at">{{$t('al ')}}{{ formatDate(event.ends_at) }}</time>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped>

</style>
