import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import react from '@vitejs/plugin-react';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/js/app.jsx',
            ],
            output: {
                dir: 'public/build',
                fileName: {
                  js: 'static-name.js',
                  css: 'static-name.css',
                  images: 'static-name.[ext]'
                }
              },
            refresh: true,
        }),
        react({ fastRefresh: false })
    ],
    worker: {
        plugins: [react()],
    },
});
