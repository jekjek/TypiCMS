var gulp = require('gulp');
var gutil = require('gulp-util');
var notify = require('gulp-notify');
var less = require('gulp-less');
var path = require('path');
var csso = require('gulp-csso');
var uglify = require('gulp-uglify');
var concat = require('gulp-concat');
var watch = require('gulp-watch');
var exec = require('child_process').exec;
var sys = require('sys');
var bowerFiles = require("gulp-bower-files");

var publicJsFiles = [
  'public/components/vendor/jquery-legacy/jquery.js',
  'public/components/vendor/bootstrap/js/dropdown.js',
  'public/components/vendor/fancybox/source/jquery.fancybox.js',
  'public/js/live-search.js',
  'public/js/gmaps.js',
  'public/js/public.js'
];

// Where do you store your Less files?
var lessDir = 'app/assets/less';

// Compile Less, concat and save to target CSS directory
gulp.task('public-less', function () {

  return gulp.src([
      lessDir + '/public.less'
    ])
    .pipe(less())
    .pipe(csso())
    .pipe(gulp.dest('public/css'))
    .pipe(notify('Public CSS minified'));

});

gulp.task('admin-less', function () {

  return gulp.src([
      lessDir + '/admin.less'
    ])
    .pipe(less())
    .pipe(csso())
    .pipe(gulp.dest('public/css'))
    .pipe(notify('Admin CSS minified'));

});

// Minify, concat and save to target JS directory
gulp.task('public-js', function () {

  return gulp.src(publicJsFiles)
    .pipe(uglify())
    .pipe(concat('public.min.js'))
    .pipe(gulp.dest('public/js'))
    .pipe(notify('Public JS minified'));

});

// Run all PHPUnit tests
gulp.task('phpunit', function() {
    exec('phpunit', function(error, stdout) {
        sys.puts(stdout);
    });
});

// Keep an eye on Less and PHP files for changes…
gulp.task('watch', function () {
    gulp.watch(lessDir + '/*.less', ['public-less', 'admin-less']);
    gulp.watch(publicJsFiles, ['public-js']);
    // gulp.watch('app/**/*.php', ['phpunit']);
});

gulp.task("bowerFiles", function(){
    bowerFiles().pipe(gulp.dest("public/vendor"));
});

// What tasks does running gulp trigger?
gulp.task('default', ['bowerFiles', 'public-less', 'admin-less', 'public-js']);
// , 'phpunit', 'watch'
