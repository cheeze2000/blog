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
		class="flex items-center gap-2 hover:text-accent"
		:href="href"
	>
		<Icon
			class="w-5 h-5"
			:icon="icon"
		/>
		{{ name }}
	</Link>
</template>
