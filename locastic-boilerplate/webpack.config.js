const path = require('path');
const env = process.env.NODE_ENV;

const MiniCssExtractPlugin = require("mini-css-extract-plugin");
const HtmlWebpackPlugin = require('html-webpack-plugin');
const CopyWebpackPlugin = require('copy-webpack-plugin');
var ImageminPlugin = require('imagemin-webpack-plugin').default;

module.exports = {
  entry: { 
    index: './scripts/index.js',
  },
  output: {
    path: path.resolve(__dirname, 'dist'),
    filename: (env == "development") ? '[name].js' : '[name].[contenthash].js'
  },
  module: {
    rules: [
      {
        test: /\.js$/,
        exclude: /node_modules/,
        use: {
          loader: "babel-loader"
        }
      },
      {
        test: /\.(png|jpg|svg|webp)$/,
        loader: "file-loader",
        options: {
          name: '/wp-content/themes/locastic/dist/assets/images/[name].[ext]',
          emitFile: false
        }
      },
      {
        test: /\.(woff|woff2|eot)$/,
        loader: "file-loader",
        options: {
          name: 'dist/assets/fonts/[name].[ext]',
          emitFile: false
        }
      },
      {
        test: /\.sss$/,
        use:  [
          {loader: MiniCssExtractPlugin.loader, options: {sourceMap: true}},
          {loader: 'css-loader', options: { importLoaders: 1, sourceMap: true }},
          {loader: 'postcss-loader'},
        ]
      }
    ]
  },
  plugins: [
    new MiniCssExtractPlugin({
      filename: (env == "development") ? 'style.css' : 'style.[contenthash].css'
    }),
    new CopyWebpackPlugin([
      {
        from: './assets/images/',
        to: './assets/images/'
      },
      {
        from: './assets/fonts/',
        to: './assets/fonts/'
      },
      {
        from: './assets/favicon/',
        to: './assets/favicon/'
      },
      {
        from: './assets/videos/',
        to: './assets/videos/'
      },
  ]),
    new ImageminPlugin({ test: /\.(jpe?g|png|gif|svg)$/i, svgo: null})
  ],
  optimization: {
      splitChunks: {
        chunks: 'all'
      }
    }
};
