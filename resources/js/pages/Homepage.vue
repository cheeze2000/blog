<script setup>
import Layout from "~/components/Layout.vue";

defineProps({
	user: Object,
});
</script>

<template>
	<Layout :user="user" />
</template>
