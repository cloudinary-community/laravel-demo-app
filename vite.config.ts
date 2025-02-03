import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";

export default defineConfig({
    plugins: [
        laravel({
            input: ["resources/client/app.css", "resources/client/app.ts"],
            refresh: true,
        }),
    ],
});
