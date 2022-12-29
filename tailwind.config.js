/** @type {import('tailwindcss').Config} */
module.exports = {
	content: [
		"./resources/views/**/*.blade.php",
		"./resources/js/**/*.vue",
	],
	theme: {
		extend: {
			colors: {
				"primary": "#38433d",
				"secondary": "#e8ecdf",
				"accent": "#f1cd5f",
			},
			fontFamily: {
				"inc": ["Inconsolata", "monospace"],
				"ssp": ["Source Sans Pro", "sans-serif"],
			},
		},
	},
};
