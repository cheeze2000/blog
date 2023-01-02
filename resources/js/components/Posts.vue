<script setup>
import { Icon } from "@iconify/vue";
import { Link } from "@inertiajs/inertia-vue3";
import { onMounted, reactive } from "vue";

const data = reactive({
	isLoading: false,
	offset: 0,
	posts: [],
});

async function fetchPosts() {
	data.isLoading = true;
	const res = await fetch(`/api/posts?offset=${data.offset}`);
	data.isLoading = false;

	const payload = await res.json();
	data.offset = payload.offset;
	data.posts.push(...payload.posts);
}

onMounted(fetchPosts);
</script>

<template>
	<div class="flex flex-col gap-6">
		<Link
			v-for="post in data.posts"
			:key="post.id"
			class="flex gap-3"
			:href="post.url"
		>
			<div class="w-5/12">
				<img
					class="rounded"
					:src="post.thumbnail"
					alt="thumbnail image"
				>
			</div>
			<div class="flex flex-col justify-between w-7/12">
				<p class="hover:text-accent">
					{{ post.title }}
				</p>
				<div class="flex justify-between text-sm opacity-60">
					<div class="flex items-center gap-1">
						<Icon
							class="w-4 h-4"
							icon="material-symbols:timer-rounded"
						/>
						<p>
							{{ post.read_time }} min. read
						</p>
					</div>
					<div
						v-if="post.pinned"
						class="flex items-center gap-1"
					>
						<Icon
							class="w-4 h-4"
							icon="ic:round-push-pin"
						/>
						<p>
							Pinned
						</p>
					</div>
				</div>
			</div>
		</Link>
		<div
			v-if="data.offset >= 0 && !data.isLoading"
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
