/*global $:true*/

/**
 *
 *  OUR WEDDING
 *  Copyright 2015 Bruce Bentley. All rights reserved.
 *
 */

var $           = require('gulp-load-plugins')();
var _           = require('lodash');
var argv        = require('yargs').argv;
var gulp        = require('gulp');
var lazypipe    = require('lazypipe');
var manifest    = require('asset-builder')('./assets/manifest.json');
var merge       = require('merge-stream');
var pagespeed   = require('psi');

var mapsEnabled = !argv.production;
var path        = manifest.paths;
var globs       = manifest.globs;
var project     = manifest.getProjectGlobs();

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

// CSS
var cssTasks = function(filename) {
    return lazypipe()
        .pipe($.plumber)
        .pipe(function () {
            return $.if(mapsEnabled, $.sourcemaps.init());
        })
        .pipe(function() {
            return $.if('*.scss', $.sass({
                outputStyle: 'nested', // libsass doesn't support expanded yet
                precision: 10,
                includePaths: ['.'],
                onError: console.error.bind(console, 'Sass error:')
            }));
        })
        .pipe($.concat, filename)
        .pipe($.pleeease, {
            autoprefixer: {
                browsers: AUTOPREFIXER_BROWSERS
            }
        })
        .pipe(function () {
            return $.if(mapsEnabled, $.sourcemaps.write('.'));
        })
        .pipe(gulp.dest, path.dist + 'styles')
        .pipe($.livereload)();
};

// STYLES
gulp.task('styles', function() {
    var merged = merge();
    manifest.forEachDependency('css', function (dep) {
        merged.add(gulp.src(dep.globs)
            .pipe(cssTasks(dep.name)));
    });
    return merged;
});

// JSHINT
gulp.task('jshint', function() {
    return gulp.src([
        'bower.json', 'gulpfile.js'
    ].concat(project.js))
        .pipe($.jshint())
        .pipe($.jshint.reporter('jshint-stylish'))
        .pipe($.if(!browserSync.active, $.jshint.reporter('fail')))
});


var jsTasks = function(filename) {
    var fn = filename;
    return lazypipe()
        .pipe(function () {
            return $.if(mapsEnabled, $.sourcemaps.init());
        })
        .pipe(function() {
            return $.if(!!fn, $.concat(fn || 'all.js'));
        })
        .pipe($.uglify)
        .pipe(function () {
            return $.if(mapsEnabled, $.sourcemaps.write('.'));
        })
        .pipe(gulp.dest, path.dist + 'scripts')
        .pipe($.livereload)();
};

// SCRIPTS
gulp.task('scripts', ['jshint'], function() {
    var merged = merge();
    manifest.forEachDependency('js', function (dep) {
        merged.add(gulp.src(dep.globs)
            .pipe(jsTasks(dep.name)));
    });
    return merged;
});

// FONTS
gulp.task('fonts', function() {
    return gulp.src(globs.fonts)
        .pipe($.flatten())
        .pipe(gulp.dest(path.dist + 'fonts'));
});

// IMAGES
gulp.task('images', function() {
    return gulp.src(globs.images)
        .pipe($.imagemin({
            progressive: true,
            interlaced: true
        }))
        .pipe(gulp.dest(path.dist + 'images'));
});

// VERSIONING
gulp.task('version', function() {
    return gulp.src([path.dist + '**/*.{js,css}'], { base: path.dist })
        .pipe(gulp.dest(path.dist))
        .pipe($.rev())
        .pipe(gulp.dest(path.dist))
        .pipe($.rev.manifest())
        .pipe(gulp.dest(path.dist));
});

// CLEAN
gulp.task('clean', require('del').bind(null, [path.dist]));

// WATCH
gulp.task('watch', function() {
    $.livereload.listen();
    gulp.watch([path.source + 'styles/**/*'], ['styles']);
    gulp.watch([path.source + 'scripts/**/*'], ['jshint', 'scripts']);
    gulp.watch(['bower.json'], ['wiredep']);
    gulp.watch('**/*.php').on('change', function(file) {
        $.livereload.changed(file.path);
    });
});

// BUILD
gulp.task('build', ['styles', 'scripts', 'fonts', 'images'], function() {
    gulp.start('version');
});

// INJECT - (Injects assets from the `bower_components` directory)
gulp.task('wiredep', function() {
    var wiredep = require('wiredep').stream;
    return gulp.src(project.css)
        .pipe(wiredep())
        .pipe($.changed(path.source + 'styles'))
        .pipe(gulp.dest(path.source + 'styles'));
});

// DEFAULT TASK - (Cleans everything, then Builds the production files)
gulp.task('default', ['clean'], function() {
    gulp.start('build');
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