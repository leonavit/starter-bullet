import { defineConfig } from 'vite';
import { resolve } from 'path';

export default defineConfig({
	root: resolve(__dirname),
	build: {
		outDir: 'dist',
		emptyOutDir: true,
		rollupOptions: {
			input: resolve(__dirname, 'assets/js/main.js'),
			output: {
				entryFileNames: 'js/main.js',
				assetFileNames: (assetInfo) => {
					if (assetInfo.name?.endsWith('.css')) {
						return 'css/main.css';
					}
					return 'assets/[name][extname]';
				},
			},
		},
	},
});
