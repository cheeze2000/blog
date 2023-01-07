<script setup>
import "highlight.js/styles/atom-one-dark.css";
import "katex/dist/katex.min.css";

import { onMounted } from "vue";
import Highlight from "highlight.js";
import MarkdownIt from "markdown-it";
import MarkdownItUnderline from "markdown-it-underline";
import renderMathInElement from "katex/dist/contrib/auto-render.js";

defineProps({
	content: String,
});

const md = new MarkdownIt({
	highlight: function (str, language) {
		return Highlight.highlight(str, { language }).value;
	},
});

md.use(MarkdownItUnderline);

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
