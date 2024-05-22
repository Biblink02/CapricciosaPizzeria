<script setup lang="ts">
import {
    CalendarIcon,
    ChevronLeftIcon,
    ChevronRightIcon,
    EllipsisHorizontalIcon,
    MapPinIcon,
    SunIcon,
    MoonIcon
} from '@heroicons/vue/20/solid'
import { Menu, MenuButton, MenuItem, MenuItems } from '@headlessui/vue'
import Event from "@/Pages/Events/Event.vue";
import {SparklesIcon} from "@heroicons/vue/16/solid";
import EmptyStateComponent from "@/Components/EmptyStateComponent.vue";
import route from "ziggy-js";
import {router} from "@inertiajs/vue3";

defineProps<{
    event: Event
}>()

const meetings = [
    {
        id: 1,
        date: 'Dalle 15:00 alle 20:00',
        time: '5:00 PM',
        datetime: '2022-01-10T17:00',
        name: 'Lunedì',
        location: 'Dalle 12:00 alle 14:00',
    },
    {
        id: 1,
        date: 'Dalle 15:00 alle 20:00',
        time: '5:00 PM',
        datetime: '2022-01-10T17:00',
        name: 'Martedì',
        location: 'Dalle 12:00 alle 14:00',
    },
    {
        id: 1,
        date: 'Dalle 15:00 alle 20:00',
        time: '5:00 PM',
        datetime: '2022-01-10T17:00',
        name: 'Mercoledì',
        location: 'Dalle 12:00 alle 14:00',
    },
    {
        id: 1,
        date: 'Dalle 15:00 alle 20:00',
        time: '5:00 PM',
        datetime: '2022-01-10T17:00',
        name: 'Venerdì',
        location: 'Dalle 12:00 alle 14:00',
    },
    {
        id: 1,
        date: 'Dalle 15:00 alle 20:00',
        time: '5:00 PM',
        datetime: '2022-01-10T17:00',
        name: 'Sabato',
        location: 'Dalle 12:00 alle 14:00',
    },
    {
        id: 1,
        date: 'Dalle 15:00 alle 20:00',
        time: '5:00 PM',
        datetime: '2022-01-10T17:00',
        name: 'Domenica',
        location: 'Dalle 12:00 alle 14:00',
    },
    // More meetings...
]
const visitEvents = () => {
    router.visit(route('events'))
}
</script>


<template>
    <div class="max-w-7xl w-full px-6 mx-auto">
        <h2 class="text-lg font-semibold text-gray-900">{{$t('Orari settimanali ed eventi')}}</h2>
        <div class="lg:grid lg:grid-cols-12 lg:gap-x-16">
            <div class="mt-10 text-center lg:col-start-8 lg:col-end-13 lg:row-start-1 lg:mt-9 xl:col-start-9">
                <EmptyStateComponent v-if="!event" class="max-w-2xl mx-auto">
                    <template #title>
                        {{ $t('There are no events') }}
                    </template>
                    <template #icon>
                        <SparklesIcon></SparklesIcon>

                    </template>
                    <template #description>
                        {{ $t('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc posuere ornare velit, non efficitur nisl imperdiet vitae. Donec mi turpis, accumsan eu sagittis in, iaculis nec tellus. Maecenas maximus consequat ante, eget aliquam ligula vehicula eu. In non augue quis purus scelerisque placerat sed in justo. Vivamus justo dolor, c') }}
                    </template>
                    <template #button>
                    </template>
                </EmptyStateComponent>
                <Event v-if="event" :event="event"></Event>
                <button @click="visitEvents" type="button" class="mt-8 w-full rounded-md border border-transparent bg-capricciosa_green py-2 px-4 text-sm font-medium text-white shadow hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">{{$t('Vai agli eventi')}}</button>
            </div>
            <ol class="mt-4 divide-gray-100 text-sm leading-6 lg:col-span-7 xl:col-span-8">
                <li v-for="meeting in meetings" :key="meeting.id" class="relative flex space-x-6 py-3 xl:static">
                    <div class="flex-auto">
                        <h3 class="pr-10 font-semibold text-gray-900 xl:pr-0">{{ meeting.name }}</h3>
                        <dl class="mt-2 flex flex-col text-gray-500 xl:flex-row">
                            <div class="flex items-start space-x-3">
                                <dt class="mt-0.5">
                                    <span class="sr-only">Date</span>
                                    <CalendarIcon class="h-5 w-5 text-gray-400" aria-hidden="true" />
                                </dt>
                                <dd>
                                    <time :datetime="meeting.datetime">{{ meeting.date }} at {{ meeting.time }}</time>
                                </dd>
                            </div>
                        </dl>
                    </div>
                </li>
            </ol>
        </div>
    </div>
</template>
