import laravel from 'laravel-vite-plugin'
import { defineConfig, loadEnv } from 'vite'

/** @type {import('vite').UserConfig} */
export default defineConfig(({ command, mode }) => {
    const env = loadEnv(mode, process.cwd(), '')
    return {
        plugins: [
            laravel({
                refresh: true,
                valetTls: env.APP_URL.startsWith('https://') ? env.APP_URL.replace(/^https?:\/\//, '') : false,
                input: [
                    'resources/css/site.css',
                    'resources/js/site.js',
                ]
            })
        ],
        server: {
            open: env.APP_URL
        }
    }
});
