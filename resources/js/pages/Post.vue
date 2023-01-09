<script setup>
import { Head } from "@inertiajs/inertia-vue3";
import { Icon } from "@iconify/vue";

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
		<div class="flex flex-col gap-18 py-12">
			<div class="flex flex-col gap-3 items-center text-center">
				<p class="font-inter text-3xl tracking-wide">
					{{ post.title }}
				</p>
				<p class="text-xl">
					{{ post.description }}
				</p>
				<p class="flex gap-2 items-center opacity-60">
					<Icon
						class="w-5 h-5"
						icon="material-symbols:timer-rounded"
					/>
					{{ post.read_time }} min. read
				</p>
			</div>
			<Markdown :content="post.content" />
		</div>
	</Layout>
</template>
