import type { Config } from 'tailwindcss'
import defaultTheme from 'tailwindcss/defaultTheme'
import typographyPlugin from '@tailwindcss/typography'
import formsPlugin from '@tailwindcss/forms'
import aspectRation from '@tailwindcss/aspect-ratio'

// noinspection JSUnusedGlobalSymbols
export default {
    important: true,
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/ts/**/*.vue',
    ],
    daisyui: {
        themes: ['light'],
    },
    safeList: ['font-cursive'],
    plugins: [formsPlugin, typographyPlugin, aspectRation],
    theme: {
        extend: {
            fontFamily: {
                cursive: ['Sacramento', 'sans-serif'],
                sans: ['Montserrat', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                capricciosa_green: '#a5b977',
                capricciosa_dark_green: '#91a46a',
                capricciosa_red: '#c2434c',
            },
        },
    },
} satisfies Config
