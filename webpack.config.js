const path = require('path');
const webpack = require('webpack');

module.exports = {
    entry: './server.js',
    output: {
        path: path.resolve(__dirname, 'dist'),
        filename: 'bundle.js'
    },
    module: {
        rules: [
            {
                test: /\.js$/,
                exclude: /node_modules/,
                use: {
                    loader: 'babel-loader',
                    options: {
                        presets: ['@babel/preset-env']
                    }
                }
            }
            // Add more rules for CSS, images, etc. if needed
        ]
    },
    resolve: {
        extensions: ['.js']
    },
    resolve: {
        fallback: {
            fs: false,
            path: false,
            os: false,
            zlib: require.resolve('browserify-zlib'),
            stream: require.resolve('stream-browserify'),
            querystring: require.resolve('querystring-es3'),
            crypto: require.resolve('crypto-browserify'),
            buffer: require.resolve('buffer/'),
            util: require.resolve('util/'),
            http: require.resolve('stream-http'),
            assert: require.resolve('assert/'),
            net: require.resolve('net-browserify'),
            url: require.resolve('url/'),
            vm: require.resolve('vm-browserify'),
            timers: require.resolve('timers-browserify')
        }
    },
    plugins: [
        new webpack.DefinePlugin({
            'process.env.NODE_DEBUG': false,
        }),
    ],
};
