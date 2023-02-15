<script setup>
import { useForm } from "@inertiajs/inertia-vue3";

import Layout from "~/components/Layout.vue";

const props = defineProps({
	user: Object,
	post: Object,
	id: Number,
	url: String,
});

const form = useForm({
	secondary_id: "",
	title: "",
	description: "",
	slug: "",
	thumbnail: "",
	content: "",
	published_on: "",
	published: false,
	pinned: false,
	...props.post,
});

async function create() {
	form.post("/dashboard/posts");
}

async function edit() {
	form.patch("/dashboard/posts");
}

function submit() {
	if (props.id) edit();
	else create();
}
</script>

<template>
	<Layout :user="user">
		<form
			class="flex flex-col gap-3"
			@submit.prevent="submit"
		>
			<input
				v-model="form.secondary_id"
				type="number"
				class="p-2 w-full text-neutral-900 rounded"
				placeholder="Secondary ID"
			>
			<input
				v-model="form.title"
				class="p-2 w-full text-neutral-900 rounded"
				placeholder="Title"
				:spellcheck="false"
			>
			<textarea
				v-model="form.description"
				class="p-2 w-full text-neutral-900 rounded"
				placeholder="Description (optional)"
				:rows="3"
				:spellcheck="false"
			/>
			<input
				v-model="form.slug"
				class="p-2 w-full text-neutral-900 rounded"
				placeholder="Slug"
				:spellcheck="false"
			>
			<input
				v-model="form.thumbnail"
				class="p-2 w-full text-neutral-900 rounded"
				placeholder="Thumbnail"
				:spellcheck="false"
			>
			<textarea
				v-model="form.content"
				class="p-2 w-full font-inc text-lg text-neutral-900 rounded"
				placeholder="Content"
				:rows="18"
				:spellcheck="false"
			/>
			<input
				v-model="form.published_on"
				type="date"
				class="p-2 w-full text-neutral-900 rounded"
			>
			<label class="flex items-center text-lg gap-2">
				<input
					v-model="form.published"
					class="p-2 w-5 h-5 rounded"
					type="checkbox"
				>
				Published
			</label>
			<label class="flex items-center text-lg gap-2">
				<input
					v-model="form.pinned"
					class="p-2 w-5 h-5 rounded"
					type="checkbox"
				>
				Pinned
			</label>
			<a
				class="p-2 text-xl text-center hover:text-primary hover:bg-accent rounded border border-secondary/20"
				:href="url"
				target="_blank"
			>
				Preview
			</a>
			<button class="p-2 text-xl hover:text-primary hover:bg-accent rounded border border-secondary/20">
				Submit
			</button>
		</form>
	</Layout>
</template>
