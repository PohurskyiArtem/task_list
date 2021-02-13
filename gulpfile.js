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

// function copy_html() {
//     src("./index.html")
//         .pipe(dest(dist));
// };
task("copy_html", () => {
    return src("./index.php")
    .pipe(dest(dist));
})

// function css_style() {
//     src('./scss/**/*.scss')
//         .pipe(sourcemaps.init())
//         .pipe(sass({
//             errorLogToConsole: true,
//             outputStyle: 'compressed'
//         }))
//         .on('error', console.error.bind(console))
//         .pipe(autoprefixer({
//             browsers: ['last 2 versions'],
//             cascade: false
//         }))
//         .pipe(rename({suffix: '.min'}))
//         .pipe(sourcemaps.write('./'))
//         .pipe(dest(dist + "/css"));

//     src('./css_libraries/**')
//         .pipe(dest(dist + "/css/libraries"));
// }
task("css_style", () => {
    return src('./scss/**/*.scss')
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
})
task("copy_css_lib", () => {
    return src('./css_libraries/**')
    .pipe(dest(dist + "/css/libraries"));
})

// function js_script(){
//     src('./scripts/*.js')
//         .pipe(sourcemaps.init())
//         .pipe(babel({
//             presets: ['@babel/env']
//         }))
//         .pipe(concat('index.js'))
//         .pipe(minify({
//             mangle: {
//               keepClassName: true
//             }
//         }))
//         .pipe(rename({suffix: '.min'}))
//         .pipe(sourcemaps.write('.'))
//         .pipe(dest(dist + "/js"));

//     src('./scripts/libraries/**')
//         .pipe(dest(dist + "/js/libraries"));
// }
task("js_script", () => {
    return src('./scripts/*.js')
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
})
task("copy_js_lib", () => {
    src('./scripts/libraries/**')
        .pipe(dest(dist + "/js/libraries"));
})

// function copy_php(){
//     src('./api/**/**.php')
//         .pipe(dest(dist + '/api'));
// }
task("copy_php", () => {
    return src('./api/**.php')
    .pipe(dest(dist + '/api'));
})
task("copy_php_lib", () => {
    return src('./api/libraries/**.php')
    .pipe(dest(dist + '/api/libraries'));
})

// function copy_images () {
//     src('./images/**/**.*')
//       .pipe(image())
//       .pipe(dest(dist + '/images'));
//   };
task("copy_images", () => {
    return src('./images/**/**.*')
    .pipe(image())
    .pipe(dest(dist + '/images'));
})

// function watchFiles(){
//     watch('./index.html', parallel("copy_html"));
//     watch('./scss/**.*', parallel("css_style"));
//     watch('./css_libraries/', parallel("copy_css_lib"));
//     watch('./scripts/**.js', parallel("js_script"));
//     watch('./scripts/libraries/', parallel("copy_js_lib"));
//     watch('./**/*.php', parallel("copy_php"));
//     watch('./images/**/**.*', parallel("copy_images"));
// }
task('watch', () => {
    watch('./index.php', parallel("copy_html"));
    watch('./scss/**.*', parallel("css_style"));
    watch('./css_libraries/', parallel("copy_css_lib"));
    watch('./scripts/**.js', parallel("js_script"));
    watch('./scripts/libraries/', parallel("copy_js_lib"));
    watch('./api/*.php', parallel("copy_php"));
    watch('./api/libraries/*.php', parallel("copy_php_lib"));
    watch('./images/**/**.*', parallel("copy_images"));
})

task('build', parallel("copy_html", "css_style", "copy_css_lib", "js_script","copy_js_lib", "copy_php", "copy_php_lib", "copy_images"));
task('default', parallel("watch", "build"));
// gulp.task(css_style);
// exports.default = defaultSomeTask;

// task('default', watchFiles);


 

