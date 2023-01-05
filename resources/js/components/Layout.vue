<script setup>
import { ref } from "vue";

import Header from "~/components/Header.vue";

defineProps({
	user: Object,
});

const sidebar = ref(false);
</script>

<template>
	<div class="container mx-auto max-w-screen-lg min-h-screen">
		<Header
			:user="user"
			@change="v => sidebar = v"
		/>
		<div
			class="p-3"
			:class="{ 'opacity-20 blur': sidebar }"
		>
			<slot />
		</div>
	</div>
</template>
