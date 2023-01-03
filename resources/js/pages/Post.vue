<script setup>
import "highlight.js/styles/atom-one-dark.css";

import { Head } from "@inertiajs/inertia-vue3";
import Highlight from "highlight.js";
import MarkdownIt from "markdown-it";
import MarkdownItUnderline from "markdown-it-underline";

import Layout from "~/components/Layout.vue";

defineProps({
	user: Object,
	post: Object,
	url: String,
});

const md = new MarkdownIt({
	highlight: function (str, language) {
		return Highlight.highlight(str, { language }).value;
	},
});

md.use(MarkdownItUnderline);
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
		<div
			class="md"
			v-html="md.render(post.content)"
		/>
	</Layout>
</template>
