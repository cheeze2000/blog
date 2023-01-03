import { defineConfig } from "vite";
import { resolve } from "path";
import laravel from "laravel-vite-plugin";
import vue from "@vitejs/plugin-vue";

export default defineConfig({
	plugins: [
		laravel({
			input: "resources/js/app.js",
			ssr: "resources/js/ssr.js",
			refresh: true,
		}),
		vue({
			template: {
				transformAssetUrls: {
					base: null,
					includeAbsolute: false,
				},
			},
		}),
	],
	resolve: {
		alias: {
			"~/components": resolve("resources/js/components"),
			"~/css": resolve("resources/css"),
			"~/img": resolve("resources/img"),
		},
	},
	ssr: {
		noExternal: ["@inertiajs/server"],
	},
});
