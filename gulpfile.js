const { src, dest, watch, task, parallel} = require('gulp');
// const browserSync = require('browser-sync').create();
const rename = require('gulp-rename'),
    sass = require('gulp-sass'),
    autoprefixer = require('gulp-autoprefixer'),
    sourcemaps = require('gulp-sourcemaps'),
    babel = require('gulp-babel'),
    concat = require('gulp-concat'),
    minify = require("gulp-babel-minify"),
    dist = "C:\\xampp56\\htdocs\\task_list",
    image = require('gulp-image');

function copy_html() {
    src("./index.html")
        .pipe(dest(dist));
};

function css_style() {
    src('./scss/**/*.scss')
        .pipe(sourcemaps.init())
        .pipe(sass({
            errorLogToConsole: true,
            outputStyle: 'compressed'
        }))
        .on('error', console.error.bind(console))
        .pipe(autoprefixer({
            browsers: ['last 2 versions'],
            cascade: false
        }))
        .pipe(rename({suffix: '.min'}))
        .pipe(sourcemaps.write('./'))
        .pipe(dest(dist + "/css"));

    src('./css_libraries/**')
        .pipe(dest(dist + "/css/libraries"));
}

function js_script(){
    src('./scripts/*.js')
        .pipe(sourcemaps.init())
        .pipe(babel({
            presets: ['@babel/env']
        }))
        .pipe(concat('index.js'))
        .pipe(minify({
            mangle: {
              keepClassName: true
            }
        }))
        .pipe(rename({suffix: '.min'}))
        .pipe(sourcemaps.write('.'))
        .pipe(dest(dist + "/js"));

    src('./scripts/libraries/**')
        .pipe(dest(dist + "/js/libraries"));
}

function copy_php(){
    src('./api/**/**.php')
        .pipe(dest(dist + '/api'));
}

function copy_images () {
    src('./images/**/**.*')
      .pipe(image())
      .pipe(dest(dist + '/images'));
  };

function watchFiles(){
    watch('./index.html', copy_html);
    watch('./scss/**.*', css_style);
    watch('./scripts/**/*', js_script);
    watch('./**/*.php', copy_php);
    watch('./images/**/**.*', copy_images);
    // browserSync.stream()
}

// function sync (done) {
//     css_style();
//     js_script();
//     browserSync.init({
//         server: {
//             baseDir: "./"
//         },
//         port: 3000
//     })
//     done();
// }

// function browserReload(done){
//     browserSync.reload()
//     done();
// }

// function watchStyles(done) {
//     css_style();
//     browserSync.reload()
//     done()
// }

// function watchScripts(done) {
//     js_script();
//     browserSync.reload()
//     done()
// }

// task('default', parallel(sync, watchFiles));
// gulp.task(css_style);
// exports.default = defaultSomeTask;

task('default', watchFiles);


 

