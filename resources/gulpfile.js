// Required Packages
var gulp = require('gulp');
var plumber = require('gulp-plumber');
var util = require('gulp-util');

// Utilies
var bowerFiles = require('main-bower-files');
var filter = require('gulp-filter');
var minifycss = require('gulp-minify-css');
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');
var flatten = require('gulp-flatten');
var less = require('gulp-less');
var notify = require('gulp-notify');
var autoprefixer = require('gulp-autoprefixer');
var urlAdjuster = require('gulp-css-url-adjuster');

// Paths
var dest = '../public/default/';

// Vendor CSS
var vendorCSS = [
	'bower_components/font-awesome/css/font-awesome.css',
	'bower_components/bootstrap/dist/css/bootstrap.min.css',
	'bower_components/chosen/chosen.min.css',
	'bower_components/ekko-lightbox/dist/ekko-lightbox.min.css',
	'bower_components/iCheck/skins/all.css',
	'bower_components/metisMenu/dist/metisMenu.min.css',
	'bower_components/ladda-bootstrap/dist/ladda-themeless.min.css',
	'plugins/datetime/bootstrap-datetimepicker.min.css',
	'plugins/nestable/jquery.nestable.css',
	'plugins/theme/lte-admin-theme.css',
	'plugins/theme/lte-skins.css'
];

// Vendor JS
var vendorJS = [
	'bower_components/jquery/dist/jquery.js',
	'bower_components/bootstrap/dist/js/bootstrap.min.js',
	'bower_components/bootbox/bootbox.js',
	'bower_components/chosen/chosen.jquery.min.js',
	'bower_components/datatables/media/js/jquery.dataTables.js',
	'bower_components/ekko-lightbox/dist/ekko-lightbox.min.js',
	'bower_components/iCheck/icheck.min.js',
	'bower_components/metisMenu/dist/metisMenu.min.js',
	'bower_components/notifyjs/dist/notify-combined.min.js',
	'bower_components/ladda-bootstrap/dist/spin.js',
	'bower_components/ladda-bootstrap/dist/ladda.min.js',
	'plugins/datetime/moment-with-locales.min.js',
	'plugins/datetime/s_bootstrap-datetimepicker.min.js',
	'plugins/theme/lte-admin.js'
];

// Application LESS
var applicationLESS = [
	'less/app.less'
];

// Application JS
var applicationJS = [
	'js/**/*.js',
	'js/app.js'
];


// Compile Vendor CSS
gulp.task('fwm:vendor_css', function () {
	return gulp.src(vendorCSS)
		.pipe(plumber(onError))
		.pipe(filter('**/*.css'))
		.pipe(urlAdjuster({
			prepend: '../images/'
		}))
		.pipe(minifycss())
		.pipe(concat('vendor.css'))
		.pipe(gulp.dest(dest + 'css'))
		.pipe(notify('Minified Vendor CSS created.'));
});

// Compile Vendor JS
gulp.task('fwm:vendor_js', function () {
	return gulp.src(vendorJS)
		.pipe(plumber(onError))
		.pipe(filter('**/*.js'))
		.pipe(uglify())
		.pipe(concat('vendor.js'))
		.pipe(gulp.dest(dest + 'js'))
		.pipe(notify('Minified Vendor JS created.'));
});

// Copy any vendor fonts to public under /fonts/
gulp.task('fwm:vendor_fonts', function () {
	return gulp.src(bowerFiles({debugging:false}))
		.pipe(plumber(onError))
		.pipe(filter(['**/*.eot','**/*.otf','**/*.svg','**/*.ttf','**/*.woff', '**/*.woff2']))
		.pipe(gulp.dest(dest + 'fonts'));
});

// Copy vendor plugins
gulp.task('fwm:vendor_plugins', function () {
	return gulp.src(['vendor/**/*.*'])
		.pipe(plumber(onError))
		.pipe(gulp.dest(dest + 'vendor/'));
});

// Compile application less
gulp.task('fwm:compile_less', function(){
	return gulp.src(applicationLESS)
		.pipe(plumber(onError))
		.pipe(less())
		.pipe(autoprefixer('last 10 version'))
		.pipe(minifycss())
		.pipe(gulp.dest(dest + 'css'))
		.pipe(notify({ message: 'CSS Minified' }));
});

// Compile application JS
gulp.task('fwm:compile_js', function(){
	return gulp.src(applicationJS)
		.pipe(plumber(onError))
		.pipe(uglify())
		.pipe(concat('app.js'))
		.pipe(gulp.dest(dest + 'js'))
		.pipe(notify({ message: 'JS Minified' }));
});


// Error Handling
var onError = function (err) {
	util.beep();
	util.log(err);
	notify.onError({
		title:    "Gulp",
		subtitle: "Error",
		message:  "<%= error.message %>",
		sound:    "Beep"
	})(err);

	this.emit('end');
};


// Tasks
gulp.task('vendor', ['fwm:vendor_css', 'fwm:vendor_js', 'fwm:vendor_fonts', 'fwm:vendor_plugins']);
gulp.task('app', ['fwm:compile_less', 'fwm:compile_js']);
gulp.task('default', ['vendor', 'app']);
