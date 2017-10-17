const path = require('path')
const webpack = require('webpack')
const CleanWebpackPlugin = require('clean-webpack-plugin')

let theme_name = 'webpack4wp'

module.exports = {
  entry: {
    main: path.join(__dirname, "src", 'app'),
    vendor: [
      'jquery',
      'swiper',
      'tether',
      'bootstrap'
    ]
  },
  output: {
    path: path.join(__dirname, "dist"),
    filename: "[name].bundle.js"
  },
  module: {
    rules: [{
        test: /\.js$/,
        use: {
          loader: 'babel-loader',
          options: {
            presets: [
              ['env', {
                modules: false
              }]
            ]
          }
        }
      },
      {
        test: /\.css$/,
        use: [
          'style-loader',
          'css-loader'
        ]
      },
      {
        test: /\.scss$/,
        use: [
          'style-loader',
          {
            loader: 'css-loader',
            options: {
              importLoaders: 1
            }
          },
          'postcss-loader',
          'sass-loader'
        ]
      },
      {
        test: /\.(png|svg|jpg|gif)$/,
        use: [
          'file-loader'
        ]
      },
      {
        test: /.(ttf|otf|eot|svg|woff(2)?)(\?[a-z0-9]+)?$/,
        use: [{
          loader: 'file-loader',
          options: {
            name: '[name].[ext]',
            outputPath: 'fonts/', // where the fonts will go
            publicPath: `/wp-content/themes/${theme_name}/dist/` // override the default path
          }
        }]
      }
    ]
  },
  plugins: [
    new CleanWebpackPlugin('./dist'),
    new webpack.optimize.CommonsChunkPlugin({
      name: 'vendor',
      filename: 'vendor.js'
    }),
    new webpack.optimize.CommonsChunkPlugin({
      names: 'runtime',
      filename: 'runtime.js'
    }),
    new webpack.ProvidePlugin({
      $: 'jquery',
      jQuery: 'jquery',
      'window.jQuery': 'jquery',
      'Tether': 'tether'
    })
  ]
}