<script setup>
const message = await $fetch("/api/hello");
</script>

<template>
	<div class="flex justify-center items-center h-screen">
		<h1 class="text-3xl text-green-700">
			{{ message }}
		</h1>
	</div>
</template>
