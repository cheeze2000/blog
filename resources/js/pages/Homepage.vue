<script setup>
import { Head } from "@inertiajs/inertia-vue3";

import About from "~/components/About.vue";
import Layout from "~/components/Layout.vue";
import Posts from "~/components/Posts.vue";

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
		<div class="flex">
			<Posts class="md:w-2/3" />
			<About class="hidden md:flex w-1/3 px-6 py-12" />
		</div>
	</Layout>
</template>
