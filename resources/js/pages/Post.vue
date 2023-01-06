<script setup>
import { Head } from "@inertiajs/inertia-vue3";

import Layout from "~/components/Layout.vue";
import Markdown from "~/components/Markdown.vue";

defineProps({
	user: Object,
	post: Object,
	url: String,
});
</script>

<template>
	<Head>
		<title>{{ post.title }} • cheeze2000.net</title>
		<meta
			name="description"
			:content="post.description"
		>
		<meta
			name="theme-color"
			content="#ffb129"
		>
		<meta
			property="og:description"
			:content="post.description"
		>
		<meta
			property="og:site_name"
			content="cheeze2000.net"
		>
		<meta
			property="og:title"
			:content="post.title"
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
			:content="post.thumbnail"
		>
	</Head>
	<Layout :user="user">
		<Markdown :content="post.content" />
	</Layout>
</template>
