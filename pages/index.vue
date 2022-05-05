<script setup>
</script>

<template>
	<div class="container grid md:grid-cols-2 lg:grid-cols-3 auto-rows-[210px] gap-x-12 gap-y-6 p-6 mx-auto">
		<Card />
		<MiniCard :key="i" v-for="i in 9">
			{{ i }}
		</MiniCard>
	</div>
</template>
