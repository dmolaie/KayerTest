const fs = require('fs');
const path = require('path');
const webpack = require('webpack');
const MediaQueryPlugin = require('media-query-plugin');
const VueLoaderPlugin = require('vue-loader/lib/plugin');
const { CleanWebpackPlugin } = require('clean-webpack-plugin');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');

const ENV = fs.readFileSync('./.env', 'utf8').split('\n');

module.exports = {
    mode: "production",
    entry: ({
        'app': './resources/BackOffice/app.js',
        'appStyle': './resources/BackOffice/sass/appStyle.sass'
    }),
    output: {
        publicPath: '/',
        filename: 'js/office/[name].js',
        chunkFilename: 'js/office/[name].js',
        path: path.resolve(__dirname, './public')
    },
    resolve: {
        alias: {
            'vue$': 'vue/dist/vue.runtime.min.js',
            '@vendor': path.resolve(__dirname, './resources/vendor'),
            '@BackOffice': path.resolve(__dirname, './resources/BackOffice'),
            '@views': path.resolve(__dirname, './resources/BackOffice/views'),
            '@routes': path.resolve(__dirname, './resources/BackOffice/services/routes'),
            '@endpoints': path.resolve(__dirname, './resources/BackOffice/services/endpoints'),
            '@components': path.resolve(__dirname, './resources/BackOffice/components'),
            '@services': path.resolve(__dirname, './resources/BackOffice/services/infrastructure'),
        },
        extensions: ["*", ".js", ".vue", ".json"]
    },
    optimization: {
        runtimeChunk: 'single',
        splitChunks: {
            chunks: 'all',
        },
    },
    module: {
        rules: [
            {
                test: /\.s[a|c]ss$/,
                use: [
                    {
                        loader: 'file-loader',
                        options: {
                            name: 'css/office/[name].css',
                        }
                    },
                    {
                        loader: 'extract-loader',
                    },
                    MiniCssExtractPlugin.loader,
                    {
                        loader: 'css-loader',
                        options: {
                            sourceMap: false
                        }
                    },
                    MediaQueryPlugin.loader,
                    {
                        loader: 'postcss-loader',
                        options: {
                            ident: 'postcss',
                            plugins: [
                                require('autoprefixer'),
                            ]
                        }
                    },
                    {
                        loader: 'sass-loader',
                        options: {
                            sourceMap: false,
                        },
                    }
                ]
            },
            {
                test: /\.vue$/,
                loader: 'vue-loader'
            },
            {
                test: /\.js$/,
                exclude: /node_modules/,
                use: {
                    loader: 'babel-loader',
                    options: {
                        presets: [
                            "@babel/preset-env"
                        ],
                        plugins: [
                            "@babel/transform-runtime",
                            "@babel/plugin-transform-spread",
                            "@babel/plugin-syntax-dynamic-import",
                            "@babel/plugin-transform-destructuring",
                            "@babel/plugin-transform-arrow-functions",
                            "@babel/plugin-proposal-optional-chaining",
                            "@babel/plugin-transform-template-literals",
                            "@babel/plugin-proposal-nullish-coalescing-operator",
                            ["@babel/plugin-proposal-private-methods", { "loose": true }],
                            ["@babel/plugin-proposal-class-properties", { "loose": true }]
                        ]
                    }
                }
            },
            {
                test: /\.(png|woff|woff2|eot|ttf|svg)$/,
                loader: 'file-loader',
                options: {
                    name: '[path][name].[ext]',
                },
            }
        ]
    },
    plugins: [
        new webpack.DefinePlugin({
            'API_DOMAIN': ENV.find(item => item.includes('API_DOMAIN')).replace(/API_DOMAIN\s*=/, ''),
        }),
        new CleanWebpackPlugin({
            cleanOnceBeforeBuildPatterns: [
                '!*',
                'js/office',
                'css/office'
            ]
        }),
        new VueLoaderPlugin(),
        new MiniCssExtractPlugin({
            filename: 'css/[name].css',
        }),
    ]
};