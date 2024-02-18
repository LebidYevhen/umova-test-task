'use strict';

const gulp = require('gulp');
const sass = require('gulp-sass')(require('sass'));
const sourcemaps = require('gulp-sourcemaps');
const cleanCSS = require('gulp-clean-css');
const minify = require('gulp-minify');
const gulpCopy = require('gulp-copy');
const through = require('through2');
const del = require('del');
const rename = require("gulp-rename");

const paths = {
    styles: {
        src: ['src/assets/scss/main.scss'],
        dest: 'public/assets/css'
    },
    scripts: {
        src: ['src/assets/js/main.js'],
        dest: 'public/assets/js'
    },
    images: {
        src: 'src/assets/img/**/*.{jpg,jpeg,png,svg,gif}',
        dest: 'public/assets/img'
    },
    fonts: {
        src: 'src/assets/fonts/**/*',
        dest: 'public/assets/fonts'
    },
    dist: {
        dest: 'public/assets'
    }
}

export const styles = () => {
    return gulp.src(paths.styles.src)
        .pipe(sourcemaps.init())
        .pipe(sass().on('error', sass.logError))
        .pipe(cleanCSS({compatibility: 'ie8'}))
        .pipe(sourcemaps.write())
        .pipe(rename(function (path) {
            path.extname = ".min.css";
        }))
        .pipe(gulp.dest(paths.styles.dest))
        .pipe(verify());
}

export const scripts = () => {
    return gulp.src(paths.scripts.src)
        .pipe(minify({
            ext:{
                min: '.min.js'
            },
            noSource: true,
        }))
        .pipe(gulp.dest(paths.scripts.dest))
        .pipe(verify());
}

export const fonts = () => {
    return gulp.src(paths.fonts.src)
        .pipe(gulpCopy('public/', {prefix: 1}))
        .pipe(gulp.dest(paths.images.dest))
        .pipe(verify());
}

export const images = () => {
    return gulp.src(paths.images.src)
        .pipe(gulpCopy('public/', {prefix: 1}))
        .pipe(verify());
}

export const cleanDist = () => {
    return del(paths.dist.dest);
}

export const verify = () => {
    var options = {objectMode: true};
    return through(options, write, end);

    function write(file, enc, cb) {
        console.log('file', file.path);
        cb(null, file);
    }

    function end(cb) {
        console.log('done');
        cb();
    }
}

export const watch = () => {
    gulp.watch(paths.styles.src, styles);
    gulp.watch(paths.scripts.src, scripts);
    gulp.watch(paths.fonts.src, function () {
        return del(paths.fonts.dest)
            .then(function () {
                return fonts();
            });
    });
    gulp.watch(paths.images.src, function () {
        return del(paths.images.dest)
            .then(function () {
                return images();
            });
    });
}

exports.styles = styles;
exports.scripts = scripts;
exports.cleanDist = cleanDist;
exports.build = gulp.series(cleanDist, gulp.parallel(fonts, images, styles, scripts));
exports.watch = watch;