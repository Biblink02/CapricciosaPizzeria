import { defineConfig, loadEnv } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';

interface Params {
    mode: string
}

// noinspection JSUnusedGlobalSymbols
export default ({ mode } : Params) => {
    process.env = {...process.env, ...loadEnv(mode, process.cwd())};

    return defineConfig({
        plugins: [
            laravel({
                input: 'resources/ts/app.ts',
                ssr: 'resources/ts/ssr.ts',
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
        ],

        resolve: {
            alias: {
                '@': '/resources/ts',
                '~': '/resources'
            }
        },

        server: {
            host: '0.0.0.0',
            port: parseInt(process.env.VITE_PORT ?? '3100'),
            hmr: {
                host: process.env.VITE_EXTERNAL_HOST
            },
        },
    });
};
