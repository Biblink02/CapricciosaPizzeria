<script setup lang="ts">
import AppLayout from '@/Layouts/AppLayout.vue'
import { route } from 'ziggy-js'
import TitleComponent from '@/Components/TitleComponent.vue'
import { ArrowDownIcon } from '@heroicons/vue/16/solid'
import { onBeforeUnmount, onMounted, ref, shallowRef } from 'vue'

const status = ref<'loading' | 'missing' | 'error' | 'ready'>('loading')
const availablePdfUrl = ref<string>()
const pdf = shallowRef<{
    viewer: typeof import('vue-pdf-embed')['default']
    source: Uint8Array
    language: 'it' | 'en' | null
    isItalianFallback: boolean
}>()
const request = new AbortController()

onMounted(async () => {
    const preferredLanguage = navigator.languages?.[0] ?? navigator.language
    const requestedLanguage = preferredLanguage?.split('-')[0] === 'en' ? 'en' : 'it'

    try {
        const url = route('pdf-menu', { lang: requestedLanguage }, false)
        const response = await fetch(url, { signal: request.signal })
        if (!response.ok) {
            status.value = response.status === 404 ? 'missing' : 'error'
            return
        }

        availablePdfUrl.value = url
        const [data, { default: viewer }] = await Promise.all([
            response.arrayBuffer(),
            import('vue-pdf-embed'),
        ])
        if (request.signal.aborted) return

        const language = response.headers.get('Content-Language')
        pdf.value = {
            viewer,
            source: new Uint8Array(data),
            language: language === 'it' || language === 'en' ? language : null,
            isItalianFallback: requestedLanguage === 'en' && language === 'it',
        }
    } catch {
        if (!request.signal.aborted) status.value = 'error'
    }
})

onBeforeUnmount(() => request.abort())
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

            <section
                class="mx-auto w-full max-w-7xl"
                :aria-label="$t('menu.pdf_viewer')"
            >
                <div
                    class="mb-5 rounded-lg border border-gray-200 bg-gray-50 px-4 py-4 text-center text-sm text-gray-700"
                >
                    <div role="status">
                        <p
                            v-if="status === 'loading'"
                            class="flex items-center justify-center gap-2"
                        >
                            <span
                                class="size-4 rounded-full border-2 border-current border-r-transparent motion-safe:animate-spin"
                                aria-hidden="true"
                            />
                            {{ $t('menu.pdf.loading') }}
                        </p>
                        <template v-else-if="status === 'ready' && pdf">
                            <p class="font-semibold text-capricciosa_darker_green">
                                {{ $t(`menu.pdf.${pdf.language ?? 'ready'}`) }}
                            </p>
                            <p v-if="pdf.isItalianFallback" class="mt-1">
                                {{ $t('menu.pdf.english_unavailable') }}
                            </p>
                            <p class="mt-2 flex items-center justify-center gap-2">
                                <ArrowDownIcon aria-hidden="true" class="size-4 shrink-0" />
                                {{ $t('menu.pdf.scroll_to_read') }}
                            </p>
                        </template>
                        <p v-else-if="status === 'error' && availablePdfUrl">
                            {{ $t('menu.pdf.viewer_error') }}
                        </p>
                        <p v-else>{{ $t(`menu.pdf.${status}`) }}</p>
                    </div>
                    <a
                        v-if="availablePdfUrl"
                        :href="availablePdfUrl"
                        class="inline-flex min-h-11 items-center font-semibold"
                        :class="
                            status === 'error'
                                ? 'mt-3 rounded-md bg-capricciosa_darker_green px-4 text-white'
                                : 'mt-1 text-capricciosa_darker_green underline underline-offset-2'
                        "
                    >
                        {{ $t(status === 'error' ? 'menu.pdf.open_instead' : 'menu.pdf.open') }}
                    </a>
                </div>

                <component
                    :is="pdf.viewer"
                    v-if="pdf && status !== 'error'"
                    class="w-full"
                    :class="{ invisible: status === 'loading' }"
                    annotation-layer
                    text-layer
                    :source="pdf.source"
                    :lang="pdf.language ?? undefined"
                    :aria-label="$t('menu.embedded_pdf')"
                    @rendered="status = 'ready'"
                    @loading-failed="status = 'error'"
                    @rendering-failed="status = 'error'"
                    @password-requested="status = 'error'"
                />
            </section>
        </main>
    </AppLayout>
</template>
