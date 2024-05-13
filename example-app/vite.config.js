import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/CreatePostStyle.js',
                'resources/js/RegistrStyle.js',
                'resources/js/LogStyle.js',
                'resources/js/PostStyle.js',
                'resources/js/AllStyle.js',
                'resources/js/NavStyle.js'
            ],
            refresh: true,
        }),
    ],
});
