<script setup>
import { Icon } from "@iconify/vue";
import { useForm } from "@inertiajs/inertia-vue3";

import Layout from "~/components/Layout.vue";

const props = defineProps({
	user: Object,
	posts: Array,
});

function url(id) {
	return `/dashboard/edit/${id}`;
}

async function del(id) {
	if (!confirm("Are you sure you want to delete this post?")) return;

	const form = useForm({ id });
	form.delete("/dashboard/posts");
}
</script>

<template>
	<Layout :user="user">
		<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-3">
			<a
				class="col-span-full p-2 w-fit h-fit text-xl hover:text-primary hover:bg-accent rounded border border-secondary/20"
				href="/dashboard/create"
			>
				New Post
			</a>
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
						<a
							class="underline underline-offset-2"
							:href="url(post.id)"
						>
							Edit
						</a>
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
