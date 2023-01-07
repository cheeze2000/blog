<script setup>
import { Icon } from "@iconify/vue";

defineProps({
	href: String,
	icon: String,
	name: String,
});
</script>

<template>
	<a
		class="flex items-center gap-4 hover:text-accent"
		:href="href"
	>
		<Icon
			class="w-9 h-9"
			:icon="icon"
		/>
		{{ name }}
	</a>
</template>
