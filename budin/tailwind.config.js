import defaultTheme from 'tailwindcss/defaultTheme';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                navy: {
                    50: '#f0f5ff',
                    100: '#e5edff',
                    200: '#cddbfe',
                    300: '#b4c6fc',
                    400: '#8da2fb',
                    500: '#6875f5',
                    600: '#5850ec',
                    700: '#5145cd',
                    800: '#42389d',
                    900: '#362f78',
                },
            },
        },
    },
    plugins: [],
};
