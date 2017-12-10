const path = require('path')
const webpack = require('webpack')
const CleanWebpackPlugin = require('clean-webpack-plugin')
const ExtractTextPlugin = require('extract-text-webpack-plugin')

let theme_name = 'webpack4wp'

module.exports = {
  entry: {
    main: [
      path.join(__dirname, "src", 'app'),
      path.join(__dirname, "src", 'sass/main.scss')
    ],
    vendor: [
      'script-loader!jquery',
      'script-loader!tether',
      'script-loader!bootstrap',
      'script-loader!swiper'
    ]
  },
  output: {
    path: path.join(__dirname, "dist"),
    filename: "[name].bundle.js"
  },
  module: {
    rules: [
      // Javascript
      {
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
      // CSS
      {
        test: /\.css$/,
        use: [
          'style-loader',
          'css-loader'
        ]
      },
      // SASS
      {
        test: /\.scss$/,
        use: ExtractTextPlugin.extract({
          fallback: 'style-loader',
          use: [
            {
              loader: 'css-loader',
              options: {
                importLoaders: 1
              }
            },
            'postcss-loader',
            'sass-loader'
          ]
        })
      },
      // Images
      {
        test: /\.(png|svg|jpg|gif)$/,
        exclude: /node_modules/, // resolve regex conflict with font loader
        use: [
          'file-loader'
        ]
      },
      // Font Awesome
      {
        test: /.(ttf|otf|eot|svg|woff(2)?)(\?[a-z0-9]+)?$/,
        use: [{
          loader: 'file-loader',
          options: {
            outputPath: 'fonts/',
            publicPath: '../'
          }
        }]
      }
    ]
  },
  plugins: [
    new CleanWebpackPlugin('./dist'),
    new webpack.optimize.CommonsChunkPlugin({
      name: 'vendor',
      filename: 'vendor.bundle.js'
    }),
    new webpack.optimize.CommonsChunkPlugin({
      names: 'runtime',
      filename: 'runtime.bundle.js'
    }),
    new ExtractTextPlugin('css/[name].css'),
    new webpack.ProvidePlugin({
      $: 'jquery',
      jQuery: 'jquery',
      'window.jQuery': 'jquery',
      tether: 'tether',
      Tether: 'tether',
      'window.Tether': 'tether',
    })
  ]
}