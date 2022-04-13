const CssMinimizerPlugin = require('css-minimizer-webpack-plugin');
const CopyWebpackPlugin = require('copy-webpack-plugin');
const path = require("path");

const buildConfig = {
    plugins: [
        new CopyWebpackPlugin({
            patterns: [
                { from: path.join(__dirname, 'build'),
                    to: path.join(__dirname, 'dist/build/')},
        
                { from: path.join(__dirname, '**/*.php'),
                    to: path.join(__dirname, 'dist')},
        
                { from: path.join(__dirname, 'acf-json'),
                    to: path.join(__dirname, 'dist/acf-json')},
                                
                { from: path.join(__dirname, 'style.css'),
                    to: path.join(__dirname, 'dist')},
        
                { from: path.join(__dirname, 'webpack.config.js'),
                    to: path.join(__dirname, 'dist/webpack.config.js')},
        
                { from: path.join(__dirname, 'package.json'),
                    to: path.join(__dirname, 'dist/package.json')},
        
                { from: path.join(__dirname, 'README.md'),
                    to: path.join(__dirname, 'dist/README.md')},
        
                { from: path.join(__dirname, 'screenshot.png'),
                    to: path.join(__dirname, 'dist/screenshot.png')},
        
                { from: path.join(__dirname, 'postcss.config.js'),
                    to: path.join(__dirname, 'dist/postcss.config.js')}
            ]
        }
        ),
    ],
    optimization: {
        minimize: true,
        minimizer: [
            `...`,
            new CssMinimizerPlugin()
        ]
    }
}

module.exports = buildConfig;