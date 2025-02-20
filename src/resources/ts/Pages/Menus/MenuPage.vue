<script setup lang="ts">
import AppLayout from '@/Layouts/AppLayout.vue'
import { route } from 'ziggy-js'
import VuePdfEmbed from 'vue-pdf-embed'
import TitleComponent from '@/Components/TitleComponent.vue'

const getCurrentLang = () => {
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
    <AppLayout current-page="Menu" :title="$t('Menus')">
        <main role="main" class="px-3">
            <TitleComponent
                class="my-15"
                :html-description-content="
                    $t('menu_page_subtitle', {
                        route: route('allergens-table'),
                        styles: 'text-capricciosa_darker_green font-bold',
                    })
                "
            >
                <template #title>
                    {{ $t('Menu') }}
                </template>
            </TitleComponent>
            <section aria-label="Menu PDF" class="flex items-center">
                <VuePdfEmbed
                    class="w-full mx-auto max-w-7xl"
                    annotation-layer
                    text-layer
                    :source="pdfSource"
                />
            </section>
        </main>
    </AppLayout>
</template>

<style scoped></style>
