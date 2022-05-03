<script setup>
import { Icon } from "@iconify/vue";
</script>

<template>
	<div class="relative flex flex-col row-span-2 text-secondary rounded-lg border-4 border-secondary">
		<div class="h-1/3 bg-secondary" />
		<div class="absolute left-1/2 top-1/3 mx-auto w-36 h-36 -translate-x-1/2 -translate-y-1/2">
			<img
				alt="hehe cat"
				class="rounded-full"
				src="~/assets/img/hehe-cat.png"
			/>
		</div>
		<div class="flex flex-col grow justify-evenly pt-18 text-xl text-secondary">
			<div class="flex gap-3 pl-6 py-2 items-center hover:text-accent hover:bg-secondary cursor-pointer">
				<Icon class="w-9 h-9" icon="mdi:github" />
				<span>cheeze2000</span>
			</div>
			<div class="flex gap-3 pl-6 py-2 items-center hover:text-accent hover:bg-secondary cursor-pointer">
				<Icon class="w-9 h-9" icon="mdi:discord" />
				<span>cheeze#2000</span>
			</div>
			<div class="flex gap-3 pl-6 py-2 items-center hover:text-accent hover:bg-secondary cursor-pointer">
				<Icon class="w-9 h-9" icon="mdi:email" />
				<span>me@cheeze2000.net</span>
			</div>
		</div>
		<div class="flex gap-1 justify-center py-2 border-t-4 border-t-secondary">
			<Icon class="w-6 h-6" icon="logos:nuxt-icon" />
			<Icon class="w-6 h-6 text-secondary" icon="ic:round-plus" />
			<Icon class="w-6 h-6" icon="logos:tailwindcss-icon" />
			<Icon class="w-6 h-6 text-secondary" icon="ic:round-equals" />
			<Icon class="w-6 h-6 text-red-400" icon="ph:heart-straight-fill" />
		</div>
	</div>
</template>
