/**
 *
 *  OUR WEDDING
 *  Copyright 2015 Bruce Bentley. All rights reserved.
 *
 */

'use strict';

// Include Gulp & Tools We'll Use
var gulp = require('gulp');
var $ = require('gulp-load-plugins')();
var del = require('del');
var runSequence = require('run-sequence');
var browserSync = require('browser-sync');
var pagespeed = require('psi');
var reload = browserSync.reload;

// What Browsers We're Accounting For
var AUTOPREFIXER_BROWSERS = [
    'ie >= 10',
    'ie_mob >= 10',
    'ff >= 30',
    'chrome >= 34',
    'safari >= 7',
    'opera >= 23',
    'ios >= 7',
    'android >= 4.4',
    'bb >= 10'
];

// STYLES
gulp.task('styles', function () {
    return gulp.src('src/styles/style.scss')
        .pipe($.plumber())
        .pipe($.sass({
            style: 'expanded',
            precision: 10,
            onError: console.error.bind(console, 'Sass Error:')
        }))
        .pipe($.autoprefixer({browsers: AUTOPREFIXER_BROWSERS}))
        .pipe(gulp.dest('.tmp'))
        // Concatenate And Minify Styles
        .pipe($.if('*.css', $.csso()))
        .pipe(gulp.dest('dist'))
        .pipe($.size({title: 'styles'}));
});

// SCRIPTS
gulp.task('scripts', function () {
    return gulp.src('src/scripts/**/*.js')
        .pipe(reload({stream: true, once: true}))
        .pipe($.jshint())
        .pipe($.jshint.reporter('jshint-stylish'))
        .pipe($.if(!browserSync.active, $.jshint.reporter('fail')))
        .pipe($.size({title: 'scripts'}));
});

// HTML
gulp.task('html', ['styles'], function () {
    var lazypipe = require('lazypipe');
    var cssChannel = lazypipe()
        .pipe($.csso)
        .pipe($.replace, 'bower_components/bootstrap-sass-official/assets/fonts/bootstrap','fonts');
    var assets = $.useref.assets({searchPath: '{./,.tmp,src}'});

    return gulp.src('src/*.html')
        .pipe(assets)
        .pipe($.if('*.js', $.uglify()))
        .pipe($.if('*.css', cssChannel()))
        .pipe(assets.restore())
        .pipe($.useref())
        .pipe($.if('*.html', $.minifyHtml({conditionals: true, loose: true})))
        .pipe(gulp.dest('dist'))
        .pipe($.size({title: 'html'}));
});

// IMAGES
gulp.task('images', function () {
    return gulp.src('src/images/**/*')
        .pipe($.cache($.imagemin({
                optimizationLevel: 3,
                progressive: true,
                interlaced: true
        })))
        .pipe(gulp.dest('dist/images'))
        .pipe($.size({title: 'images'}));
});

// FONTS
gulp.task('fonts', function () {
    return gulp.src(['src/fonts/**'])
        .pipe($.filter('**/*.{eot,svg,ttf,woff}'))
        .pipe(gulp.dest('dist/fonts'))
        .pipe($.size({title: 'fonts'}));
});

// EXTRAS - (Copy all the misc. files from `/src` to `/dist`)
gulp.task('extras', function () {
    return gulp.src([
        'src/*.*',
        '!src/*.html',
        'node_modules/apache-server-configs/dist/.htaccess'
    ], {
        dot: true
    }).pipe(gulp.dest('dist'))
    .pipe($.size({title: 'extras'}));
});

// CLEAN
gulp.task('clean', del.bind(null, ['.tmp', 'dist/*', '!dist/.git'], {dot: true}));

// INJECT - (Injects assets from the `bower_components` directory)
gulp.task('wiredep', function () {
    var wiredep = require('wiredep').stream;

    gulp.src('src/styles/*.scss')
        .pipe(wiredep())
        .pipe(gulp.dest('src/styles'));

    gulp.src('src/*.html')
        .pipe(wiredep({exclude: ['bootstrap-sass-official']}))
        .pipe(gulp.dest('src'));
});

// SERVE - (Builds & serves the output from the `src` & `.tmp` directories)
gulp.task('serve', ['styles'], function () {
    browserSync({
        notify: false,
        port: 8888,
        logPrefix: 'WEDDING',
        // https: true,
        server: {
            baseDir: ['./', '.tmp', 'src'],
            routes: {
                '/bower_components': 'bower_components'
            }
        }
    });

    // Watch for changes in these directories & reload the browser
    gulp.watch(['src/**/*.html'], reload);
    gulp.watch(['src/styles/**/*.{scss,css}'], ['styles', reload]);
    gulp.watch(['src/scripts/**/*.js'], ['scripts']);
    gulp.watch(['src/images/**/*'], reload);
    gulp.watch('bower.json', ['wiredep']);
});

// BUILD - (Builds the production files, and puts them in the `dist` directory)
gulp.task('default', ['clean'], function (cb) {
    runSequence('styles', ['scripts', 'html', 'images', 'fonts', 'extras'], cb);
});

// PAGESPEED
gulp.task('pagespeed', pagespeed.bind(null, {
    // By default, we use the PageSpeed Insights
    // free (no API key) tier. You can use a Google
    // Developer API key if you have one. See
    // http://goo.gl/RkN0vE for info key: 'YOUR_API_KEY'
    url: 'http://www.bruceandmeghan.com',
    strategy: 'mobile'
}));