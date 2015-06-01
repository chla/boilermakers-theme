// Load gulp plugins with 'require' function of nodejs
var gulp       = require('gulp');
var	plumber    = require('gulp-plumber');
var	gutil      = require('gulp-util');
var	uglify     = require('gulp-uglify');
var	concat     = require('gulp-concat');
var	rename     = require('gulp-rename');
var	minifyCSS  = require('gulp-minify-css');
var	less       = require('gulp-less');
var	path       = require('path');
var	livereload = require('gulp-livereload');
var sass       = require('gulp-sass');

// Handle less error
var onError = function (err) {
	gutil.beep();
	console.log(err);
};

// Path configs
var css_files  = 'assets/css/*.css'; // .css files
var	css_path   = 'assets/css'; // .css path
var	js_files   = 'assets/js/**/*.js'; // .js files
var	less_file  = 'assets/less/**/*.less'; // .less files
var	sass_file  = 'assets/sass/**/*.scss'; // .scss files
var	dist_path  = 'assets/dist';

// Extension config
var extension = 'php';

// Functions for tasks
function js() {
	return gulp.src(js_files)
			.pipe(plumber({
				errorHandler: onError
			}))
			.pipe(concat('dist'))
			.pipe(rename('concat.min.js'))
			.pipe(uglify())
			.pipe(gulp.dest(dist_path))
			.pipe(livereload());
}
function css() {
	return gulp.src(css_files)
			.pipe(concat('dist'))
			.pipe(rename('all.min.css'))
			.pipe(minifyCSS())
			.pipe(gulp.dest(dist_path))
			.pipe(livereload());
}
function lessTask(err) {
	return gulp.src(less_file)
			.pipe(plumber({
				errorHandler: onError
			}))
			.pipe(less({ paths: [ path.join(__dirname, 'less', 'includes') ] }))
			.pipe(gulp.dest(css_path))
			.pipe(livereload());
}
function sassTask(err) {
  return gulp.src(sass_file)
      .pipe(plumber({
  			errorHandler: onError
  		}))
      .pipe(sass())
      .pipe(gulp.dest(css_path))
      .pipe(livereload());
};
function reloadBrowser() {
	return gulp.src('*.' + extension)
			.pipe(livereload());
}

// The 'js' task
gulp.task('js', function() {
	return js();
});

// The 'css' task
gulp.task('css', function(){
	return css();
});

// The 'less' task
gulp.task('less', function(){
	return lessTask();
});

// The 'sass' task
gulp.task('sass', function () {
    return sassTask();
});

// Reload browser when have *.html changes
gulp.task('reload-browser', function() {
	return reloadBrowser();
});

// The 'default' task.
gulp.task('default', function() {
  
	livereload.listen();

  gulp.watch(sass_file, function() {
		// if (err) return console.log(err);
		return sassTask();
	});

	gulp.watch(less_file, function() {
		// if (err) return console.log(err);
		return lessTask();
	});

	gulp.watch(css_files, function() {
		console.log('CSS task completed!');
		return css();
	});

	gulp.watch(js_files, function() {
		console.log('JS task completed!');
		return js();
	});

	gulp.watch('**/*.' + extension, function(){
		console.log('Browse reloaded!');
		return reloadBrowser();
	});

});
