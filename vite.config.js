import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
            ],
            refresh: true,
        }),

        // Automatsko osvjezavanje stranice nakon izvrsenih izmjena
        {
            name: 'blade',
            handleHotUpdate({ file, server }) {
                if(file.endsWith('.blade.php')) {
                    server.ws.send({
                        type: 'full-reload',
                        path: '*',
                    });
                }
            }
        }
    ],
});
