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
import {Menu, MenuButton, MenuItem, MenuItems} from '@headlessui/vue'
import Event from "@/Pages/Events/Event.vue";
import {SparklesIcon} from "@heroicons/vue/16/solid";
import EmptyStateComponent from "@/Components/EmptyStateComponent.vue";
import route from "ziggy-js";
import {router} from "@inertiajs/vue3";
import ButtonComponent from "@/Components/ButtonComponent.vue";

defineProps<{
    event: Event
}>()

const visitEvents = () => {
    router.visit(route('events'))
}

const visitMenus = () => {
    router.visit(route('menus'))
}
</script>


<template>
    <div class="max-w-7xl w-full px-6 mx-auto flex flex-row">
        <!-- 3 bottoni rosa -->
        <div class="w-1/3 flex flex-col justify-between mb-24 mt-10">
            <ButtonComponent class="w-2/5 mx-auto">
                {{ $t('Menu') }}
            </ButtonComponent>
            <ButtonComponent class="w-2/5 mx-auto">
                {{ $t('Book') }}
            </ButtonComponent>
            <ButtonComponent class="w-2/5 mx-auto">
                {{ $t('Opening hours') }}
            </ButtonComponent>
        </div>

        <!-- Eventi -->
        <div class="w-2/3 mt-10 text-center lg:col-start-8 lg:col-end-13 lg:row-start-1 lg:mt-9 xl:col-start-9">
            <EmptyStateComponent v-if="!event" class="max-w-2xl mx-auto">
                <template #title>
                    {{ $t('There are no events') }}
                </template>
                <template #icon>
                    <SparklesIcon></SparklesIcon>
                </template>
                <template #description>
                    {{
                        $t('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc posuere ornare velit, non efficitur nisl imperdiet vitae. Donec mi turpis, accumsan eu sagittis in, iaculis nec tellus. Maecenas maximus consequat ante, eget aliquam ligula vehicula eu. In non augue quis purus scelerisque placerat sed in justo. Vivamus justo dolor, c')
                    }}
                </template>
                <template #button>
                </template>
            </EmptyStateComponent>
            <Event v-if="event" :event="event"></Event>
            <div class="flex justify-end mt-8">
                <ButtonComponent>
                    {{ $t('Go to events') }}
                </ButtonComponent>
            </div>
        </div>
    </div>
</template>
