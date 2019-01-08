## 特点
* Promise能将回调分离出来,在异步操作执行之后,用链式方法执行回调,虽然es5用封装函数也能实现,但是如果有多层异步的话,就会显得比较繁琐,而Promise用链式则更加直观优雅.

* Promise对象不受外界的影响.有三种状态.`pending`进行中,`fulfilled`已成功,`rejected`已失败.只有异步操作的结果可以决定当前是哪一种状态.

* 状态一旦改变,就不会再变.

## 语法
>Promise 译为承诺,即为如果我做到了,会怎么怎么样,没做到,会怎么怎么样,es6中的promise大致表达的意思也是这样,用于一个异步操作最终完成或者没完成及其结果的表示.


* 语法
     ```javascript
    var promise = new Promise(
         //executor
         function(resolve,reject){
            if(/*异步成功*/){resolve(value)}
            else{reject(error)}
        }
     )
     promise.then(function(value){
     //success
     },funtion(){
     //fail
     })
     ```

## 参数
* 参数: 为回调函数,回调函数的参数为resolve和reject

* resolve和reject分别表示异步操作成功后的回调函数和异步操作失败的回调函数,
* resolve函数,将Promise的状态改为fulfilled;reject改为rejected;

* Promise实例创建成功后,`then`方法分别指定不同状态的回调函数


## 参数executor补充点
* 回调函数executor在Promise构造函数执行的时候同步执行
    ```javascript
    //注意打印结果的顺序
    let pro = new Promise(function(resolve,reject){
        console.log('inPromise')
        resolve('成功后的回调')
     });
    pro.then((data) => console.log(data))
    console.log('notInPromise')

    // inPromise
    // notInPromise
    // '成功后的回调'
    ```
* 同步执行是什么意思呢,以上代码中,我只是new了一个实例 `pro`,但是并没有去调用`pro`,最终结果仍然打印出了内容,因为new的过程和executor的执行是同时的,所以在创建实例的时候,回调函数就已经在执行了.
* 有时候我们只是想创建实例,并不想去执行,该怎么办呢?一般的解决办法就是把它包装在一个函数中.需要使用的时候再去执行这个包装函数.

	```javascript
    function promisBox(){
     let pro = new Promise(function(resolve,reject){
        console.log('inPromise')
        resolve('成功后的回调')
     });
    console.log('notInPromise')
    return pro;
    }
    promisBox().then((data) => console.log(data))
    ```

## 基本用法
> promise.then(onFulfilled, onRejected)
> 
> 如果 onFulfilled, onRejected不是函数，其必须被忽略;若为函数,仅可被调用一次!
> 
> onFulfilled在Promise执行结束前不可被调用.
> 
> onRejected在被拒绝执行前不可被调用.

* 创建实例之后,调用.then,then可以接收两个回调函数当作参数.第一个参数是异步执行成功的时候调用,第二个则为失败的时候调用,可省略.
    ```javascript
    //还用上面的例子
	function promisBox(age){
     let pro = new Promise(function(resolve,reject){
        if(age > 18){
        	resolve('成功后的回调')
        }else{
       	 reject('失败后的回调')
        }
     });
    return pro;
    }
    promisBox(24).then(
    	(res) => console.log(res), //接收上面resolve中的参数
        (error) => console.log(error) //接收上面reject中的参数
    )
    //'成功后的回调'
    promisBox(17).then(
    	(res) => console.log(res), //接收上面resolve中的参数
        (error) => console.log(error) //接收上面reject中的参数
    )
    //'失败后的回调'
    ```

* 除了then之外,还有catch方法;catch和then里的第二个参数效果一样,不过多了一个功能,如果then第一个参数内代码出错,并不会报错卡死,而是会进到catch方法内.
	```javascript
	function promisBox(age){
     let pro = new Promise(function(resolve,reject){
        if(age > 18){
        	resolve('成功后的回调')
        }else{
       	 reject('失败后的回调')
        }
     });
    return pro;
    }
    promisBox(24)
    	.then(
    		(res) => console.log(xixi,res), //xixi变量没有定义,进入到catch方法,不报错
    	)
        .catch(error => console.log(error)) //接收then第一个参数内的报错信息
    // failed
    // ReferenceError: xixi is not defined...
    ```

