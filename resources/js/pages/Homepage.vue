<script setup>
import Layout from "~/components/Layout.vue";
import Posts from "~/components/Posts.vue";

defineProps({
	user: Object,
});
</script>

<template>
	<Layout :user="user">
		<Posts />
	</Layout>
</template>
