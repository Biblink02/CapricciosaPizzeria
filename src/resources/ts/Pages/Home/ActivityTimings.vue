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
        imageUrl:
            'https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80',
        location: 'Dalle 12:00 alle 14:00',
    },
    {
        id: 1,
        date: 'Dalle 15:00 alle 20:00',
        time: '5:00 PM',
        datetime: '2022-01-10T17:00',
        name: 'Martedì',
        imageUrl:
            'https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80',
        location: 'Dalle 12:00 alle 14:00',
    },
    {
        id: 1,
        date: 'Dalle 15:00 alle 20:00',
        time: '5:00 PM',
        datetime: '2022-01-10T17:00',
        name: 'Mercoledì',
        imageUrl:
            'https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80',
        location: 'Dalle 12:00 alle 14:00',
    },
    {
        id: 1,
        date: 'Dalle 15:00 alle 20:00',
        time: '5:00 PM',
        datetime: '2022-01-10T17:00',
        name: 'Venerdì',
        imageUrl:
            'https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80',
        location: 'Dalle 12:00 alle 14:00',
    },
    {
        id: 1,
        date: 'Dalle 15:00 alle 20:00',
        time: '5:00 PM',
        datetime: '2022-01-10T17:00',
        name: 'Sabato',
        imageUrl:
            'https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80',
        location: 'Dalle 12:00 alle 14:00',
    },
    {
        id: 1,
        date: 'Dalle 15:00 alle 20:00',
        time: '5:00 PM',
        datetime: '2022-01-10T17:00',
        name: 'Domenica',
        imageUrl:
            'https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80',
        location: 'Dalle 12:00 alle 14:00',
    },
    // More meetings...
]
const days = [
    { date: '2021-12-27' },
    { date: '2021-12-28' },
    { date: '2021-12-29' },
    { date: '2021-12-30' },
    { date: '2021-12-31' },
    { date: '2022-01-01', isCurrentMonth: true },
    { date: '2022-01-02', isCurrentMonth: true },
    { date: '2022-01-03', isCurrentMonth: true },
    { date: '2022-01-04', isCurrentMonth: true },
    { date: '2022-01-05', isCurrentMonth: true },
    { date: '2022-01-06', isCurrentMonth: true },
    { date: '2022-01-07', isCurrentMonth: true },
    { date: '2022-01-08', isCurrentMonth: true },
    { date: '2022-01-09', isCurrentMonth: true },
    { date: '2022-01-10', isCurrentMonth: true },
    { date: '2022-01-11', isCurrentMonth: true },
    { date: '2022-01-12', isCurrentMonth: true, isToday: true },
    { date: '2022-01-13', isCurrentMonth: true },
    { date: '2022-01-14', isCurrentMonth: true },
    { date: '2022-01-15', isCurrentMonth: true },
    { date: '2022-01-16', isCurrentMonth: true },
    { date: '2022-01-17', isCurrentMonth: true },
    { date: '2022-01-18', isCurrentMonth: true },
    { date: '2022-01-19', isCurrentMonth: true },
    { date: '2022-01-20', isCurrentMonth: true },
    { date: '2022-01-21', isCurrentMonth: true },
    { date: '2022-01-22', isCurrentMonth: true, isSelected: true },
    { date: '2022-01-23', isCurrentMonth: true },
    { date: '2022-01-24', isCurrentMonth: true },
    { date: '2022-01-25', isCurrentMonth: true },
    { date: '2022-01-26', isCurrentMonth: true },
    { date: '2022-01-27', isCurrentMonth: true },
    { date: '2022-01-28', isCurrentMonth: true },
    { date: '2022-01-29', isCurrentMonth: true },
    { date: '2022-01-30', isCurrentMonth: true },
    { date: '2022-01-31', isCurrentMonth: true },
    { date: '2022-02-01' },
    { date: '2022-02-02' },
    { date: '2022-02-03' },
    { date: '2022-02-04' },
    { date: '2022-02-05' },
    { date: '2022-02-06' },
]
</script>


<template>
    <div class="max-w-7xl w-full px-6 mx-auto">
        <h2 class="text-lg font-semibold text-gray-900">{{$t('Orari settimanali ed eventi')}}</h2>
        <div class="lg:grid lg:grid-cols-12 lg:gap-x-16">
            <div class="mt-10 text-center lg:col-start-8 lg:col-end-13 lg:row-start-1 lg:mt-9 xl:col-start-9">

                <Event v-if="event" :event="event"></Event>
                <button type="button" class="mt-8 w-full rounded-md border border-transparent bg-capricciosa_green py-2 px-4 text-sm font-medium text-white shadow hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">{{$t('Vai agli eventi')}}</button>
            </div>
            <ol class="mt-4 divide-y divide-gray-100 text-sm leading-6 lg:col-span-7 xl:col-span-8">
                <li v-for="meeting in meetings" :key="meeting.id" class="relative flex space-x-6 py-6 xl:static">
                    <div class="flex-auto">
                        <h3 class="pr-10 font-semibold text-gray-900 xl:pr-0">{{ meeting.name }}</h3>
                        <dl class="mt-2 flex flex-col text-gray-500 xl:flex-row">
                            <div class="flex items-start space-x-3">
                                <dt class="mt-0.5">
                                    <span class="sr-only">Date</span>
                                    <SunIcon class="h-5 w-5 text-gray-400" aria-hidden="true" />
                                </dt>
                                <dd>
                                    <time :datetime="meeting.datetime">{{ meeting.date }} at {{ meeting.time }}</time>
                                </dd>
                            </div>
                            <div class="mt-2 flex items-start space-x-3 xl:mt-0 xl:ml-3.5 xl:border-l xl:border-gray-400 xl:border-opacity-50 xl:pl-3.5">
                                <dt class="mt-0.5">
                                    <span class="sr-only">Location</span>
                                    <MoonIcon class="h-5 w-5 text-gray-400" aria-hidden="true" />
                                </dt>
                                <dd>{{ meeting.location }}</dd>
                            </div>
                        </dl>
                    </div>
                </li>
            </ol>
        </div>
    </div>
</template>
