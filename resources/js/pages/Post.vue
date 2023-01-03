<script setup>
import "highlight.js/styles/atom-one-dark.css";

import Highlight from "highlight.js";
import MarkdownIt from "markdown-it";
import MarkdownItUnderline from "markdown-it-underline";

import Layout from "~/components/Layout.vue";

defineProps({
	user: Object,
	post: Object,
});

const md = new MarkdownIt({
	highlight: function (str, language) {
		return Highlight.highlight(str, { language }).value;
	},
});

md.use(MarkdownItUnderline);
</script>

<template>
	<Layout :user="user">
		<div
			class="md"
			v-html="md.render(post.content)"
		/>
	</Layout>
</template>
