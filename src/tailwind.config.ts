import type {Config} from 'tailwindcss';
import defaultTheme from 'tailwindcss/defaultTheme';

// noinspection JSUnusedGlobalSymbols
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/ts/**/*.vue',
    ],
    daisyui: {
        themes: ["light"],
    },
    plugins: [
        require('@tailwindcss/forms'),
        require('@tailwindcss/typography'),
        require('@tailwindcss/aspect-ratio'),
        require('daisyui')
    ],
    theme: {
        extend: {
            fontFamily: {
                custom: ['Brighted','CalloveScript','sans-serif'],
                sans: [
                    'Montserrat',
                    ...defaultTheme.fontFamily.sans,
                ],
            },
            colors: {
                capricciosa_green: '#a5b977',
                capricciosa_dark_green: '#91a46a',
                capricciosa_red: '#c2434c'
            }
        }
    }

} satisfies Config;
