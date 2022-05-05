<script setup>
import "highlight.js/styles/lioshi.css";

import MarkdownIt from "markdown-it";
import hljs from "highlight.js";

defineProps({
	content: String
});

const md = new MarkdownIt({
	highlight: function (code, language) {
		if (!language) return;
		return hljs.highlight(code, { language }).value;
	}
});
</script>

<template>
	<article v-html="md.render(content)" />
</template>

<style scoped>
article {
	> *:first-child {
		@apply mt-0
	}

	> *:last-child {
		@apply mb-0
	}

	:deep(h1) {
		@apply pb-2.5 mt-9 mb-4 text-4xl text-secondary border-b border-b-secondary
	}

	:deep(h2) {
		@apply pb-2 mt-7 mb-4 text-3xl text-secondary border-b border-b-secondary
	}

	:deep(h3) {
		@apply mt-6 mb-4 text-2xl text-secondary
	}

	:deep(p) {
		@apply mb-4 text-lg text-secondary
	}

	:deep(p code) {
		@apply px-1.5 py-0.5 text-base bg-secondary/10
	}

	:deep(a) {
		@apply hover:text-accent underline underline-offset-2
	}

	:deep(pre) {
		@apply overflow-x-auto p-4 mb-4 text-secondary bg-zinc-800 rounded
	}

	:deep(ol) {
		@apply pl-8 mb-4 text-lg list-decimal text-secondary
	}

	:deep(ul) {
		@apply pl-8 mb-4 text-lg list-disc text-secondary
	}

	:deep(img) {
		@apply mx-auto
	}
}
</style>
