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
    console.log(bookDialog)
    bookDialog.showModal()
}
const hideBookDialog = () => {
    isBookDialogOpen.value = true
}
const isOpeningHoursDialogOpen = ref(false)
const showOpeningHoursDialog = () => {
    isOpeningHoursDialogOpen.value = true
}
const hideOpeningHoursDialog = () => {
    isOpeningHoursDialogOpen.value = false
}
</script>


<template>

    <dialog ref="bookDialog" id="my_modal_3" class="modal z-100">
        <div class="modal-box z-100">
            <form method="dialog">
                <button @click="hideBookDialog" class="z-100 btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
            </form>
            <h3 class="z-100 font-bold text-lg">Hello!</h3>
            <p class="z-100 py-4">Press ESC key or click on ✕ button to close</p>
        </div>
    </dialog>
    <dialog v-if="isOpeningHoursDialogOpen" id="aaaa" class="modal">
        <div class="modal-box">
            <form method="dialog">
                <button @click="hideOpeningHoursDialog" class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
            </form>
            <h3 class="font-bold text-lg">Hello!</h3>
            <p class="py-4">Press ESC key or click on ✕ button to close</p>
        </div>
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
