const gulp = require("gulp");
const sass = require("gulp-sass")(require("sass"));

function compileSass() {
    return gulp.src("assets/styles/**/*.scss") // Adjust path as needed
        .pipe(sass().on("error", sass.logError))
        .pipe(gulp.dest("assets/styles"));
}

function watchFiles() {
    gulp.watch("assets/styles/**/*.scss", compileSass);
}

exports.default = gulp.series(compileSass, watchFiles);
