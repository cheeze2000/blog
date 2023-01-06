<script setup>
import { Icon } from "@iconify/vue";

const introduction = `
Welcome to my blog! 👋
I hope you find something useful or interesting here. Thanks for visiting!
`;
</script>

<template>
	<div class="flex flex-col items-center gap-6">
		<img
			class="w-30 h-30 rounded-full"
			src="~~/img/cat.webp"
			alt="cat avatar"
		>
		<p class="text-lg text-center whitespace-pre-wrap">
			{{ introduction.trim() }}
		</p>
		<div class="flex flex-col gap-2 mx-auto text-xl">
			<a
				class="flex gap-3 items-center"
				href="https://github.com/cheeze2000"
				target="_blank"
			>
				<Icon
					class="w-8 h-8"
					icon="mdi:github"
				/>
				<p class="hover:text-accent">
					cheeze2000
				</p>
			</a>
			<a
				class="flex gap-3 items-center"
				href="https://fosstodon.org/@cheeze2000"
				target="_blank"
			>
				<Icon
					class="w-8 h-8"
					icon="mdi:mastodon"
				/>
				<p class="hover:text-accent">
					cheeze2000
				</p>
			</a>
			<a
				class="flex gap-3 items-center"
				href="https://discord.com/users/402027995021443073"
				target="_blank"
			>
				<Icon
					class="w-8 h-8"
					icon="mdi:discord"
				/>
				<p class="hover:text-accent">
					cheeze#2000
				</p>
			</a>
		</div>
	</div>
</template>
