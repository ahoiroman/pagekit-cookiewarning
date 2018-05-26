const CopyWebpackPlugin = require ('copy-webpack-plugin');
const path = require ('path');

module.exports = [
	{
		entry: {
			"cookiewarning-settings": "./app/components/cookiewarning-settings.vue"
		},
		output: {
			filename: "./app/bundle/[name].js"
		},
		plugins: [
			new CopyWebpackPlugin ([
				{
					from: './node_modules/cookieconsent/build',
					to: './app/assets/cookieconsent'
				}
			], {
				ignore: [
					'*.txt'
				],
				copyUnmodified: true
			})
		],
		module: {
			loaders: [
				{test: /\.vue$/, loader: "vue"},
				{test: /\.js$/, exclude: /node_modules/, loader: "babel-loader"}
			]
		}
	}

];