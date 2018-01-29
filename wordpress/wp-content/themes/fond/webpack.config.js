const path = require('path');
const webpack = require('webpack');
var BrowserSyncPlugin = require('browser-sync-webpack-plugin');
var HtmlWebpackPlugin = require('html-webpack-plugin');
var HtmlWebpackHarddiskPlugin = require('html-webpack-harddisk-plugin');

var isProd = process.env.NODE_ENV === 'production';
var publicPath = '/wp-content/themes/fond/dist';

function getPlugins() {
	var plugins = [
		new webpack.LoaderOptionsPlugin({
      options: {
        eslint: {
          failOnWarning: false,
					failOnError: true
        }
      }
    }),
    new HtmlWebpackPlugin({
			filename: '../developmentBundle.html',
			template: './src/bundleHash.html',
      hash: true,
      alwaysWriteToDisk: true
		}),
    new webpack.optimize.CommonsChunkPlugin({
      name: 'vendor',
      minChunks: function (module) {
       // this assumes your vendor imports exist in the node_modules directory
       return module.context && module.context.indexOf('node_modules') !== -1;
      }
    }),
		new webpack.NamedModulesPlugin(),
    new webpack.optimize.ModuleConcatenationPlugin()
	];

	if (!isProd) {
		plugins.push(new BrowserSyncPlugin({
      // js and css served from http://localhost:3000/ during development, 
      // server proxied onto new port
      host: 'localhost',
      port: 3000,
      files: ['*.php', './template-parts/*.php'],
      proxy: 'http://localhost/',
    }));

    plugins.push(new HtmlWebpackHarddiskPlugin());
	}

	return plugins;
}



module.exports = {
  entry: {
		app: './src/index.js'
  },
  output: {
		path: path.resolve(__dirname, 'dist'),
    filename: '[name].bundle.js', 
    publicPath: publicPath,
  },
  watch: isProd ? false : true,
	devtool: 'inline-source-map',
	plugins: getPlugins(),
	module: {
		rules: [
			{
				enforce: 'pre',
				test: /\.js?$/,
				exclude: /node_modules/,
				loader: 'eslint-loader',
				options: {
					// default value
					formatter: require('eslint/lib/formatters/stylish'),
				}
			},
			{
				test: /\.(jpe?g|png|gif)$/,   //to support eg. background-image property 
				use: [
					{
						loader: 'file-loader',
						options: {
							name:'[name].[ext]',
							outputPath:'images/',
							publicPath: './wp-content/themes/fond/dist/'
							//the images will be emmited to dist/images/ folder 
							//the images will be put in the DOM <style> tag as eg. background: url(images/image.png); 
						}
					},
					'image-webpack-loader' 
				]
			},
			{
				test: /\.(woff(2)?|ttf|eot|svg)(\?v=[0-9]\.[0-9]\.[0-9])?$/,    //to support @font-face rule 
				use: [
					{
						loader: 'url-loader',
						options: {
							limit:'10000',
							name:'[name].[ext]',
							outputPath:'fonts/'
							//the fonts will be emmited to public/assets/fonts/ folder 
							//the fonts will be put in the DOM <style> tag as eg. @font-face{ src:url(assets/fonts/font.ttf); }  
						}
					}  
				]
			},
			{
				test: /\.scss$/,
				use: ['style-loader', 'css-loader', 'postcss-loader', 'sass-loader']
			},
			{ 
				test: /\.js$/, 
				exclude: /node_modules/, 
				use: ['babel-loader']
			}
		]
	}
};