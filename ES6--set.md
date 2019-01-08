## 语法
> set对象允许存储任何类型的唯一值,无论是原始值或者是对象引用;

> new Set([iterable])

* 参数非必需, 如果传递一个可迭代对象,他的所有元素被添加到新的Set中,如果无此参数,则Set为空
    
* 返回一个新的Set对象

## 简述

> set对象是值的集合,元素只会出现一次,即Set中的元素是唯一的.

* 值得注意的是,NaN被Set认为是相同的,{}被认为是不同的

    ```javascript
    var set = new Set([{},{}])
    set  //{{},{}}
    set.size  // 2
    ```
     ```javascript
    var set = new Set([NaN,NaN])
    set  //{NaN}
    set.size  // 1
    ```
   
## set对象与数组之间的转换

```javascript
var arr = [1,2,3,4,4];
var set = new Set(arr) //数组转换set对象
set //{1,2,3,4}
//方法一
Array.from(set) //[1,2,3,4]
//方法二
[...set] //[1,2,3,4]
```

## set与字符串
```javascript
var str = 'siiva';
new Set(str) //{'s','i','v','a'}
```

## Set.prototype.add()  && Set.prototype.size
> mySet.add(value)
> 
> Set.prototype.size 返回Set实例的成员总数

*   参数value,必需,需要添加到Set对象的元素的值

* 	返回Set对象本身

    ```javascript
        var mySet = new Set();
        mySet.add(1) // {1}
        mySet.add(2).add('2') //{1,2,'2'}  可以链式,2 '2' set看作不相等
        mySet.size //3
    ```
    
## Set.prototype.has()
> has方法返回一个布尔值 来判断value是否存在Set对象中

> mySet.has(value)

* 参数value为必需.
* 返回值为布尔值.

    ```javascript
    var mySet = new Set();
    mySet.add('siva');

    mySet.has('siva') // true
    mySet.has('hello') // false
    ```
    
## Set.prototype.delete()
> delete() 方法可以从一个 Set 对象中删除指定的元素。
> 
> mySet.delete(value);

* 参数value,将要删除的元素
* 返回值为布尔值,true为删除成功

    ```javascript
	var mySet = new Set();
    mySet.add('siva');
    
    mySet.delete('hello')  //false
    mySet.delete('siva')  //true
    
    mySet.has('siva') //false
    mySet.size //0
    ```

## Set.prototype.clear()
> 用来清空一个Set对象中的所有元素

> mySet.clear()

```javascript
var mySet = new Set()
mySet.add(1).add('1')

mySet.size //2
mySet.has('1') //true

mySet.clear();

mySet.size //0
```

## 遍历器
> Set.prototype.keys() :  返回键名的遍历器
> Set.prototype.values()：返回键值的遍历器
> Set.prototype.entries(): 返回键值对的遍历器
> Set.prototype.forEach() :回调函数遍历

```javascript
var mySet = new Set(['s','i','v'])

for(let i of mySet.keys()){
console.log(i)
}
// s
// i
// v

for(let i of mySet.values()){
console.log(i)
}

// s
// i
// v

for(let i of mySet.entries()){
console.log(i)
}
// ['s','s']
// ['i','i']
// ['v','v']


var otherSet = mySet.entries();
otherSet.next().value // ['s','s']
otherSet // {'i','v'}
otherSet.next().value //['i','i']
otherSet // {'v'}
otherSet.next().value //['v','v']
otherSet // {}
mySet.entries(); // {"s", "i", "v"}
```

## Set.prototype.forEach()
> forEach 方法根据集合中元素的顺序，对每个元素都执行提供的 callback 函数一次。

> mySet.forEach(callback[, thisArg])

> 已经被删除的元素，它是不会执行的，但是，undefined,null会执行

* 参数 callback 遍历的每个元素都会执行的函数
* callback中有三个参数,第一个为键值,第二个为键名,第三个为set对象
* thisArg 当执行callback的时候,this的指向

	```javascript
    function callback(value,key,set){
    	console.log(value,key,set)
    }
    new Set(['siva','hello',undefined,null]).forEach(callback)
    // siva siva  {"siva", "hello", undefined, null}
	// hello hello  {"siva", "hello", undefined, null}
	// undefined undefined  {"siva", "hello", undefined, null}
	// null null {"siva", "hello", undefined, null}
    ```
    
## Set的一些用法

```javascript
let arr1 = [1,2,3,4,5];
let arr2 = [4,5,6,7,8];
let a = new Set(arr1);
let b= new Set(arr2)
```
* 数组去重&并集

	```javascript
    new Set([...arr1,...arr2]) //{1,2,3,4,5,6,7,8}
    let arr3 = [...new Set([...arr1,...arr2])] //[1,2,3,4,5,6,7,8]
    ```
* 交集

	```javascript
    let arr3 = new Set(arr1.filter(x=>b.has(x))) //{4,5}
    ```
* 差集

	```javascript
    let arr3 = new Set(arr1.filter(x=>!b.has(x))) //{1,2,3}
    let arr4 = new Set(arr2.filter(x=>!a.has(x))) //{6,7,8}
    [...arr3,...arr4] //[1,2,3,6,7,8]
    ```
    
## Weakset
> WeakSet 对象允许你将弱保持对象存储在一个集合中,其中的每个对象值都只能出现一次.

> 无size属性,且WeakSet对象不可被遍历枚举;只能存储对象,不可放入字符串,数字等数据类型

> 方法有 WeakSet.prototype.add(value) / WeakSet.prototype.delete(value) / WeakSet.prototype.has(value)