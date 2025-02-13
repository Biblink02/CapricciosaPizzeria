import { createApp, h } from 'vue'

import PrimeVue from 'primevue/config'
import './bootstrap.ts'
import '../css/app.css'
import 'primeicons/primeicons.css'
import Aura from '@primevue/themes/aura'
import { definePreset } from '@primevue/themes'
import LocaleIt from 'primelocale/it.json'
import { createInertiaApp } from '@inertiajs/vue3'
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers'

/*// essential styles
import 'vue-pdf-embed/dist/style/index.css'

// optional styles
import 'vue-pdf-embed/dist/style/annotationLayer.css'
import 'vue-pdf-embed/dist/style/textLayer.css'*/

const preset = definePreset(Aura, {
    semantic: {
        primary: {
            50: '#a5b977',
            100: '#a5b977',
            200: '#a5b977',
            300: '#a5b977',
            400: '#a5b977',
            500: '#a5b977',
            600: '#a5b977',
            700: '#a5b977',
            800: '#a5b977',
            900: '#a5b977',
            950: '#a5b977',
        },
    },
})

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => {
        return resolvePageComponent(
            `./Pages/${name}.vue`,
            import.meta.glob('./Pages/**/*.vue')
        ).then()
    },
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(i18n)
            .use(PrimeVue, {
                theme: {
                    preset: preset,
                    options: {
                        darkModeSelector: false,
                    },
                },
                locale: LocaleIt['it'],
            })
            .mount(el)
    },
}).then()
