import { defineConfig, loadEnv } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig(({ mode}) => {
    // Load current .env-file
    const env = loadEnv(mode, process.cwd(), '')
    // Set the host based on APP_URL
    // noinspection JSUnresolvedVariable
    let host = new URL(env.APP_URL).host


    return {
        plugins: [
            laravel({
                input: [
                    'resources/sass/main.scss',
                    'resources/sass/lacek/themes/xeco.scss',
                    'resources/sass/lacek/themes/xinspire.scss',
                    'resources/sass/lacek/themes/xmodern.scss',
                    'resources/sass/lacek/themes/xsmooth.scss',
                    'resources/sass/lacek/themes/xwork.scss',
                    'resources/sass/lacek/themes/xdream.scss',
                    'resources/sass/lacek/themes/xpro.scss',
                    'resources/sass/lacek/themes/xplay.scss',
                    'resources/js/app.js',
                    'resources/js/lacek/app.js',
                    'resources/js/pages/datatables.js',
                    'resources/js/pages/slick.js',
                    'resources/js/pages/auth_signin.js',
                ],
                refresh: true,
                valetTls: host
            }),
        ]
    }
})
