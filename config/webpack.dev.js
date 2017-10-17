const merge = require('webpack-merge')
const common = require('../webpack.common')
const BrowserSyncPlugin = require('browser-sync-webpack-plugin')

module.exports = merge(common, {
  devtool: 'inline-source-map',
  plugins: [
    new BrowserSyncPlugin({
      proxy: 'http://localhost:8080',
      port: 3000,
      files: [
        './**/*.php',
        './dist/*'
      ]
    }, {
      reload: false
    })
  ]
})