## 小例子
* 案例1

	```javascript
    var promise2 = new Promise((resolve,reject) => {
        setTimeout(function (){resolve('success')},250)
    })
    promise2.then((suc) => console.log(suc)) // 'success'
    ```
* 案例2(摘自阮一峰老师,链接在最后)

	```javascript
    var getJSON = function(url) {
    var promise = new Promise(function(resolve, reject){
    var client = new XMLHttpRequest();
    client.open("GET", url);
    client.onreadystatechange = handler;
    client.responseType = "json";
    client.setRequestHeader("Accept", "application/json");
    client.send();

    function handler() {
      if (this.readyState !== 4) {
        return;
      }
      if (this.status === 200) {
        resolve(this.response);
      } else {
        reject(new Error(this.statusText));
      }
   	 };
  	});
 	 return promise;
	};
    getJSON("/posts.json").then(function(json) {
      console.log('Contents: ' + json);
    }, function(error) {
      console.error('出错了', error);
    });
    ```
  
# 对象方法
## Promise.prototype.then()
* 如果有多层异步和回调

	```javascript
    function promisBox(){
         let pro = new Promise(function(resolve,reject){
            console.log('inPromise1')
            resolve('成功后的回调1')
         });
        console.log('notInPromise1')
        return pro;
	}
    function promisBox2(){
         let pro = new Promise(function(resolve,reject){
            console.log('inPromise2')
            resolve('成功后的回调2')
         });
        console.log('notInPromise2')
        return pro;
    }
    promisBox()
        .then((res) => {console.log(res);return promisBox2()})
        .then((res) => {console.log(res);return '也可以直接返回数据,作为参数'})
        .then((res) => {console.log(res)})
	//inPromise1
	//notInPromise1
	// 成功后的回调1
	// inPromise2
	// notInPromise2
	// 成功后的回调2
	// 也可以直接返回数据,作为参数
    ```
    
* 一个异步的结果返回另一个异步操作

	```javascript
    var  promise1 = new Promise((resolve,reject) => {
    	setTimeout(() => reject('reject'),3000)
	})
    var promise2 = new Promise((resolve,reject) => {
        setTimeout(() => resolve(promise1),1000)
    } )  
    promise2 //这里的then语句是promise1的事件了
        .then(res => console.log('success',res))
        .catch(error => console.log('failed',error))
   //三秒之后 打印出 'failed reject'
    ```
    promise1的状态决定了promise2的状态,所以这个时候,所以没有执行promise1的resolve函数


## Promise.prototype.catch()
> Promise.prototype.catch() 等同于.then(null,reject)

* 以下两种写法效果一样,一般用第二种方法

	```javascript
    // 一
    var promise = new Promise(function(resolve, reject) {
      console.log(xixixixi)
    });
    promise
        .then(null,err => console.log('reject',err)) 
   // 二
   	promise
        .catch(err => console.log('reject',err))
   // reject 
   // ReferenceError: xixixixi is not defined
    ```
* Promise实例在resolve之后再有错误,不会被捕获.

	```javascript
    var promise = new Promise(function(resolve, reject) {
      resolve('success')
      console.log(xixixixi)
    });
    promise
    	.then(res => console.log(res))
    	.catch(err => console.log(err))
    // success
    ```
*  任意一个then发生错误的时候,都会被最后的catch捕获到

	```javascript
    promise
    	.then(res => console.log(res))
        .then(res => console.log(res))
        .then(res => console.log(res))
        .catch(err => console.log(err)) //以上三个,任意一个出现错误,都会被捕捉
    ```
* catch返回的是Promise,所以之后可以继续.then
	```javascript
	 var promise = new Promise(function(resolve, reject) {
      console.log(xixixixi)
     });
     promise
    	.catch(err => console.log(err))
        .then(res => console.log('继续执行'))
    // ReferenceError: xixixixi is not defined
    // 继续执行
    ```
* 上例换个顺序

	```javascript
    var promise = new Promise(function(resolve, reject) {
      resolve('随便')
    });
    promise
    	.catch(err => console.log(err))
        .then(res => {console.log(res);console.log(xixixi)})
        //.catch(err => console.log(err))
    // 先打印出  '随便'
    // 然后抛出错误 ReferenceError: xixixi is not defined;
    // 之前都是打印出错误,不影响运行.这里是抛出错误,停止运行
    // 因为这里的then出现错误,跟之前的catch无关了,错误无法被捕获
    ```

