<script setup>
import { Icon } from "@iconify/vue";
import { Link } from "@inertiajs/inertia-vue3";

defineProps({
	user: Object,
});
</script>

<template>
	<div class="container mx-auto max-w-screen-sm min-h-screen">
		<div class="flex justify-between items-center p-3 pr-5">
			<div class="hover:text-accent">
				<Link href="/">
					<Icon
						class="p-1 w-9 h-9"
						icon="ic:round-home"
					/>
				</Link>
			</div>
			<div v-if="user">
				<Link
					class="flex items-center gap-3 hover:text-accent cursor-pointer"
					href="/oauth/logout"
				>
					<img
						:src="user.avatar"
						class="w-9 h-9 rounded-full"
						alt="github user avatar"
					>
					<p class="text-lg">
						{{ user.username }}
					</p>
				</Link>
			</div>
			<div v-else>
				<a
					class="flex items-center gap-1 hover:text-accent cursor-pointer"
					href="/oauth/redirect"
				>
					<span class="text-lg">
						Login with
					</span>
					<Icon
						class="w-6 h-6"
						icon="mdi:github"
					/>
				</a>
			</div>
		</div>
		<slot />
	</div>
</template>
