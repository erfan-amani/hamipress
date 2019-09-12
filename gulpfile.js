const gulp = require('gulp');
const sass = require('gulp-sass');
const concat = require('gulp-concat');
const del = require('del');
const uglify = require('gulp-uglify');
const rename = require('gulp-rename');

gulp.task('styles', function() {
    return gulp.src('sass/main.scss')
        .pipe(sass())
        .pipe(concat('styles.css'))
        // .pipe(uglify())
        .pipe(gulp.dest('css'))
});


gulp.task('clean', () => {
    return del([
        'css/styles.css',
    ]);
});




gulp.task('watch', () => {
    gulp.watch('sass/main.scss', (done) => {
        gulp.series(['styles'])(done);
    });
});