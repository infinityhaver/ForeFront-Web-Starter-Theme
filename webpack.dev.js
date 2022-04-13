const { CleanWebpackPlugin } = require('clean-webpack-plugin');


const commonConfig = {
    plugins: [
		new CleanWebpackPlugin()
	]
}

module.exports = commonConfig;