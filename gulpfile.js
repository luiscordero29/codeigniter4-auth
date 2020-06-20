const { src, dest } = require('gulp');

function bootstrap() {
    return src('src/*.js')
    .pipe(dest('output/'));
}
  
exports.default = bootstrap