import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
    build: {
        outDir: 'public/build',
        rollupOptions: {
            input: {
                app: 'resources/css/app.css',
            },
        },
    },
    server: {
        host: '127.0.0.1',
        port: 5173,
    },
});
