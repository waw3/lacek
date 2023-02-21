import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import {homedir} from 'os';
import {resolve} from 'path';
import fs from 'fs';
import * as dotenv from 'dotenv';
dotenv.config();

export default defineConfig({
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
        }),
    ],
    server: detectServerConfig(process.env.APP_URL_BASE),
});

function detectServerConfig(host) {
    let keyPath = resolve(homedir(), `.config/valet/Certificates/${host}.key`)
    let certificatePath = resolve(homedir(), `.config/valet/Certificates/${host}.crt`)

    if (!fs.existsSync(keyPath)) {
        return {}
    }

    if (!fs.existsSync(certificatePath)) {
        return {}
    }

    return {
        hmr: {host},
        host,
        https: {
            key: fs.readFileSync(keyPath),
            cert: fs.readFileSync(certificatePath),
        },
    }
}
