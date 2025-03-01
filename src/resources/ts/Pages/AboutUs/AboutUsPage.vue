<script setup lang="ts">
import AppLayout from '@/Layouts/AppLayout.vue'
import TitleComponent from '@/Components/TitleComponent.vue'
</script>

<template>
    <AppLayout
        current-page="About us"
        :title="$t('menu_page_title')"
    >
        <main role="main" class="container mx-auto">
            <section :aria-label="$t('capricciosa_motto_label')">
                <header>
                    <TitleComponent class="my-15">
                        <template #title>
                            {{ $t('capricciosa_design_title') }}
                        </template>
                    </TitleComponent>
                </header>
                <article
                    aria-labelledby="about-us-heading"
                    class="flex flex-col text-gray-700 text-justify md:text-lg md:max-w-3xl px-3 mx-auto lg:max-w-4xl gap-3"
                >
                    <p
                        aria-label="{{ $t('project_origin_description_label') }}"
                    >
                        {{ $t('project_origin_description') }}
                    </p>
                    <p aria-label="{{ $t('capricciosa_birth_label') }}">
                        {{ $t('capricciosa_birth') }}
                    </p>
                    <p aria-label="{{ $t('past_experiences_catering_label') }}">
                        {{ $t('past_experiences_catering') }}
                    </p>
                    <p
                        aria-label="{{ $t('interior_design_atmosphere_label') }}"
                    >
                        {{ $t('interior_design_atmosphere') }}
                    </p>
                    <p aria-label="{{ $t('menu_quality_label') }}">
                        {{ $t('menu_quality') }}
                    </p>
                    <p aria-label="{{ $t('themed_evenings_events_label') }}">
                        {{ $t('themed_evenings_events') }}
                    </p>
                </article>
            </section>
        </main>
    </AppLayout>
</template>

<style scoped></style>
