import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/js/app.js',
                'resources/js/scriptNav.js',
                'resources/css/app.css',
                'resources/css/CreatePostStyle.css',
                'resources/css/RegistrStyle.css',
                'resources/css/LogStyle.css',
                'resources/css/PostStyle.css',
                'resources/css/NavStyle.css',
                'resources/css/ProfileStyle.css',
                'resources/css/SinglePostStyle.css',
                'resources/css/TailW.css'
            ],
            refresh: true,
        }),
    ],
});
