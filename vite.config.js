import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import mkcert from "vite-plugin-mkcert";

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
            server: { https: true }, // Not needed for Vite 5+
            plugins: [ mkcert() ]
        }),
    ],
});
