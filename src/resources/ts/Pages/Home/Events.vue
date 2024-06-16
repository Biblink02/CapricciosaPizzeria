<script setup lang="ts">

import Event from "@/Pages/Events/Event.vue";
import {SparklesIcon} from "@heroicons/vue/16/solid";
import EmptyStateComponent from "@/Components/EmptyStateComponent.vue";
import route from "ziggy-js";
import {router} from "@inertiajs/vue3";
import ButtonComponent from "@/Components/ButtonComponent.vue";
import {ref} from "vue";

defineProps<{
    event: Event
}>()


const visitMenus = () => {
    router.visit(route('menus'))
}

const bookDialog = ref()
const showBookDialog = () => {
    bookDialog.value.showModal()
}

const openingHoursDialog = ref()
const showOpeningHoursDialog = () => {
    openingHoursDialog.value.showModal()
}

</script>


<template>
    <!-- TODO sistemare i dialog -->
    <!-- Dialog for booking -->
    <dialog ref="bookDialog" class="modal">
        <div class="modal-box">
            <form method="dialog">
                <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕
                </button>
            </form>
            <h3 class="font-bold text-lg">{{ $t("Book") }}:</h3>
            <p class="py-4">{{ $t("Bookings are accepted at the following numbers") }}</p>
        </div>

        <form method="dialog" class="modal-backdrop">
            <button>close</button>
        </form>
    </dialog>
    <!-- Dialog for Opening Hours -->
    <dialog ref="openingHoursDialog" class="modal">
        <div class="modal-box">
            <form method="dialog">
                <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕
                </button>
            </form>
            <h3 class="font-bold text-lg">{{ $t("Opening hours") }}:</h3>
            <p class="py-4">{{ $t("From 18:00 to 23:30") }}, {{ $t("Closed on Thursday")}}</p>
        </div>
        <form method="dialog" class="modal-backdrop">
            <button>close</button>
        </form>
    </dialog>

    <div class="h-full max-w-7xl w-full mx-auto flex sm:flex-row flex-col">

        <!-- 3 bottoni -->
        <div class="sm:w-1/3 w-full flex flex-col justify-between sm:mb-24 my-auto">
            <ButtonComponent @click="visitMenus" class="sm:w-2/5 w-full mx-auto">
                {{ $t('Menu') }}
            </ButtonComponent>
            <ButtonComponent @click="showBookDialog" class="sm:w-2/5 w-full mx-auto">
                {{ $t('Book') }}
            </ButtonComponent>
            <ButtonComponent @click="showOpeningHoursDialog" class="sm:w-2/5 w-full mx-auto">
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
                        $t('There are currently no events scheduled, we will organize one as soon as possible!')
                    }}
                </template>
                <template #button>
                </template>
            </EmptyStateComponent>
            <Event class="h-full" type="big" v-if="event" :event="event"></Event>
        </div>
    </div>
</template>

<style scoped>
.cursor-default {
    cursor: default;
}
</style>
