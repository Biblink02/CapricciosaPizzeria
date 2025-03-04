import { defineConfig, loadEnv } from 'vite'
import vue from '@vitejs/plugin-vue'
import { imagetools } from 'vite-imagetools'
import { PrimeVueResolver } from '@primevue/auto-import-resolver'
import Components from 'unplugin-vue-components/vite'
import laravel from 'laravel-vite-plugin'
import tailwindcss from "@tailwindcss/vite";
interface Params {
    mode: string
}

// noinspection JSUnusedGlobalSymbols
export default ({ mode }: Params) => {
    process.env = { ...process.env, ...loadEnv(mode, process.cwd()) }

    return defineConfig({
        plugins: [
            Components({
                resolvers: [PrimeVueResolver()],
            }),
            imagetools({
                defaultDirectives: () => {
                    return new URLSearchParams({
                        format: 'webp',
                        quality: '40',
                    })
                },
            }),
            laravel({
                input: ['./resources/ts/app.ts', './resources/css/app.css'],
                refresh: true,
            }),
            vue({
                template: {
                    transformAssetUrls: {
                        base: null,
                        includeAbsolute: false,
                    },
                },
            }),
            tailwindcss()
        ],

        resolve: {
            alias: {
                '@': '/resources/ts',
                '~': '/resources',
                'vue-i18n': 'vue-i18n/dist/vue-i18n.cjs.js', // https://github.com/intlify/vue-i18n-next/issues/789
            },
        },

        server: {
            host: '0.0.0.0',
            port: parseInt(process.env.VITE_PORT ?? '3100'),
            hmr: {
                host: process.env.VITE_EXTERNAL_HOST,
            },
        },
    })
}
