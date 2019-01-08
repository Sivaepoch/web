## 语法
> new Map([iterable])

* 参数:可以是数组或者其他的可迭代对象.null会被当作undefined
* Map同Set类似,NaN是相同的,对象和数组是不同的.
	```javascript
    //对象
    var data = {};
    var o = {a:1};
    data[o] = 222;
    console.log(data); // {[object Object]: 1}
    ```
	上例中,因为对象的key为字符串,当为对象的时候,自动转换成字符串"[object Object]"
    
	```javascript
    let myMap = new Map([
    ['age',24],
    ['name','xixixi']
    ])
    myMap // {"age" => 24, "name" => "xixixi"}
    myMap.size // 2
    ```

## Object 和 Map 比较
* 对象的键只能为字符串,但是Map的键可以是任意值
* 可以通过map.size来获取Map的个数,而Object必须要遍历来手动获取

## Map.prototype.set() && Map.prototype.get()
> set() 方法为Map对象添加一个指定键（key）和值（value）的新元素。返回Map对象.
> 若已经存在键,则更新键值,否则,重新建立新键
> myMap.set(key, value);
> get() 方法用来获取一个 Map 对象中指定的元素。
> myMap.get(key);

* 参数:必填
* 返回值为Map对象

	```javascript
    let obj = {a:1};
    let arr = [1]
    let arr2 = [1]
    ```
    在Map中,只有引用同一个对象,才视为是同一个键;
    ```javascript
    let map = new Map()
    	.set(obj,'xixi')  // 可用链式
    map.get(obj) // 'xixi'
    map.get({a:1}) //undefined  obj和{a:1}内存地址不一样,所以找不到{a:1}
    ```
    arr和arr2虽然看似相同,但是指向的指针并不同,所以Map中也是区分他们不为同一个键
    ```javascript
    map.set(arr,1111)
    	.set(arr2,2222)
    get(arr)  //1111
    map.get(arr2) //2222
    ```
    若是同一个键被赋值了多次,后面的会覆盖之前的值
    ```javascript
    map.set(arr,'重新赋值');
    map.get(arr) // '重新赋值'
    ```
    Map对象将 0 -0 +0视为同一个值
    ```javascript
    map.set(-0,'0相等');
    map.get(0); // 0相等
    map.get(+0); // 0相等
    ```
    Map视NaN相等
    ```javascript
    map.set(NaN,'相等');
    map.get(Number('xixixi')) // '相等'
    ```
    布尔值true和'true'是两个不同的键,undefined和null也是两个不同的键
    ```javascript
    map.set(true,111)
    map.set('true',222)
    map.set(undefined,333)
    map.set(null,444)
    map.get(undefined) // 333
    map.get(true) //111
    ```
    
## Map.prototype.has()
>  返回一个bool值，用来表明map 中是否存在指定元素.
>  myMap.has(key);

* 参数:必需
* 返回值:布尔值,若存在于Map中,则返回true

	```javascript
    //接以上案例
    map.has(arr) //true
    map.has([1]) //false
    ```
    
## Map.prototype.delete()
> 移除 Map 对象中指定的元素。
> myMap.delete(key);

* 参数: 必需
* 返回值:布尔值,若为true,则删除成功

	```javascript
    map.delete(arr) //true
    map.has(arr)  //false
    map.delete([1]) //false
    ```
    
## Map.prototype.clear()
> 清除所有成员,没有返回值

```javascript
map.clear()
map.size // 0
```

## Map.prototype.keys()
> 返回键名的遍历器
> myMap.keys()

* 例子

	```javascript
    var map = new Map()
		.set('aa',11)
		.set('bb',22)
    for(let key of map.keys()){
    	console.log(key)
    }
    //aa
    //bb
    ```
    
## Map.prototype.values()
> 返回键值的遍历器
> myMap.values()

* 例子

	```javascript
    for(let value of map.values()){
    	console.log(value)
    }
    //11
    //22
    ```
    
## Map.prototype.entries()
> 返回所有成员的遍历器
> myMap.entries()

* 例子

	```javascript
     for(let item of map.entries()){
    	console.log(item)
     }
     // ['aa',11]
     // ['bb',22]
     
     for(let [key,value] of map.entries()){
     console.log(key,value)
     }
     // aa 11
     // bb 22
     
     for (let [key,value] of map){
     console.log(key,value)
     }
     //等同于map.entries();结果和上一个相同
    ```
    
## Map.prototype.forEach()
> myMap.forEach(callback[, thisArg])

* callback: 和Set类似,有三个参数,第一个为键值,第二个为键名,第三个为Map,
* thisArg:this,可选
	
    ```javascript
    var map = new Map()
		.set('aa',11)
		.set('bb',22)
    map.forEach(function (value,key,mymap){
    console.log(value,key,mymap)
    })
    // 11 "aa"  {"aa" => 11, "bb" => 22}
	// 22 "bb"  {"aa" => 11, "bb" => 22}
    ```

## Map 和 数组

* map转数组

	```javascript
		var map = new Map()
		.set('aa',11)
		.set('bb',22)
        .set('cc',33)
        
		[...map] // [ ['aa',11],['bb',22],['cc',33] ]
		[...map.keys()] //  ["aa", "bb", "cc"]
		[...map.values()] // [11, 22, 33]
		[...map.entries()] //  [ ['aa',11],['bb',22],['cc',33] ]
	```
* 数组转map

	```javascript
    let myMap = new Map([
    ['age',24],
    ['name','xixixi']
    ])
    ```

## Map 和 对象

* map转对象(map中所有的键是字符串,可以转对象)

	```javascript
    function mapToObj(myMap){
    	let obj = Object.create(null);
        for(let [key,val] of myMap){
        	obj[k] = v
        }
        return obj;
    }
    ```
    
* 对象转Map

	```javascript
    	function objToMap(obj){
            let map = new Map();
            for(let k in obj){
				map.set(k,obj[k])
            }
            return map;
        }
    ```
    
## WeakMap
> 类似Map,但是键必须是对象(null除外)，值可以是任意值;

* es5做法
	```javascript
    let obj1 = {a:1,b:2};
    let obj2 = {a2:1,b2:2};
    let arr = [
    	[obj1,'xixi'],
        [obj2,'haha']
    ]
    ```
    arr中引用了两个对象,如果不需要这两个对象的时候,我们就要手动删除arr中的引用,否则垃圾回收机制不会释放obj1,obj2中的内存
    ```javascript
    arr[0] = null;
    arr[1] = null;
    ```
* es5做法很麻烦,WeakMap解决了这个问题.他的键名对象都是弱引用,即垃圾回收机制不将其考虑在内.只要被引用的对象都被清除,垃圾回收机制就会释放改对象所占的内存;一旦不再需要,WeakMap里面的键值对象和所对应的键值就会消失,不需要再手动删除引用.

* 正是因为是弱引用,所以内部的key不可枚举.
* 有助于防止内存泄漏.
* WeakMap弱引用的只有键名,键值是正常引用
    
    ```javascript
    let wm = new WeakMap();
    let key = {};
    let obj = {aa: 1};

    wm.set(key, obj);
    obj = null;
    wm.get(key) // {aa:1}
    ```
    因为键值的引用是正常引用,即使外部已经消除了obj的引用,但是内部键值的引用依然存在.
    
* 只有set() ;get() ;has(); delete() 四种方法,无size属性
    
