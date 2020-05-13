const fs = require('fs');
const path = require('path');
const webpack = require('webpack');
const VueLoaderPlugin = require('vue-loader/lib/plugin');
const { CleanWebpackPlugin } = require('clean-webpack-plugin');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');

const ENV = fs.readFileSync('./.env', 'utf8').split('\n');

const getJSEntries = () => (
    fs.readdirSync('./resources/js/Site/')
        .filter(
            file => file.match(/.*\.js$/)
        )
        .map(file => {
            return {
                name: file.substring(0, file.length - 3),
                path: './resources/js/Site/' + file
            }
        })
        .reduce(
            ( entry, file ) => {
                entry[file.name] = file.path;
                return entry;
            }, {}
        )
);

module.exports = {
    mode: "development",
    entry: ({
        ...getJSEntries(),
        ...{
            'style': './resources/sass/style.sass'
        }
    }),
    output: {
        publicPath: '/',
        filename: 'js/site/[name].js',
        chunkFilename: 'js/site/[name].js',
        path: path.resolve(__dirname, './public')
    },
    resolve: {
        alias: {
            '@vendor': path.resolve(__dirname, './resources/vendor'),
            '@js': path.resolve(__dirname, './resources/js/Site'),
            '@endpoints': path.resolve(__dirname, './resources/BackOffice/services/endpoints'),
            '@services': path.resolve(__dirname, './resources/BackOffice/services/infrastructure'),
        },
        extensions: ["*", ".js", ".vue", ".json"]
    },
    devtool: "cheap-module-eval-source-map",
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
                            name: 'css/site/[name].css',
                        }
                    },
                    {
                        loader: 'extract-loader',
                    },
                    MiniCssExtractPlugin.loader,
                    {
                        loader: 'css-loader',
                        options: {
                            sourceMap: true
                        }
                    },
                    {
                        loader: 'sass-loader',
                        options: {
                            sourceMap: true,
                        },
                    }
                ]
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
            'API_DOMAIN': ENV.find(item => item.includes('LOCAL_API_DOMAIN')).replace(/LOCAL_API_DOMAIN\s*=/, ''),
        }),
        new CleanWebpackPlugin({
            cleanOnceBeforeBuildPatterns: [
                '!*',
                'js/site',
                'css/site'
            ]
        }),
        new MiniCssExtractPlugin({
            filename: 'css/[name].css',
        }),
    ]
};