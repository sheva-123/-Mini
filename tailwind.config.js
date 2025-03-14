import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                leftCardAdmin: '#DBEAFE',
                midCardAdmin: '#FFE396',
                rightCardAdmin: '#D1FAE5',
                leftFont: '#2563EB',
                midFont: '#DFA400',
                rightFont: '#099669',
                hoverSidebar: '#04785766',
                Primary: '#047857',
                Secondary: '#C8DE00',
                Thead: '#D1FAE5',
            },
        },
    },

    plugins: [forms],
};
