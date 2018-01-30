const path = require('path')
const webpack = require('webpack')
const CleanWebpackPlugin = require('clean-webpack-plugin')
const ExtractTextPlugin = require('extract-text-webpack-plugin')
const CopyWebpackPlugin = require('copy-webpack-plugin')

const theme_name = 'webpack4wp'
const babelLoader = {
    loader: 'babel-loader',
    options: {
        cacheDirectory: true,
        presets: [
            ["@babel/preset-env", {
                "targets": {
                    "browsers": ["last 2 versions", "safari >= 7"]
                },
                "modules": false
            }]
        ]
    }
};

module.exports = {
    entry: {
        main: [
            path.join(__dirname, "src", 'javascript/index'),
            path.join(__dirname, "src", 'sass/main.scss')
        ],
        vendor: [
            'script-loader!jquery',
            'script-loader!tether',
            'script-loader!bootstrap',
            'script-loader!swiper'
        ]
    },
    resolve: {
        extensions: ['.tsx', '.ts', '.js', 'json']
    },
    output: {
        path: path.join(__dirname, "dist"),
        filename: "[name].bundle.js"
    },
    module: {
        rules: [
            // Typescript
            {
                test: /\.tsx?$/,
                exclude: /node_modules/,
                use: [
                    babelLoader,
                    {
                        loader: 'ts-loader'
                    }
                ]
            },
            // Javascript
            {
                test: /\.js$/,
                exclude: /node_modules/,
                use: [
                    'babelLoader'
                ]
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
                        'css-loader',
                        "postcss-loader",
                        'sass-loader'
                    ]
                })
            },
            // Images
            {
                test: /\.(png|svg|jpg|gif)$/,
                exclude: /node_modules/, // resolve regex conflict with font loader
                use: [{
                    loader: 'file-loader',
                    options: {
                        outputPath: 'images/',
                        publicPath: '../'
                    }
                }]
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
        new CopyWebpackPlugin([{
            from: path.resolve(__dirname, 'assets/images'),
            to: path.resolve(__dirname, 'dist/images')
        }]),
        new webpack.ProvidePlugin({
            $: 'jquery',
            jQuery: 'jquery',
            'window.jQuery': 'jquery',
            tether: 'tether',
            Tether: 'tether',
            'window.Tether': 'tether'
        })
    ]
}