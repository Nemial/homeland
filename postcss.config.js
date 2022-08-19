const autoprefixer = require('autoprefixer');
const cssnano = require('cssnano');
const purgecss = require('@fullhuman/postcss-purgecss');

module.exports = {
    plugins: [
        autoprefixer,
        cssnano({preset: 'default'}),
        purgecss({
            content: ['./templates/**/*.php', './config/paginator-templates.php'],
            safelist: ['show'],
        }),
    ],
};
