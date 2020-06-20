const { src, dest, series } = require('gulp');
const concatCss = require('gulp-concat-css');
const cleanCSS = require('gulp-clean-css');
const concat = require('gulp-concat');
const minify = require('gulp-minify');

function bootstrap_css() {
    return src('node_modules/bootstrap/dist/css/bootstrap.css')
        .pipe(concatCss("css/app.css"))
        .pipe(cleanCSS({compatibility: 'ie8'}))
        .pipe(dest('public/'));
}

function bootstrap_js() {
    return src(
            'node_modules/jquery/dist/jquery.js', 
            'node_modules/@popperjs/core/dist/umd/popper.js',
            'node_modules/bootstrap/dist/js/bootstrap.js'
        )
        .pipe(concat('js/app.js'))
        .pipe(minify())
        .pipe(dest('public/'));
} 

exports.default = series(bootstrap_css, bootstrap_js);