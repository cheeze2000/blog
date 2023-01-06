<script setup>
import { ref } from "vue";

import Layout from "~/components/Layout.vue";
import Markdown from "~/components/Markdown.vue";

const props = defineProps({
	user: Object,
	url: String,
	id: Number,
});

const post = ref({
	published: false,
	pinned: false,
	content: "",
});

async function create() {
	const url = new URL("/api/dashboard/posts", props.url);
	await fetch(url, {
		method: "POST",
		headers: {
			"Content-Type": "application/json",
		},
		body: JSON.stringify(post.value),
	});

	window.location.href = "/dashboard";
}

async function edit() {
	const url = new URL("/api/dashboard/posts", props.url);
	await fetch(url, {
		method: "PATCH",
		headers: {
			"Content-Type": "application/json",
		},
		body: JSON.stringify({
			id: props.id,
			...post.value,
		}),
	});
}

function submit() {
	if (props.id) edit();
	else create();
}

async function getPost() {
	const url = new URL(`/api/dashboard/posts/${props.id}`, props.url);
	const res = await fetch(url);
	post.value = await res.json();
}

if (props.id) getPost();
</script>

<template>
	<Layout :user="user">
		<form
			class="flex flex-col gap-3"
			@submit.prevent="submit"
		>
			<input
				v-model="post.title"
				class="p-2 w-full text-neutral-900 rounded"
				placeholder="Title"
				:spellcheck="false"
			>
			<textarea
				v-model="post.description"
				class="p-2 w-full text-neutral-900 rounded"
				placeholder="Description (optional)"
				:rows="3"
				:spellcheck="false"
			/>
			<input
				v-model="post.slug"
				class="p-2 w-full text-neutral-900 rounded"
				placeholder="Slug"
				:spellcheck="false"
			>
			<input
				v-model="post.thumbnail"
				class="p-2 w-full text-neutral-900 rounded"
				placeholder="Thumbnail"
				:spellcheck="false"
			>
			<textarea
				v-model="post.content"
				class="p-2 w-full font-inc text-lg text-neutral-900 rounded"
				placeholder="Content"
				:rows="18"
				:spellcheck="false"
			/>
			<label class="flex items-center text-lg gap-2">
				<input
					v-model="post.published"
					class="p-2 w-5 h-5 rounded"
					type="checkbox"
				>
				Published
			</label>
			<label class="flex items-center text-lg gap-2">
				<input
					v-model="post.pinned"
					class="p-2 w-5 h-5 rounded"
					type="checkbox"
				>
				Pinned
			</label>
			<button class="p-2 text-xl hover:text-primary hover:bg-accent rounded border border-secondary/20">
				Submit
			</button>
			<p class="my-9 text-3xl text-center">
				Preview
			</p>
			<Markdown :content="post.content" />
		</form>
	</Layout>
</template>
