<script setup>
import { Head, Link } from "@inertiajs/inertia-vue3";

import Layout from "~/components/Layout.vue";

defineProps({
	user: Object,
	url: String,
	imageUrl: String,
});
</script>

<template>
	<Head>
		<title>cheeze2000.net</title>
		<meta
			name="description"
			content="A personal blog where I demystify and share the new things I learned"
		>
		<meta
			name="theme-color"
			content="#ffb129"
		>
		<meta
			property="og:description"
			content="A personal blog where I demystify and share the new things I learned"
		>
		<meta
			property="og:title"
			content="cheeze2000.net"
		>
		<meta
			property="og:type"
			content="website"
		>
		<meta
			property="og:url"
			:content="url"
		>
		<meta
			property="og:image"
			:content="imageUrl"
		>
	</Head>
	<Layout :user="user">
		<div class="flex flex-col items-center gap-12 pt-30 mx-auto w-72 text-center">
			<img
				class="w-24 h-24"
				src="~~/img/cry.png"
			>
			<div class="flex flex-col gap-3">
				<p class="font-inter text-6xl tracking-wide">
					404
				</p>
				<p class="text-xl">
					The page you're looking for doesn't exist!
				</p>
			</div>
			<Link
				class="px-4 py-3 w-fit font-inter font-bold text-primary bg-secondary hover:bg-accent rounded"
				href="/"
			>
				Go to Home
			</Link>
		</div>
	</Layout>
</template>
