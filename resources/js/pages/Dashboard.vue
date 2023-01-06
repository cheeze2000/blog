<script setup>
import { Icon } from "@iconify/vue";
import { Link } from "@inertiajs/inertia-vue3";
import { ref } from "vue";

import Layout from "~/components/Layout.vue";

const props = defineProps({
	user: Object,
	url: String,
});

const posts = ref([]);

function url(id) {
	return `/dashboard/edit/${id}`;
}

async function getPosts() {
	const url = new URL("/api/dashboard/posts", props.url);
	const res = await fetch(url);
	const data = await res.json();
	posts.value.push(...data);
}

async function del(id) {
	if (!confirm("Are you sure you want to delete this post?")) return;

	const url = new URL("/api/dashboard/posts", props.url);
	await fetch(url, {
		method: "DELETE",
		headers: {
			"Content-Type": "application/json",
		},
		body: JSON.stringify({ id }),
	});

	posts.value = posts.value.filter(p => p.id != id);
}

getPosts();
</script>

<template>
	<Layout :user="user">
		<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-3">
			<Link
				class="col-span-full p-2 w-fit h-fit text-xl hover:text-primary hover:bg-accent rounded border border-secondary/20"
				href="/dashboard/create"
			>
				New Post
			</Link>
			<div
				v-for="post in posts"
				:key="post.id"
				class="flex flex-col gap-3 p-2 h-fit rounded border border-secondary/20"
			>
				<div class="flex-col">
					<p class="font-inter text-lg tracking-wide">
						{{ post.title }}
					</p>
					<p class="opacity-60">
						{{ post.description }}
					</p>
				</div>
				<div class="flex justify-between">
					<div class="flex gap-2">
						<Link
							class="underline underline-offset-2"
							:href="url(post.id)"
						>
							Edit
						</Link>
						<p
							class="underline underline-offset-2 cursor-pointer"
							@click="del(post.id)"
						>
							Delete
						</p>
					</div>
					<div class="flex gap-2">
						<Icon
							v-if="post.published"
							class="w-5 h-5"
							icon="ic:round-public"
						/>
						<Icon
							v-if="post.pinned"
							class="w-5 h-5"
							icon="ic:round-push-pin"
						/>
					</div>
				</div>
			</div>
		</div>
	</Layout>
</template>
