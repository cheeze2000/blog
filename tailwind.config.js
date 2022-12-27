/** @type {import('tailwindcss').Config} */
module.exports = {
	content: [
		"./resources/views/**/*.blade.php",
		"./resources/js/**/*.vue",
	],
	theme: {
		extend: {
			colors: {
				"primary": "#3b5249",
				"secondary": "#e0e6d3",
				"accent": "#f5c964",
			},
			fontFamily: {
				"inc": ["Inconsolata", "monospace"],
				"ssp": ["Source Sans Pro", "sans-serif"],
			},
		},
	},
};
