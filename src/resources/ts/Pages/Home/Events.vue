<script setup lang="ts">
import Event from '@/Pages/Events/Event.vue'
import { SparklesIcon } from '@heroicons/vue/16/solid'
import EmptyStateComponent from '@/Components/EmptyStateComponent.vue'
import { route } from 'ziggy-js'
import { router } from '@inertiajs/vue3'
import ButtonComponent from '@/Components/ButtonComponent.vue'
import { ref } from 'vue'
import { images } from '@/Types/ImageHelper'

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
    <dialog ref="bookDialog" class="modal">
        <div class="modal-box">
            <form method="dialog">
                <button
                    class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2"
                >
                    ✕
                </button>
            </form>
            <h3 class="font-bold text-lg">{{ $t('Book') }}:</h3>
            <p class="py-4">
                {{ $t('Bookings are accepted at the following numbers') }}:
            </p>
            <p>
                <a href="tel:+390444022349" class="font-bold">{{
                    'Tel: +39 0444 022 349'
                }}</a>
            </p>
            <p>
                <a href="tel:+393292983245" class="font-bold">{{
                    'Mobile: +39 329 298 3245'
                }}</a>
            </p>
        </div>

        <form method="dialog" class="modal-backdrop">
            <button>close</button>
        </form>
    </dialog>
    <dialog ref="openingHoursDialog" class="modal">
        <div class="modal-box">
            <form method="dialog">
                <button
                    class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2"
                >
                    ✕
                </button>
            </form>
            <h3 class="font-bold text-lg">{{ $t('Opening hours') }}:</h3>
            <p class="py-4">
                {{ $t('Every day, except Tuesday, from 6:00 PM to 11:30 PM') }}
            </p>
        </div>
        <form method="dialog" class="modal-backdrop">
            <button>close</button>
        </form>
    </dialog>

    <div
        class="h-full mx-auto sm:w-2/3 max-w-3xl w-full opacity-80 rounded-md p-10 background"
    >
        <EmptyStateComponent
            v-if="!event"
            class="backdrop-blur-xl max-w-xl mx-auto bg-white/30"
        >
            <template #title>
                {{ $t('There are no events') }}
            </template>
            <template #icon>
                <SparklesIcon></SparklesIcon>
            </template>
            <template #description>
                {{
                    $t(
                        'There are currently no events scheduled, we will organize one as soon as possible!'
                    )
                }}
            </template>
            <template #button> </template>
        </EmptyStateComponent>
        <Event class="h-full" type="big" v-if="event" :event="event"></Event>
    </div>
</template>

<style scoped>
.background {
    background: url('~/media/pages/home/wall_paper.jpg');
    background-size: 50%;
}
</style>
