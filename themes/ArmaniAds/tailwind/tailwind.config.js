// Set the Preflight flag based on the build target.
const includePreflight = 'editor' === process.env._TW_TARGET ? false : true;

module.exports = {
	presets: [
		// Manage Tailwind Typography's configuration in a separate file.
		require('./tailwind-typography.config.js'),
	],
	content: [
		// Ensure changes to PHP files trigger a rebuild.
		'./theme/**/*.php',
		'../../mu-plugins/**/*.php',
		'./javascript/*.js'
	],
	theme: {
		// Extend the default Tailwind theme.
		extend: {
			colors: {
				primary: '#21409a',
				secondary: '#d2af74',
				primaryMask : '#1026c92b',
				title : '#1567c7'
			},
			container: {
				center: true, // Optional: Centers the container
				screens: {
					sm: '100%', // Full width for small screens
					md: '768px', // Default medium max-width
					lg: '1024px', // Default large max-width
					xl: '1300px', // Default extra-large max-width
				},
			},
		},
	},
	corePlugins: {
		// Disable Preflight base styles in builds targeting the editor.
		preflight: includePreflight,
	},
	plugins: [
		// Add Tailwind Typography (via _tw fork).
		require('@_tw/typography'),

		// Extract colors and widths from `theme.json`.
		require('@_tw/themejson'),

		// Uncomment below to add additional first-party Tailwind plugins.
		// require('@tailwindcss/forms'),
		// require('@tailwindcss/aspect-ratio'),
		// require('@tailwindcss/container-queries'),
	],
};
