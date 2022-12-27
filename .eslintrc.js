module.exports = {
	extends: [
		"plugin:vue/vue3-recommended",
	],
	rules: {
		"comma-dangle": ["error", "always-multiline"],
		"eol-last": ["error", "always"],
		"indent": ["error", "tab"],
		"linebreak-style": ["error", "unix"],
		"no-trailing-spaces": "error",
		"quotes": "error",
		"semi": ["error", "always"],
		"vue/html-indent": ["error", "tab"],
		"vue/max-attributes-per-line": ["error", { singleline: 1, multiline: 1 }],
		"vue/multi-word-component-names": "off",
		"vue/require-default-prop": "off",
	},
};
