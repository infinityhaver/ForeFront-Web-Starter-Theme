const { merge } = require('webpack-merge');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const path = require("path");
const DEVELOPMENT = 'development';
const PRODUCTION = 'production';
const PRE_COMPILE = 'pre_compile';
const dev = require('./webpack.dev');
const preCompile = require('./webpack.preCompile');
const build = require('./webpack.prod');

const { NODE_ENV } = process.env;

const baseConfig = {
	entry: './src/js/entry.js',
	output: {
		path: path.join(__dirname, 'build'),
		filename: 'bundle.js'
	},
    module: {
        rules: [
			{ 
				test: /\.js$/, 
				exclude: /(node_modules|bower_components)\/(?!(retinajs)\/).*/,
				use: [{
					loader: 'babel-loader',
					options: {
						presets: ['@babel/preset-env']
					},
				}]
			},

			{ 
				test: /\.scss$/,
				use: [MiniCssExtractPlugin.loader, 'css-loader', 'postcss-loader', 'resolve-url-loader',
					{
						loader: "sass-loader",
						options: {
							sourceMap: true
						}
					}
				] 
			},

			{ 
				test: /\.woff(2)?(\?v=[0-9]\.[0-9]\.[0-9])?$/, 
				type: 'asset/resource'
			},
			{ 
				test: /\.(ttf|eot|svg|gif|png)(\?v=[0-9]\.[0-9]\.[0-9])?$/, 
				type: 'asset/resource'
			},
			{
				test: /\.css$/,
				use: [MiniCssExtractPlugin.loader, "css-loader"]
			}
		]
    },
    plugins: [
		new MiniCssExtractPlugin({
			filename: 'bundle.css'
		})
    ]
}

switch (NODE_ENV) {
	case DEVELOPMENT:
		module.exports = merge(baseConfig, dev);
	break

	case PRODUCTION:
		module.exports = merge(baseConfig, build);
	break

	case PRE_COMPILE:
		module.exports = merge(baseConfig, preCompile);
	break

	default: 
		module.exports = merge(baseConfig, dev);
	break
}