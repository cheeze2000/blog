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
				"secondary": "#e7e4d5",
				"accent": "#fcca55",
			},
			fontFamily: {
				"inter": ["Inter", "serif"],
				"inc": ["Inconsolata", "monospace"],
				"ssp": ["Source Sans Pro", "sans-serif"],
			},
			spacing: {
				30: "7.5rem",
			},
		},
		screens: {
			"sm": "512px",
			"md": "768px",
			"lg": "1024px",
		},
	},
};
