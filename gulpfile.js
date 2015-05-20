// include gulp
var gulp = require('gulp'); 

// include Our plugins
var jshint = require('gulp-jshint');
var minify = require('gulp-minify-css');
var sass = require('gulp-sass');
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');
var rename = require('gulp-rename');

// compile our site sass
gulp.task('sass', function() {
  return gulp.src('assets/styles/development/scss/*.scss')
    .pipe(sass())
    .pipe(gulp.dest('assets/styles/development/css'))
    .pipe(minify())
    .pipe(rename(function (path) {
      path.extname = '.min.css'
    }))
    .pipe(gulp.dest('assets/styles/production'))
});

// lint task
gulp.task('lint', function() {
  return gulp.src('assets/scripts/development/*.js')
    .pipe(jshint())
    .pipe(jshint.reporter('default'))
});

// concatenate & minify js
gulp.task('scripts', function() {
  return gulp.src('assets/scripts/development/*.js')
    .pipe(rename(function (path) {
        path.extname = '.min.js'
    }))
    .pipe(uglify())
    .pipe(gulp.dest('assets/scripts/production'))
});

// watch files For changes
gulp.task('watch', function() {
  gulp.watch('assets/styles/development/scss/*.scss', ['sass']);
  gulp.watch('assets/scripts/development/*.js', ['lint', 'scripts']);
});

// default task
gulp.task('default', ['sass', 'lint', 'scripts', 'watch']);