/** @type {import('tailwindcss').Config} */
module.exports = {
	content: [
		"./resources/views/**/*.blade.php",
		"./resources/js/**/*.vue",
	],
	theme: {
		extend: {
			colors: {
				"primary": "#262626",
				"secondary": "#cbd6a8",
				"accent": "#fcca55",
			},
			fontFamily: {
				"inc": ["Inconsolata", "monospace"],
				"ssp": ["Source Sans Pro", "sans-serif"],
			},
			spacing: {
				30: "7.5rem",
			},
		},
	},
};
