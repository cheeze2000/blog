<script setup>
import { Icon } from "@iconify/vue";
</script>

<template>
	<div class="relative flex flex-col row-span-2 text-secondary rounded-lg border-4 border-secondary">
		<div class="h-2/5 bg-secondary" />
		<div class="absolute left-1/2 top-2/5 mx-auto w-36 h-36 -translate-x-1/2 -translate-y-1/2">
			<img
				alt="hehe cat"
				class="rounded-full"
				src="~/assets/img/hehe-cat.png"
			/>
		</div>
		<div class="flex flex-col grow justify-evenly pt-18 text-xl text-secondary">
			<div class="flex justify-evenly font-lato">
				<div class="flex flex-col py-2 items-center hover:text-accent cursor-pointer">
					<Icon class="w-9 h-9" icon="mdi:github" />
					<span>cheeze2000</span>
				</div>
				<div class="flex flex-col py-2 items-center hover:text-accent cursor-pointer">
					<Icon class="w-9 h-9" icon="mdi:discord" />
					<span>cheeze#2000</span>
				</div>
			</div>
		</div>
		<div class="flex gap-1 justify-center py-2 border-t-4 border-t-secondary">
			<Icon class="w-7 h-7" icon="logos:nuxt-icon" />
			<Icon class="w-7 h-7 text-secondary" icon="ic:round-plus" />
			<Icon class="w-7 h-7" icon="logos:tailwindcss-icon" />
			<Icon class="w-7 h-7 text-secondary" icon="ic:round-equals" />
			<Icon class="w-7 h-7 text-red-400 hover:scale-[1.08]" icon="ph:heart-straight-fill" />
		</div>
	</div>
</template>
