const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const RemovePlugin = require('remove-files-webpack-plugin');

var path = require('path');

const jsPath= './assets/js/';
const sassPath = './assets/scss/';
const outputPath = './assets/dist/';
const entryPoints = {
  'js/scripts.js': jsPath + 'scripts.js',
  'css/style': sassPath + 'style.scss',
  'css/admin': sassPath + 'admin.scss',
  'css/blocksAcf': sassPath + 'blocks-acf.scss',
  //'js/blocks/ctaBlock.js': jsPath + 'blocks/va-cta-block.js',
};

module.exports = {
  entry: entryPoints,
  output: {
    path: path.resolve(__dirname, outputPath),
    filename: ({ chunk: { name } }) => {
      return '[name]'
    },
  },
  plugins: [
    new MiniCssExtractPlugin({
      filename: '[name].css'
    }),
    //new RemovePlugin({
    //    after: {
    //        root: './assets/dist/',
    //        test: [
    //            {
    //                folder: './css',
    //                method: (absoluteItemPath) => {
    //                    return new RegExp(/^((?!\.).)*$/, 'm').test(absoluteItemPath);
    //                }
    //            },
    //        ]
    //    }
    //})
  ],
  devtool: 'source-map',
  resolve: {
    extensions: ['.js', '.css', '.scss'],
  },
  module: {
    rules: [
      {
        test: /\.s?[c]ss$/i,
        use: [
          MiniCssExtractPlugin.loader,
          'css-loader',
          'sass-loader',
        ]
      },
      {
        test: /\.sass$/i,
        use: [
          MiniCssExtractPlugin.loader,
          'css-loader',
          {
            loader: 'sass-loader',
            options: {
              sourceMap: true,
              sassOptions: { indentedSyntax: true }
            }
          }
        ]
      },
      {
        test: /\.(woff|woff2|svg|gif|png|jpg|webp|mp4)$/,
        use: {
          loader: 'url-loader',
        },
      },
    ]
  },
};
