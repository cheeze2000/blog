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

<style>
article > *:first-child {
	@apply mt-0
}

article > *:last-child {
	@apply mb-0
}

article h1 {
	@apply pb-2.5 mt-9 mb-4 text-4xl text-secondary border-b border-b-secondary
}

article h2 {
	@apply pb-2 mt-7 mb-4 text-3xl text-secondary border-b border-b-secondary
}

article h3 {
	@apply mt-6 mb-4 text-2xl text-secondary
}

article p {
	@apply mb-4 text-lg text-secondary
}

article a {
	@apply text-accent underline
}

article pre {
	@apply overflow-x-auto p-4 mb-4 text-secondary bg-zinc-800 rounded
}

article ol {
	@apply pl-8 mb-4 text-lg list-decimal text-secondary
}

article ul {
	@apply pl-8 mb-4 text-lg list-disc text-secondary
}

article img {
	@apply mx-auto
}
</style>
