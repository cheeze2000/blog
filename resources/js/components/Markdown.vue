<script setup>
import "katex/dist/katex.min.css";
import "prism-themes/themes/prism-one-dark.css";

import { onMounted } from "vue";
import MarkdownIt from "markdown-it";
import MarkdownItPrism from "markdown-it-prism";
import MarkdownItUnderline from "markdown-it-underline";
import renderMathInElement from "katex/dist/contrib/auto-render.js";

defineProps({
	content: String,
});

const md = new MarkdownIt()
	.use(MarkdownItPrism)
	.use(MarkdownItUnderline);

onMounted(() => renderMathInElement(document.body, {
	delimiters: [
		{ left: "$$", right: "$$", display: true },
		{ left: "$", right: "$", display: false },
	],
	throwOnError: false,
}));
</script>

<template>
	<div
		class="md"
		v-html="md.render(content)"
	/>
</template>
