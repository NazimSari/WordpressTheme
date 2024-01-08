const path = require("path");
const MiniCssExtractPlugin = require("mini-css-extract-plugin");
const { CleanWebpackPlugin } = require("clean-webpack-plugin");
const CssMinimizerPlugin = require("css-minimizer-webpack-plugin");
const cssnano = require("cssnano");
const TerserPlugin = require("terser-webpack-plugin");
const DependencyExtractionWebpackPlugin = require("@wordpress/dependency-extraction-webpack-plugin");

const JS_DIR = path.resolve(__dirname, "src/js");
const IMG_DIR = path.resolve(__dirname, "src/img");
const BUILD_DIR = path.resolve(__dirname, "build");

const entry = {
  main: JS_DIR + "/main.js",
  single: JS_DIR + "/single.js",
  editor: JS_DIR + "/editor.js",
  blocks: JS_DIR + "/blocks.js",
};
const output = {
  path: BUILD_DIR,
  filename: "js/[name].js",
};

const rules = [
  {
    test: /\.js$/,
    include: [JS_DIR],
    exclude: /node_modules/,
    use: "babel-loader",
  },
  {
    test: /\.scss$/,
    exclude: /node_modules/,
    use: [MiniCssExtractPlugin.loader, "css-loader", "sass-loader"],
  },
  {
    test: /\.(png|jpg|svg|jpeg|gif|ico)$/,
    use: [
      {
        loader: "file-loader",
        options: {
          name: "[path][name].[ext]",
          publicPath: "production" === process.env.NODE_ENV ? "../" : "../../",
        },
      },
    ],
  },
];

const plugins = (env, argv) => {
  if (!argv || !argv.mode) {
    throw new Error(
      'Webpack "mode" is undefined. Check your webpack.config.js file.'
    );
  }

  const isProduction = argv.mode === "production";

  return [
    new CleanWebpackPlugin({
      cleanStaleWebpackAssets: isProduction,
    }),
    new MiniCssExtractPlugin({
      filename: "css/[name].css",
      chunkFilename: "css/[id].css",
    }),
    new DependencyExtractionWebpackPlugin({
      injectPolyfill: true,
      combineAssets: true,
    }),

    // Diğer pluginler buraya eklenmeli
  ];
};

module.exports = (env, argv) => ({
  entry: entry,
  output: output,
  devtool: "source-map",
  module: {
    rules: rules,
  },
  optimization: {
    minimize: true,
    minimizer: [
      new CssMinimizerPlugin({
        minimizerOptions: {
          processorOptions: {
            preset: [
              "default",
              {
                discardComments: { removeAll: true },
              },
            ],
          },
        },
      }),
      new TerserPlugin(),
    ],
  },
  plugins: plugins(env, argv),
  externals: {
    jquery: "jQuery",
  },
});
