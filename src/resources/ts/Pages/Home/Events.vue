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
    <div class="h-full max-w-7xl w-full mx-auto flex sm:flex-row flex-col">
        <!-- 3 bottoni rosa -->
        <div class="sm:w-1/3 w-full flex flex-col justify-between sm:mb-24 my-auto">
            <ButtonComponent class="sm:w-2/5 w-full mx-auto">
                {{ $t('Menu') }}
            </ButtonComponent>
            <ButtonComponent class="sm:w-2/5 w-full mx-auto">
                {{ $t('Book') }}
            </ButtonComponent>
            <ButtonComponent class="sm:w-2/5 w-full mx-auto">
                {{ $t('Opening hours') }}
            </ButtonComponent>
        </div>

        <!-- Eventi -->
        <div class="h-full sm:w-2/3 w-full">
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
            <Event class="h-full" type="big" v-if="event" :event="event"></Event>
        </div>
    </div>
</template>
