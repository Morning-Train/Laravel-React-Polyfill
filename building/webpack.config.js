const path = require('path');

module.exports = {
    resolve: {
        extensions: ['.js', '.json', '.vue'],
        alias: {}
    },
    module: {
        rules: [
            {
                test: /\.m?js$/,
                use: {
                    loader: 'babel-loader',
                    options: {
                        presets: [
                            "@babel/react"
                        ],
                        plugins: [
                            "@babel/plugin-syntax-dynamic-import",
                            "babel-plugin-webpack-alias",
                            "@babel/plugin-transform-arrow-functions",
                            "@babel/plugin-proposal-export-namespace-from",
                            "@babel/plugin-proposal-export-default-from",
                            ["@babel/plugin-proposal-decorators", { "legacy": true }],
                            ["@babel/plugin-proposal-class-properties", { "loose" : true }],
                            ["@babel/plugin-transform-spread", { "loose" : false }],
                            "@babel/plugin-transform-destructuring",
                            "@babel/plugin-proposal-object-rest-spread",
                            "@babel/plugin-transform-shorthand-properties",
                            "@babel/plugin-transform-parameters",
                            "@babel/plugin-transform-template-literals",
                            "@babel/plugin-transform-classes",
                            "@babel/plugin-proposal-optional-chaining",
                            "@babel/plugin-transform-computed-properties",
                        ]
                    }
                }
            }
        ]
    }
};
