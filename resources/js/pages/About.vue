<script setup>
import { Head } from "@inertiajs/inertia-vue3";
import { Icon } from "@iconify/vue";

import Layout from "~/components/Layout.vue";

defineProps({
	user: Object,
	url: String,
	imageUrl: String,
});
</script>

<template>
	<Head>
		<title>cheeze2000.net</title>
		<meta
			name="description"
			content="A personal blog where I demystify and share the new things I learned"
		>
		<meta
			name="theme-color"
			content="#ffb129"
		>
		<meta
			property="og:description"
			content="A personal blog where I demystify and share the new things I learned"
		>
		<meta
			property="og:title"
			content="cheeze2000.net"
		>
		<meta
			property="og:type"
			content="website"
		>
		<meta
			property="og:url"
			:content="url"
		>
		<meta
			property="og:image"
			:content="imageUrl"
		>
	</Head>
	<Layout :user="user">
		<div class="flex flex-col gap-6 pt-12">
			<p class="font-inter text-5xl tracking-wide">
				Hej!
			</p>
			<p class="text-xl">
				Welcome to my blog! I am cheeze, a Computer Science student at the National University of Singapore.
				Throughout my course, I specialise in Algorithms and Database Systems.
				Despite the seemingly theoretical specialisations, I have always enjoyed web development as a side hobby.
				This blog is one of the projects that I have developed in my free time.
			</p>
			<p class="text-xl">
				The purpose of this blog is mainly for me to write about what I learned.
				Writing and teaching (an imaginary audience) also help enhance my understanding.
				Doing this also helps greatly with knowledge retention, I heard.
				I hope you had as much fun reading my blog posts as I did writing them.
			</p>
			<p class="text-xl">
				Follow me on
				<a
					class="hover:text-accent underline underline-offset-2"
					href="https://github.com/cheeze2000"
					target="_blank"
				>
					{{ "GitHub" }}
				</a>
				where you can find all my open-source projects like this blog you're reading now.
				I am also a regular
				<a
					class="hover:text-accent underline underline-offset-2"
					href="https://discord.com/users/402027995021443073"
					target="_blank"
				>
					{{ "Discord" }}
				</a>
				user, feel free to add me for a chat!
				If you find me on other platforms, it is probably not me. Well, maybe it is, but just pretend it is not me.
			</p>
			<p class="text-xl">
				Enjoy your stay!
			</p>
		</div>
	</Layout>
</template>
