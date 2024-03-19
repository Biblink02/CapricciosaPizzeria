import './bootstrap.ts';

import '../css/app.css';
import 'vue-toast-notification/dist/theme-sugar.css';

import {createApp, h} from 'vue';
import {createI18n} from 'vue-i18n';
import {createInertiaApp} from '@inertiajs/vue3';
import '@fontsource/nunito';
import '@fontsource/roboto';
import PrimeVue from 'primevue/config';

import {languages, locale, fallbackLocale} from '../../lang/lang.js';
import {resolvePageComponent} from 'laravel-vite-plugin/inertia-helpers';

const messages = Object.assign(languages);

const appName = window.document.getElementsByTagName('title')[0]?.innerText || 'CapricciosaPizzeria';

createInertiaApp({
    title: (title) => {
        return `${title ? title + ' - ' : ''}${appName}`;
    },
    resolve: name => {
        return resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue')).then();
    },
    setup({el, App, props, plugin}) {
        const i18n = createI18n({
            legacy: false,
            locale: locale,
            fallbackLocale: fallbackLocale,
            formatFallbackMessages: true,
            messages: messages,
        });

        createApp({render: () => h(App, props)})
            .use(plugin)
            .use(i18n)
            .use(PrimeVue)
            .mount(el);
    },
}).then();