## Promise.all()
> Promise.all(iterable);
> 
> 只有参数中的每个实例的状态都编程fulfilled或者其中一个变为rejected,才会调用之后的回调函数

* 首先看一段代码,了解用法,还是用上面promiseBox的例子,下例中,参数为 promisBox 和 promisBox2 组成的数组,all的状态是由数组中的值共同决定,只有每个值的状态都是fulfilled,all的状态才会变成fulfilled.返回值为一个数组.

	```javascript
    function promisBox(){
         let pro = new Promise(function(resolve,reject){
            resolve('成功后的回调1')
         });
        return pro;
    }
    function promisBox2(){
         let pro = new Promise(function(resolve,reject){
            resolve('成功后的回调2')
         });
        return pro;
    }

    var all = Promise.all([promisBox(),promisBox2()])
        .then((res) => console.log(res))
        .catch(err => console.log(err))
	// ["成功后的回调1", "成功后的回调2"]
    ```
* 数组中有一个值的状态为rejected,则all的状态为rejected    
    ```javascript
    function promisBox(){
         let pro = new Promise(function(resolve,reject){
            resolve('成功后的回调1')
         });
        return pro;
    }
    function promisBox2(){
         let pro = new Promise(function(resolve,reject){
            resolve('成功后的回调2')
         });
        return pro;
    }

    function promisBox3(){
         let pro = new Promise(function(resolve,reject){
            console.log(xixixixi)
            resolve('成功后的回调3')
         });
        return pro;
    }
    var all = Promise.all([promisBox(),promisBox2(),promisBox3()])
        .then((res) => console.log(res))
        .catch(err => console.log(err))
    //ReferenceError: xixixixi is not defined
    ```
    
* 如果参数实例中自己定义了catch,如果此参数的状态是rejected,执行的是它自己的catch,而不是all的catch

	```javascript
     function promisBox(){
         let pro = new Promise(function(resolve,reject){
            resolve('成功后的回调1')
         });
        return pro;
    }
    function promisBox2(){
         let pro = new Promise(function(resolve,reject){
            resolve('成功后的回调2')
         });
        return pro;
    }

    function promisBox3(){
         let pro = new Promise(function(resolve,reject){
            console.log(xixixixi)
            resolve('成功后的回调3')
         })
			.catch(err => console.log('promisBox3',err));
        return pro;
    }
    var all = Promise.all([promisBox(),promisBox2(),promisBox3()])
        .then((res) => console.log(res))
        .catch(err => console.log('all',err))
    // promisBox3 ReferenceError: xixixixi is not defined
    // ["成功后的回调1", "成功后的回调2", undefined]
    ```
    promisBox3首先是rejected,但是他有自己的catch,通过catch方法,返回一个新的Promise实例,这个新的实例状态是fulfilled;因此最后all会执行then的回调

## Promise.race()
> all的效果是,谁执行的最慢,就以谁为基准执行回调,而race相反,race译为比赛,效果是谁执行的快,就以谁为基准去执行回调.
> race的用法和all差不多.

* 具体例子
	```javascript
     function promisBox(){
         let pro = new Promise(function(resolve,reject){
         	//console.log(hahahaha)    第一个注释
            resolve('成功后的回调1')
         });
        return pro;
    }
    function promisBox2(){
         let pro = new Promise(function(resolve,reject){
            setTimeout(function(){
            	//console.log(hahahaha)  第二个注释
            	resolve('成功后的回调2')}
             ,2000)
         });
        return pro;
    }

    var race = Promise.race([promisBox(),promisBox2()])
        .then((res) => console.log(res))
        .catch(err => console.log(err))
    // 成功后的回调1
    //将第一个注释取消  ReferenceError: hahahaha is not defined
    // 将第二个注释取消   '成功后的回调1' 两秒后抛出错误hahahaha is not ...,停止运行.
    ```
    
    
    
## 参考
[阮一峰ES6入门](http://es6.ruanyifeng.com/#docs/promise)
[MDN](https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Promise)