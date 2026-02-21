import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/sass/app.scss', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
    css: {
        preprocessorOptions: {
            scss: {
                // Keep vendor Sass deprecation output quiet until upstream packages modernize.
                quietDeps: true,
                silenceDeprecations: ['import', 'if-function', 'global-builtin', 'color-functions', 'slash-div'],
            },
        },
    },
});
