<script setup>
useHead({
	htmlAttrs: {
		lang: "en"
	},
	meta: [
		{ name: "description", content: "A personal blog where I demystify and share the new things I learned." },
		{ name: "theme-color", content: "#3b5249" },
		{ property: "og:description", content: "A personal blog where I demystify and share the new things I learned." },
		{ property: "og:title", content: "cheeze2000.net" },
		{ property: "og:type", content: "website" },
		{ property: "og:url", content: "https://cheeze2000.net" }
	],
	title: "cheeze2000.net"
});
</script>

<template>
	<div class="container grid md:grid-cols-2 lg:grid-cols-3 auto-rows-[210px] gap-x-12 gap-y-6 p-6 mx-auto">
		<Card />
		<MiniCard :key="i" v-for="i in 9">
			{{ i }}
		</MiniCard>
	</div>
</template>
