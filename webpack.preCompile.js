const { CleanWebpackPlugin } = require('clean-webpack-plugin');
const WebpackShellPlugin = require('webpack-shell-plugin-next');

const preCompileConfig = {
	mode: 'production',
    plugins: [
		new WebpackShellPlugin({
			onBuildEnd: {
				scripts: ['npm run _build']
			}
		}),
		new CleanWebpackPlugin()
	]
}

module.exports = preCompileConfig;