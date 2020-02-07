const fs = require('fs');
const path = require('path');
const VueLoaderPlugin = require('vue-loader/lib/plugin');
const { CleanWebpackPlugin } = require('clean-webpack-plugin');

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
        },
        ...{
            'app': './resources/BackOffice/app.js'
        }
    }),
    output: {
        filename: 'js/[name].js',
        chunkFilename: 'js/[name].js',
        path: path.resolve(__dirname, './public'),
        publicPath: '/'
    },
    resolve: {
        alias: {
            'vue$': 'vue/dist/vue.runtime.js',
            '@vendor': path.resolve(__dirname, './resources/vendor'),
            '@routes': path.resolve(__dirname, './resources/BackOffice/services/routes'),
            '@services': path.resolve(__dirname, './resources/BackOffice/services/infrastructure'),
            '@components': path.resolve(__dirname, './resources/BackOffice/components'),
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
                            name: 'css/[name].css',
                        }
                    },
                    {
                        loader: 'extract-loader',
                    },
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
                            "@babel/plugin-syntax-dynamic-import"
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
        new CleanWebpackPlugin({
            cleanOnceBeforeBuildPatterns: [
                '!*',
                'css',
                'js'
            ]
        }),
        new VueLoaderPlugin(),
    ]
};