import laravel from 'laravel-vite-plugin'
import { defineConfig, loadEnv } from 'vite'
import { networkInterfaces } from 'os'
import VitePluginBrowserSync from 'vite-plugin-browser-sync'

/** @type {import('vite').UserConfig} */
export default defineConfig(({ command, mode }) => {
    const env = loadEnv(mode, process.cwd(), '')
    const ip = Object.values(networkInterfaces()).flat().find((i) => i.family == 'IPv4' && !i.internal)?.address

    return {
        plugins: [
            laravel({
                refresh: true,
                valetTls: env.APP_URL.startsWith('https://') ? env.APP_URL.replace(/^https?:\/\//, '') : false,
                input: [
                    'resources/css/site.css',
                    'resources/js/site.js',
                ]
            }),
            (() => {
                if (env.VITE_BROWSERSYNC) {
                    return VitePluginBrowserSync({
                        bs: {
                            proxy: env.APP_URL,
                            notify: false,
                        },
                    })
                }
            })(),
        ],
        server: {
            host: env.VITE_BROWSERSYNC && ip ? ip : false,
            open: env.APP_URL
        }
    }
});
