<script setup>
import { Icon } from "@iconify/vue";
import { Link } from "@inertiajs/inertia-vue3";
import { ref } from "vue";

import NavbarItem from "~/components/NavbarItem.vue";
import SidebarItem from "~/components/SidebarItem.vue";

defineEmits([
	"change",
]);

defineProps({
	user: Object,
});

const sidebar = ref(false);
</script>

<template>
	<div class="sticky flex justify-between top-0 z-40 p-3 text-secondary bg-primary">
		<Link href="/">
			<img
				class="w-9 h-9"
				src="/apple-touch-icon.png"
				alt="pleading face emoji"
			>
		</Link>
		<div class="flex items-center">
			<Icon
				class="md:hidden w-9 h-9 hover:text-accent cursor-pointer transition-all"
				:class="{ 'rotate-90': sidebar }"
				:icon="sidebar ? 'ic:round-clear' : 'ic:round-menu'"
				@click="sidebar = !sidebar, $emit('change', sidebar)"
			/>
			<div class="hidden md:flex gap-9 text-lg">
				<NavbarItem
					href="/"
					icon="ic:round-home"
					name="Home"
				/>
				<NavbarItem
					href="/about"
					icon="ic:round-info"
					name="About"
				/>
				<div
					v-if="user"
					class="flex gap-9 mx-auto"
				>
					<div class="flex items-center gap-4">
						<img
							class="w-5 h-5 rounded-full"
							:src="user.avatar"
							alt="github user avatar"
						>
						<p>
							{{ user.username }}
						</p>
					</div>
					<NavbarItem
						href="/oauth/logout"
						icon="ic:round-log-out"
						name="Log out"
					/>
				</div>
				<div v-else>
					<a
						class="flex items-center gap-2 hover:text-accent"
						href="/oauth/redirect"
					>
						<Icon
							class="w-5 h-5"
							icon="ic:round-log-in"
						/>
						<p class="flex gap-1 items-center">
							Log in with
							<Icon
								class="w-5 h-5"
								icon="mdi:github"
							/>
						</p>
					</a>
				</div>
			</div>
		</div>
	</div>
	<div
		class="fixed flex justify-center z-20 top-0 left-0 p-6 pt-30 w-screen h-screen text-secondary transition-all duration-300"
		:class="{ '-translate-x-full': !sidebar }"
	>
		<div class="flex flex-col gap-6 mx-auto text-xl">
			<SidebarItem
				href="/"
				icon="ic:round-home"
				name="Home"
			/>
			<SidebarItem
				href="/about"
				icon="ic:round-info"
				name="About"
			/>
			<div
				v-if="user"
				class="flex flex-col gap-6 mx-auto"
			>
				<div class="flex items-center gap-4">
					<img
						class="w-9 h-9 rounded-full"
						:src="user.avatar"
						alt="github user avatar"
					>
					<p>
						{{ user.username }}
					</p>
				</div>
				<SidebarItem
					href="/oauth/logout"
					icon="ic:round-log-out"
					name="Log out"
				/>
			</div>
			<div v-else>
				<a
					class="flex items-center gap-4 hover:text-accent"
					href="/oauth/redirect"
				>
					<Icon
						class="w-9 h-9"
						icon="ic:round-log-in"
					/>
					<p class="flex gap-1 items-center">
						Log in with
						<Icon
							class="w-6 h-6"
							icon="mdi:github"
						/>
					</p>
				</a>
			</div>
		</div>
	</div>
</template>
