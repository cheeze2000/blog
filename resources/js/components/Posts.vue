<script setup>
import { Icon } from "@iconify/vue";
import { Link } from "@inertiajs/inertia-vue3";
import { useIntersectionObserver } from "@vueuse/core";
import { reactive, ref } from "vue";

const data = reactive({
	isLoading: false,
	offset: 0,
	posts: [],
});

const el = ref(null);

useIntersectionObserver(
	el,
	entry => {
		if (entry[0].isIntersecting) fetchPosts();
	},
);

async function fetchPosts() {
	if (data.isLoading) return;

	data.isLoading = true;

	const res = await fetch(`/api/posts?offset=${data.offset}`);
	const payload = await res.json();
	data.offset = payload.offset;
	data.posts.push(...payload.posts);

	data.isLoading = false;
}
</script>

<template>
	<div class="flex flex-col gap-6">
		<Link
			v-for="post in data.posts"
			:key="post.id"
			class="flex flex-col sm:flex-row gap-3"
			:href="post.url"
		>
			<div class="relative sm:w-5/12 text-sm">
				<img
					class="rounded w-full"
					:src="post.thumbnail"
					alt="thumbnail image"
				>
				<div class="absolute top-3 left-3 sm:hidden flex items-center gap-1 px-2 py-1 bg-secondary/10 backdrop-blur rounded">
					<Icon
						class="w-4 h-4"
						icon="material-symbols:timer-rounded"
					/>
					{{ post.read_time }} min. read
				</div>
				<div
					v-if="post.pinned"
					class="absolute top-3 right-3 sm:hidden flex items-center gap-1 px-2 py-1 bg-secondary/10 backdrop-blur rounded"
				>
					<Icon
						class="w-4 h-4"
						icon="ic:round-push-pin"
					/>
					Pinned
				</div>
			</div>
			<div class="flex flex-col justify-between sm:w-7/12">
				<div class="flex flex-col">
					<p class="font-inter text-lg hover:text-accent tracking-wide">
						{{ post.title }}
					</p>
					<p class="opacity-60">
						{{ post.description }}
					</p>
				</div>
				<div class="hidden sm:flex justify-between text-sm opacity-60">
					<div class="flex items-center gap-1">
						<Icon
							class="w-4 h-4"
							icon="material-symbols:timer-rounded"
						/>
						{{ post.read_time }} min. read
					</div>
					<div
						v-if="post.pinned"
						class="flex items-center gap-1"
					>
						<Icon
							class="w-4 h-4"
							icon="ic:round-push-pin"
						/>
						Pinned
					</div>
				</div>
			</div>
		</Link>
		<div
			v-if="data.offset >= 0 && !data.isLoading"
			ref="el"
			class="px-4 py-2 mx-auto w-fit text-primary bg-secondary hover:bg-accent rounded cursor-pointer"
			@click="fetchPosts"
		>
			Load More
		</div>
		<Icon
			v-if="data.isLoading"
			class="w-12 h-12 mx-auto"
			icon="eos-icons:three-dots-loading"
		/>
	</div>
</template>
