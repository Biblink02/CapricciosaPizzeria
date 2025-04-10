<script setup lang="ts">
import AppLayout from '@/Layouts/AppLayout.vue'
import { route } from 'ziggy-js'
import TitleComponent from '@/Components/TitleComponent.vue'
import { defineAsyncComponent } from 'vue';

const VuePdfEmbed = defineAsyncComponent(() => import('vue-pdf-embed'));


function getCurrentLang(): string {
    if (navigator.languages && navigator.languages.length) {
        return navigator.languages[0].split('-')[0]
    } else if (navigator.language) {
        return navigator.language.split('-')[0]
    } else {
        return 'it'
    }
}

const pdfSource = route('pdf-menu', { lang: getCurrentLang() })
</script>

<template>
    <AppLayout current-page="Menu" :title="$t('menu.title')">
        <main role="main" class="px-3" :aria-label="$t('menu.main_content')">
            <TitleComponent
                class="my-15"
                :description-content="{
                    beforeText: $t('menu.subtitle.before'),
                    aText: $t('menu.subtitle.intermediate'),
                    afterText: $t('menu.subtitle.after'),
                    href: route('allergens-table'),
                    styles: 'text-capricciosa_darker_green font-bold',
                }"
            >
                <template #title>
                    {{ $t('menu.title') }}
                </template>
            </TitleComponent>

            <!-- Section for menu PDF -->
            <section
                class="flex items-center"
                :aria-label="$t('menu.pdf_viewer')"
            >
                <VuePdfEmbed
                    class="w-full mx-auto max-w-7xl"
                    annotation-layer
                    text-layer
                    :source="pdfSource"
                    :aria-label="$t('menu.embedded_pdf')"
                />
            </section>
        </main>
    </AppLayout>
</template>

<style scoped></style>
