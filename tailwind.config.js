import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import typography from '@tailwindcss/typography';

/** @type {import('tailwindcss').Config} */
export default {
  content: [
    './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
    './vendor/laravel/jetstream/**/*.blade.php',
    './storage/framework/views/*.php',
    './resources/views/**/*.blade.php',
    './resources/js/**/*.jsx',
  ],

  theme: {
    colors: {
      customMoradoClaro: '#d1bcde',
      customVerdeClaro: '#8ebbc5',
      customMoradoOscuro: '#7d4c8a',
      customMoradoMedio: '#cb6ce6',
      customRosado: '#faacde',
      customNaranja: '#f8c2a1',
      customVerdeOscuro: '#19757c',
      //para blanco usar white o
      customBlanco: '#ffffff',
    },

    extend: {
      fontFamily: {
        sans: ['Figtree', ...defaultTheme.fontFamily.sans],
      },
    },
  },

  plugins: [forms, typography],
};
