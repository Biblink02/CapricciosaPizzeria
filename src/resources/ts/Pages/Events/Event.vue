<script setup lang="ts">
import {Event} from "@/Types/Event";
import ButtonComponent from "@/Components/ButtonComponent.vue";
import {formatDate} from "@/Types/DateFormatterHelper";
import {router} from "@inertiajs/vue3";
import route from "ziggy-js";

const props = defineProps<{
    event: Event,
    type?: 'big' | 'normal'
}>()


const visitEvents = () => {
    router.visit(route('events'))
}
</script>

<template>
    <!-- TODO -->
    <div v-if="type === 'big'" class="card h-72 lg:card-side bg-base-100 shadow-xl">
        <figure class="lg:w-3/5 h-max-96"><img :src="'images/'+event?.img_url" class="object-cover" alt="Event"/></figure>
        <div class="card-body text-left">
            <h2 class="card-title">{{ event.name }}</h2>
            <p>{{ event.description }}</p>
            <div class="flex space-x-1 text-sm text-gray-500">
                <time :datetime="event.starts_at">{{$t('Dal ')}}{{ formatDate(event.starts_at) }}</time>
                <time :datetime="event.ends_at">{{$t('al ')}}{{ formatDate(event.ends_at) }}</time>
            </div>
            <div class="card-actions justify-end">
                <ButtonComponent @click="visitEvents">
                    {{ $t('Go to events') }}
                </ButtonComponent>
            </div>
        </div>
    </div>

    <div v-else class="card w-96 bg-base-100 shadow-xl">
        <figure><img :src="'images/'+event?.img_url" alt="Event" /></figure>
        <div class="card-body h-1/2">
            <h2 class="card-title">
                {{ event.name }}
            </h2>
            <p>{{ event.description }}</p>
            <div class="flex space-x-1 text-sm text-gray-500">
                <time :datetime="event.starts_at">{{$t('Dal ')}}{{ formatDate(event.starts_at) }}</time>
                <time :datetime="event.ends_at">{{$t('al ')}}{{ formatDate(event.ends_at) }}</time>
            </div>
        </div>
    </div>
</template>

<style scoped>

</style>
