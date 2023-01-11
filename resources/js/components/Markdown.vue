<script setup>
import "katex/dist/katex.min.css";
import "prism-themes/themes/prism-one-dark.css";

import { onMounted } from "vue";
import MarkdownIt from "markdown-it";
import MarkdownItUnderline from "markdown-it-underline";
import Prism from "prismjs";
import renderMathInElement from "katex/dist/contrib/auto-render.js";

defineProps({
	content: String,
});

const md = new MarkdownIt({
	highlight(str, lang) {
		let hl;
		try {
			hl = Prism.highlight(str, Prism.languages[lang]);
		} catch (err) {
			hl = md.utils.escapeHtml(str);
		}

		return `<pre class="language-${lang}"><code class="language-${lang}">${hl}</code></pre>`;
	},
})
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
