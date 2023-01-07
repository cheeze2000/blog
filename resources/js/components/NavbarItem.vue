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
		class="flex items-center gap-2 hover:text-accent"
		:href="href"
	>
		<Icon
			class="w-5 h-5"
			:icon="icon"
		/>
		{{ name }}
	</a>
</template>
