var path = require('path');
var webpack = require('webpack');
var ExtractTextPlugin = require('extract-text-webpack-plugin');
var CleanWebpackPlugin = require('clean-webpack-plugin');

var extractPlugin = new ExtractTextPlugin({
	filename: 'app.css'
});

var sourceMap = '+sourceMap';

module.exports = {
	entry: {
		app: [
			'./public/assets/scripts/app.js',
			'./public/assets/styles/app.scss'
		]
	},
	output: {
		path: path.resolve(__dirname, 'public/assets/dist'),
		filename: 'app.js',
		publicPath: 'public/assets/dist'
	},
	module: {
		rules: [
			{
				test: /\.js$/,
				exclude: [
					'node_modules'
				],
				use: [
					{
						loader: 'babel-loader',
						options: {
							presets: ['es2015']
						}
					}
				]
			},
			{
				test: /\.css$/,
				use: extractPlugin.extract({
					use: [
						`css-loader${sourceMap}`
					]
				})
			},
			{
				test: /\.scss$/,
				use: extractPlugin.extract({
					use: [
						`css-loader?${sourceMap}`,
						`sass-loader?${sourceMap}`
					]
				})
			},
			{
				test: /\.(jpg|png|gif|jpeg|svg|bmp)$/,
				use: [
					{
						loader: 'file-loader',
						options: {
							name: '[name].[ext]',
							outputPath: 'images/',
							publicPath: ''
						}
					}
				]
			},
			{
				test: /\.(ttf|eot|otf|woff|svg|woff2)$/,
				use: [
					{
						loader: 'file-loader',
						options: {
							name: '[name].[ext]',
							outputPath: 'fonts/',
							publicPath: ''
						}
					}
				]
			}
		]
	},
	resolve: {
		modules: [
			'node_modules'
		]
	},
	devtool: 'source-map',
	plugins: [
		new webpack.ProvidePlugin({
			$: 'jquery',
			jQuery:'jquery',
			'window.jQuery': 'jquery',
			Popper: ['popper.js', 'default'],
			ScrollMagic:'scrollmagic',
			owlCarousel:'owl.carousel',
		}),
		extractPlugin,
		new CleanWebpackPlugin(['public/assets/dist'])
	]
}