import { defineConfig } from 'vite'
import laravel from 'laravel-vite-plugin'

export default defineConfig({
    plugins: [
        laravel({
            input: ["resources/sass/app.scss", "resources/js/app.js"],
            refresh: true,
            valetTls: "tallblog.test",
        }),
    ],
    // server: {
    //     host: "https://tallblog.test",
    //     https: true,
    // },
});
