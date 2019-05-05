<?php
//需要用户信息
Route::group('xmall', function () {
    Route::post('cartadd', 'mall/xapi.cart/add');
    Route::post('cartlist', 'mall/xapi.cart/getcartLit');
    Route::post('carteditnum', 'mall/xapi.cart/editNum');
    Route::post('carteditsku', 'mall/xapi.cart/editCart');
    Route::post('delcart', 'mall/xapi.cart/delCart');
    Route::post('buynow', 'mall/xapi.Order/buyNow');
    Route::post('ordercart', 'mall/xapi.Order/cart');
    Route::post('cartnum', 'mall/xapi.cart/getNum');
    //地址相关
    Route::group('address', function () {
        Route::post('list', 'mall/xapi.Address/lists');
        Route::post('add', 'mall/xapi.Address/add');
        Route::post('detail', 'mall/xapi.Address/detail');
        Route::post('edit', 'mall/xapi.Address/edit');
        Route::post('defult', 'mall/xapi.Address/setDefault');
        Route::post('delete', 'mall/xapi.Address/delete');
    });

    //订单列表
    Route::group('order', function () {
        Route::post('buynow', 'mall/xapi.Order/buyNow');
        Route::post('cart', 'mall/xapi.Order/cart');
        Route::post('lists', 'mall/xapi.Order/lists');
        Route::post('refund', 'mall/xapi.Order/lists');
        Route::post('refundmsg', 'mall/xapi.Order/refundList');
        Route::post('notpay', 'mall/xapi.Order/notPay');
        Route::post('unrecegoods', 'mall/xapi.Order/unreceivedGoods');
        Route::post('unclogood', 'mall/xapi.Order/UnshipGoods');
        Route::post('finish', 'mall/xapi.Order/finish');
        Route::post('close', 'mall/xapi.Order/closeOrder');
        Route::post('detail', 'mall/xapi.Order/detail');
        Route::post('reviceorder', 'mall/xapi.Order/reviceOrder');
        Route::post('unpay', 'mall/xapi.Order/unPay');
        Route::post('ordernum', 'mall/xapi.Order/getOrderNum');
    });
    //地区列表
    Route::post('region', 'mall/xapi.Address/region');
    //添加浏览用户
    Route::post('vist/add', 'mall/xapi.Vist/add');
    // 小程序订单导航
    Route::get('tab_list', 'mall/xapi.Order/tabList');
    //绑定手机号
    Route::post('bind_tel', 'swechat/Swechat/bindTel');
    //获取积分记录
    Route::post('user_log', 'swechat/Swechat/userLog');
})->middleware('Xuser');

//小程序支付和登陆
Route::group('swechat', function () {
    Route::get('login', 'swechat/Swechat/login');
    Route::get('info', 'swechat/Swechat/getInfo');
});

//首页不需要用户信息
Route::group('sxmall', function () {
    Route::post('goodslist', 'mall/xapi.Goods/goodsList');
    Route::post('goodgoods', 'mall/xapi.Goods/goodGoods');
    Route::post('hotgoods', 'mall/xapi.Goods/hotGoods');
    Route::post('configlist', 'mall/xapi.Goods/configList');
    Route::post('goodsdesc', 'mall/xapi.Goods/goodsdesc');
    Route::post('judgegoods', 'mall/xapi.Goods/judgeGoods');
    Route::post('judgecate', 'mall/xapi.Goods/judgeCate');
    Route::post('category', 'mall/xapi.Goods/category');
    Route::post('catetoGoods', 'mall/xapi.Goods/catetoGoods');
    //砍价回调地址
    Route::post('bar_notify', 'mall/xapi.Pay/bar_notify');
    // 商城回调地址
    Route::post('pay_notify', 'mall/xapi.Pay/pay_notify');
    // 拼团回调地址
    Route::post('pintuan_notify', 'mall/xapi.Pay/pintuan_notify');
    //加入社区回调地址
    Route::post('forum_notify', 'mall/xapi.Pay/forum_notify');
    //积分商城支付回调地址
    Route::post('inter_notify','mall/xapi.Pay/integral_notify');
});

Route::group('smprogram', function () {
    //大转盘
    Route::group('waptable', function () {
        Route::get('record', 'turntable/TurnTableWap/record');
        Route::get('drawPrize', 'turntable/TurnTableWap/drawPrize');
        Route::get('wapIndex', 'turntable/TurnTableWap/wapIndex');
        Route::get('middleRecord', 'turntable/TurnTableWap/middleRecord');
        Route::get('share', 'turntable/TurnTableWap/share');
        Route::post('exists', 'turntable/TurnTableWap/exists');
        Route::get('recordDetail', 'turntable/TurnTableWap/recordDetail');

    });

})->middleware('Xuser');
Route::get('sysetmuser/menu','user/Appletuser/appletMune')->middleware('Xuser');

//拼团
Route::get('CollageWap/index', 'pintuan/PintuanWap/index');
Route::group('CollageWap', function () {
    Route::post('submitOrder', 'pintuan/PintuanWap/submitOrder');
    Route::get('goods_info', 'pintuan/PintuanWap/goods_info');
    Route::post('orderData', 'pintuan/PintuanWap/orderData');
    Route::post('getVeirfy', 'pintuan/PintuanWap/getVeirfy');
    Route::post('getFromid', 'pintuan/PintuanWap/getFromid');
})->middleware('Xuser');
Route::post('CollageWap/collageDetail', 'pintuan/PintuanWap/collageDetail');


Route::group('web',function(){
    Route::get('page/homepage','user/Page/homepage');
});
