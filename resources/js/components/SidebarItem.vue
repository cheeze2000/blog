<script setup>
import { Icon } from "@iconify/vue";
import { Link } from "@inertiajs/inertia-vue3";

defineProps({
	href: String,
	icon: String,
	name: String,
});
</script>

<template>
	<Link
		class="flex items-center gap-4 hover:text-accent"
		:href="href"
	>
		<Icon
			class="w-9 h-9"
			:icon="icon"
		/>
		{{ name }}
	</Link>
</template>
