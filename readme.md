## Webpack4WP

A Wordpress theme with webpack 2.0 built-in.

## How to install/setup

> Assumes you already had your Wordpress site installed and running.

`cd wp-content/themes`

Clone the repository.

`cd webpack4wp`

`npm install`

In the `config/webpack.dev.js` file, replace the `proxy` value with your PHP server url.

To run dev task `npm run dev`. Local: http://localhost:3000.

To run build taks `npm run build`.

If rename the theme folder, update `theme_name` variable in `webpack.common.js` and `src/sass/_variable.scss`.

## Features

- Babel
- Browserify
- SASS/autoprefixer
- Uglify(productin only)

## Package List

- jquery
- bootstrap v4.0.0-alpha.6
- swiper
- tether
- font-awesome