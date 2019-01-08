

##  前言 
> gulp是基于node环境上运行的,所以在构建项目前,要先安装node

> 打开cmd,输入 node -v ;如果显示版本号,则为安装成功


## 安装

  * ##### 全局安装gulp
    ```JavaScript
      npm install gulp -g
    ```

* ##### 切换到项目文件夹,初始化项目
    ```JavaScript
    npm init
    ```
   初始化成功后,文件夹中会多一个package.json文件.
   
	![2.png](http://upload-images.jianshu.io/upload_images/1909602-f7f5c9f7c2d172b5.png?imageMogr2/auto-orient/strip%7CimageView2/2/w/1240)


* ##### 切换到项目文件夹,安装gulp
     ```JavaScript
        npm install gulp --save-dev
     ```
    安装成功后,会多一个node_modules文件夹.
    
	![3.png](http://upload-images.jianshu.io/upload_images/1909602-ed4e39c0c2efbf9f.png?imageMogr2/auto-orient/strip%7CimageView2/2/w/1240)

##   创建`gulpfile.js`

> gulp需要一个文件作为主文件,所以需要创建一个js文件.

* ##### 创建
![4.png](http://upload-images.jianshu.io/upload_images/1909602-a0c153d519b175a4.png?imageMogr2/auto-orient/strip%7CimageView2/2/w/1240)

## 大致流程
> 先通过gulp.src()获取到我们想处理的文件,再通过pipe()方法,将文件流导入到gulp中去,经过gulp处理后再通过gulp.dest()方法重新写入到我们指定的位置中.


## `gulp.src()`

* ##### 语法
```JavaScript
gulp.src(globs[, options])
```
* ##### 参数
	* `glob` : 数据类型 -- String/Array;为文件匹配模式,用来匹配文件路径.也可以为具体的文件路径.
	* `option`:可选参数,一般用不到.
* ##### node-glob 语法
	* `*` 匹配0个或多个字符,但不匹配分隔符
	* `?` 匹配一个字符
	* `[...]`  匹配方括号中的任意一个,当方括号中第一个字符是^或者!的时候,则不匹配方括号中的任意一个
	*  `!(pattern|pattern|pattern)` 匹配与所提供的模式不匹配的任何内容
	*  `?(pattern|pattern|pattern)` 匹配所提供模式中的0或1个;
	*  `+(pattern|pattern|pattern)`匹配所提供模式中的1个或多个;
	* `*(a|b|c)`匹配所提供模式中的0个或多个;
	* `@(pattern|pat*|pat?erN)` 匹配所提供的模式之一
	* `**` 匹配0个或多个目录和子目录

##  `gulp.dest()`

> 文件输出目录

* ##### 语法
  ```JavaScript
  gulp.dest(path[, options])
  ```

* ##### 参数
	* **path** : 类型 - String/Function;文件将被写入的路径(输出目录),也可以是函数.在函数中返回相应路径.
	* **option**:可选参数,一般用不到.

* ##### 例子1
  ```JavaScript
    var gulp = require('gulp');
    gulp.task('default',function(){
        gulp.src('static/css/style.css')
        .pipe(gulp.dest('dist/css'))
    })
    // 输出路径为 dist/css/style.css
    ```
  这里需要注意的一点是,这里输入的目录我们可以自定义,但是文件名是由src()里的名字决定的


* ##### 例子2
  ```JavaScript
  var gulp = require('gulp');
  gulp.task('default',function(){
      gulp.src('static/css/style.css')
      .pipe(gulp.dest('dist/css/xixi.css'))
  })
  // 这时的输出路径是 dist/css/xixi.css/style.css
  ```
  ```JavaScript
  var gulp = require('gulp');
  gulp.task('default',function(){
      gulp.src('static/css/style.css')
      .pipe(gulp.dest('dist'))
  })
  // 这时的输出路径是 dist/style.css
  ```
  ```JavaScript
  var gulp = require('gulp');
  gulp.task('default',function(){
      gulp.src('static/**/style.css')
      // static/test/style.css
      .pipe(gulp.dest('dist'))
  })
  // 这时的输出路径是 dist/test/style.css
  // 从有通配符开始出现的那部分路径开始
  ```

## `gulp.task()`

* ##### 用法
    ```JavaScript
    gulp.task(name[, deps], fn)
    ```
* ##### 参数
	* `name` : 任务的名字
	* `deps`:任务列表组成的数组.这些任务会在你当前任务运行之前完成.
	* `fn`:任务函数
* ##### 用法
    ```JavaScript
    gulp.task('mytask', ['array', 'of', 'task', 'names'], function() {
      // do something
      //执行mytask任务之前,会把数组里的任务都完成.
    });
    ```
* ##### 异步问题
    ```JavaScript
    gulp.task('asyn',function(){
        console.log('执行异步任务之前') //首先打印出这句
        setTimeout(function(){
            console.log('异步任务执行之后') //最后打印
        },2000)
    })
    gulp.task('default',['asyn'],function(){
	    console.log('执行完asyn之后,才执行此任务.') // 第二个打印
    })
    ```
	![5.png](http://upload-images.jianshu.io/upload_images/1909602-a05c5062e22171eb.png?imageMogr2/auto-orient/strip%7CimageView2/2/w/1240)

* ##### 异步解决
	 * ###### fn接受一个callback
	    ```JavaScript
             gulp.task('asyn',function(cb){
	        console.log('执行异步任务之前')
                setTimeout(function(){
                console.log('异步任务执行之后')
                cb()
            },2000)
          })
          gulp.task('default',['asyn'],function(){
              console.log('执行完asyn之后,才执行此任务.')
          })
         ```
    	![6.png](http://upload-images.jianshu.io/upload_images/1909602-e5f3b3755059e587.png?imageMogr2/auto-orient/strip%7CimageView2/2/w/1240)
	* ###### fn返回一个stream
         ```JavaScript
          gulp.task('asyn',function(cb){
            var stream = gulp.src('*static/css/*.css')
                            .pipe(minify()) //异步操作
                            .pipe(gulp.dest('dist/css'))
            return stream;
            })
            gulp.task('default',['asyn'],function(){
            })
         ```
    * ###### fn返回一个promise
         ```JavaScript
            var Q = require('q');
            gulp.task('asyn', function() {
              var deferred = Q.defer();
              // 执行异步的操作
              setTimeout(function() {
                deferred.resolve();
              }, 1);
              return deferred.promise;
            });
         ```
* ##### 顺序
    ```JavaScript
    gulp.task('one', function(cb) {
	    //do something...
        cb(err); // 如果 err 不是 null 或 undefined，则会停止执行，且注意，这样代表执行失败了
    });
    // two需要依赖one来完成.
    gulp.task('two', ['one'], function() {
        // 'one' 完成后
    });
    gulp.task('default', ['one', 'two']);
    ```

## 自动编译`gulp.watch()`&`browserSync`
> vue是自动编译,只要我们改动文件,保存之后,页面就会自动刷新,gulp也可以实现这一功能.

* ##### 安装browser-sync
    ```java
    npm install browser-sync --save-dev
    ```
	![7.png](http://upload-images.jianshu.io/upload_images/1909602-11712c9149e41be3.png?imageMogr2/auto-orient/strip%7CimageView2/2/w/1240)

	安装成功后,package.json中会增加一行代码.

* ##### 代码
  ```JavaScript
  var gulp = require('gulp'),
	    browserSync = require("browser-sync").create();//浏览器实时刷新  
  gulp.task('default',function(){
	  browserSync.init({
		  file:['*.html','static/css/*css','static/js/*.js'],
		  server:{
		  	baseDir:'./'
	  	}
	  })
	  gulp.watch('./*.html').on('change',browserSync.reload)
	  gulp.watch('./static/css/*.css').on('change',browserSync.reload)
	  gulp.watch('./static/js/*.js').on('change',browserSync.reload)
  })
  ```
  我的文件结构如下,这样就完成了自动编译.  
  
	![8.png](http://upload-images.jianshu.io/upload_images/1909602-2f2b70df34d4f3f5.png?imageMogr2/auto-orient/strip%7CimageView2/2/w/1240)



## 我的配置

   ```JavaScript
      var gulp = require('gulp'),
	      browserSync = require("browser-sync").create(),//浏览器实时刷新 
	      stylus = require('gulp-stylus'),  //处理stylus
	      uglify = require('gulp-uglify'),  //压缩js
	      rename = require('gulp-rename'),  //重命名
	      minifyCss = require('gulp-minify-css'),//压缩CSS
	      minifyHtml = require('gulp-minify-html'),//压缩html
	      imagemin = require('gulp-imagemin'),//压缩图片
	      pngquant = require('imagemin-pngquant'),//深度压缩图片
	      concat = require("gulp-concat");//文件合并

     //处理html  
      gulp.task('html', function () {  
        var options = {  
            removeComments: true,//清除HTML注释  
            collapseWhitespace: true,//压缩HTML  
            removeScriptTypeAttributes: true,//删除<script>的type="text/javascript"  
            removeStyleLinkTypeAttributes: true,//删除<style>和<link>的type="text/css"  
            minifyJS: true,//压缩页面JS  
            minifyCSS: true//压缩页面CSS  
        };  
      gulp.src('./*.html')  
           .pipe(minifyHtml(options))  
           .pipe(gulp.dest('./build'))  
           // .pipe(browserSync.reload({stream:true}));  //重刷页面
      });  

      //处理css
      gulp.task('stylus',function(){
	      return gulp.src('./static/css/*.styl')
				  .pipe(stylus())
				.pipe(gulp.dest('./static/css'))
				.pipe(minifyCss())
				.pipe(gulp.dest('./build/static/css'))
				.pipe(browserSync.reload({stream:true}));  
      })

      // 压缩js
      gulp.task('script',function () {
          gulp.src('./static/js/*.js')
              .pipe(uglify())
              // .pipe(rename('*.min.js')) //重命名
              .pipe(gulp.dest('./build/static/js'))
      })

      // 压缩图片
      gulp.task('image',function () {
                 gulp.src('./static/images/*')
                    .pipe(imagemin({
                        progressive:true, //无损压缩图片
                        svgoPlugins: [{removeViewBox: false}],  // 不移除svg的viewbox属性 
                        use:[pngquant()]  //使用pngquant深度压缩
                    }))
                  .pipe(gulp.dest('./build/static/images'))
                  .pipe(browserSync.reload({stream:true}));  
       })

      //自动编译
      gulp.task('watch',function(){
	      gulp.start('stylus');  
	      browserSync.init({
		      file:['*.html','static/css/*css','static/js/*.js'],
		      server:{
			      baseDir:'./'
		      }
	      })
	       gulp.watch('./*.html').on('change',browserSync.reload) //仅刷新页面
	      // gulp.watch('./*.html', ['html'])    执行一次html
	      gulp.watch('./static/css/*.styl',['stylus'])
	      gulp.watch('./static/js/*.js').on('change',browserSync.reload)
      })

      // 打包
      gulp.task('build',['html','stylus','script','image'])

      //开发
      gulp.task('default',['stylus','watch'])
  ```

