import laravel from 'laravel-vite-plugin'
import { defineConfig, loadEnv } from 'vite'
import { networkInterfaces } from 'os'
import VitePluginBrowserSync from 'vite-plugin-browser-sync'

/** @type {import('vite').UserConfig} */
export default defineConfig(({ command, mode }) => {
    const env = loadEnv(mode, process.cwd(), '')
    const ip = Object.values(networkInterfaces()).flat().find((i) => i.family == 'IPv4' && !i.internal)?.address
    const isSecuredSite = env.APP_URL.startsWith('https://')
    const url = env.APP_URL
    const host = url.replace(/^https?:\/\//, '')
    const useBrowserSync = env.VITE_BROWSERSYNC && ip

    if (useBrowserSync && isSecuredSite) {
        console.log('\x1b[31m%s\x1b[0m', 'Sorry, we didn\'t manage to get BrowserSync working with secured sites.');
        console.log('\x1b[31m%s\x1b[0m', 'If you can provide a solution, please enlighten us (https://github.com/studio1902/statamic-peak/pulls).');
        process.exit(1)
    }

    return {
        plugins: [
            laravel({
                refresh: true,
                valetTls: isSecuredSite ? host : false,
                input: [
                    'resources/css/site.css',
                    'resources/js/site.js',
                ]
            }),
            (() => {
                return useBrowserSync ? VitePluginBrowserSync({
                    bs: {
                        proxy: url,
                        notify: false,
                        open: 'external',
                    },
                }) : null;
            })()
        ],
        server: {
            host: useBrowserSync ? ip : host,
            open: useBrowserSync ? false : url,
        }
    }
});
