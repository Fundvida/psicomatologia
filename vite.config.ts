import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import react from '@vitejs/plugin-react';

export default defineConfig({
  plugins: [
    laravel({
      input: 'resources/js/app.jsx', // Change from app.tsx to app.jsx
      refresh: true,
    }),
    react(),
  ],
  resolve: {
    alias: {
      '@': '/resources/js',
    },
  },
});