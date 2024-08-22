import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    darkMode: 'class',
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
        "./resources/js/**/*.js",
    ],

    theme: {
        colors: {
            primary: {
                50: '#f5f5fd',
                100: '#eeecfb',
                200: '#dddbf9',
                300: '#c4bef4',
                400: '#a699ec',
                500: '#8870e2',
                600: '#7651d6',
                700: '#6a44c4',
                800: '#5534a3',
                900: '#472c86',
                950: '#2b1b5a',
            },
            white: {
                50: '#ffffff',
                100: '#efefef',
                200: '#dcdcdc',
                300: '#bdbdbd',
                400: '#989898',
                500: '#7c7c7c',
                600: '#656565',
                700: '#525252',
                800: '#464646',
                900: '#3d3d3d',
                950: '#292929',
            },
            turquoise: {
                50: '#effefc',
                100: '#c7fff7',
                200: '#90fff0',
                300: '#50f8e7',
                400: '#1ce5d6',
                500: '#04d5c9',
                600: '#00a19b',
                700: '#05807d',
                800: '#096665',
                900: '#0d5453',
                950: '#003133',
            },
            violet: {
                50: '#f5f5fd',
                100: '#eeecfb',
                200: '#dddbf9',
                300: '#c4bef4',
                400: '#a699ec',
                500: '#8870e2',
                600: '#7651d6',
                700: '#6a44c4',
                800: '#5534a3',
                900: '#472c86',
                950: '#2b1b5a',
            }, 
          },
        extend: {
            backgroundImage: {
                'custom-gradient': 'linear-gradient(21.23deg, #6A44C4 -16.01%, #392270 80.79%)',
              },
            // backgroundImage: {
            //     'gradient-custom': 'linear-gradient(to bottom, #2D3244, #748095)',
            //   },
            fontFamily: {
                poppins: ['"Poppins"', ...defaultTheme.fontFamily.sans],
                // sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [forms],
};
