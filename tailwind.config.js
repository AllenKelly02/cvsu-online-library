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
                'green1': '#10A602',
                'green2': '#0E8504',
                'green3': '#115F0C',
                'green4': '#6A9A66',
                'green5': '#52DE97'
            },
            screens: {
                'mobile': '320px',
                
                'tablet': '640px',
                // => @media (min-width: 640px) { ... }
          
                'laptop': '1024px',
                // => @media (min-width: 1024px) { ... }
          
                'desktop': '1280px',
                // => @media (min-width: 1280px) { ... }
              },
        },
    },

    plugins: [forms, require("daisyui")],
};
