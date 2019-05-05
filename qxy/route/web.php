<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------
\think\facade\Url::root('/index.php');

if (PHP_SAPI == 'cli') {
    \think\facade\Hook::listen('app_init');
}

use \app\handles\EditUserHandler;

Route::get('order', function () {
    //\think\facade\Hook::listen('payment_notice', 'A815197892312437');
});

Route::group('auth', function () {
    Route::post('login', 'auth/postLogin');
    Route::post('regist', 'auth/postRegist');
    Route::post('recover', 'auth/postRecover');
    Route::post('verify', 'auth/postGetVerify');
    Route::get('retrieve_validate', 'auth/getRetrieveValidate');
    Route::post('retrieve_password', 'auth/postRetrievePassword');
    Route::get('verifyimg/:rand', 'auth/getVerifyimg');
});

Route::post('user/services/pay_notify', 'Services/pay_notify');

Route::post('form/submit', 'Forms/submit');

Route::get('user/siteapp', 'user/siteapp/index');
Route::get('permissionsedfsef', 'user/UserLevel/getlevel');
Route::group('user', function () {
    Route::group('turn_table', function () {
        Route::get('verify', 'turntable/TurnTablePc/verify');
        Route::post('saveVerify', 'turntable/TurnTablePc/saveVerify');
    });
});
Route::group('user', function () {
    Route::rule('hello/:name', 'hello', 'post');

    Route::get('auth', function () {
        return json(resultArray(['data' => 'success']))->code('200');
    });

    Route::group('agent', function () {
        Route::get('info', 'agent/Agent/getInfoToUser');
    });

    Route::group('articles', function () {
        Route::get('list', 'articles/list');
        Route::get('top', 'articles/topandshow');
        Route::get('del', 'articles/del');
        Route::post('edit', 'articles/edit');
        Route::get('batchdel', 'articles/batchdel');
        Route::post('upload', 'articles/upload');
        Route::get('check', 'articles/check');
    });

    Route::group('cate', function () {
        Route::get('index', 'categorys/index');
        Route::get('catelist', 'categorys/catelist');
        Route::post('edit', 'categorys/edit');
        Route::get('del', 'categorys/del');
        Route::get('updownmove', 'categorys/updownmove');
        Route::get('batchdel', 'categorys/batchdel');
        Route::get('check', 'categorys/check');
    });

    Route::group('pro', function () {
        Route::get('index', 'products/index');
        Route::get('isshow', 'products/isshow');
        Route::get('del', 'products/del');
        Route::post('edit', 'products/edit');
        Route::get('batchdel', 'products/batchdel');
        Route::get('check', 'products/check');
    });

    Route::group('class', function () {
        Route::get('index', 'Classfys/index');
        Route::get('classlist', 'Classfys/classlist');
        Route::post('edit', 'Classfys/edit');
        Route::get('del', 'Classfys/del');
        Route::get('updownmove', 'Classfys/updownmove');
        Route::get('batchdel', 'Classfys/batchdel');
        Route::get('check', 'Classfys/check');
    });

    Route::group('instance', function () {
        Route::get('list', 'Instances/index');
        Route::get('isshow', 'Instances/isshow');
        Route::get('del', 'Instances/del');
        Route::post('edit', 'Instances/edit');
        Route::get('batchdel', 'Instances/batchdel');
        Route::post('upload', 'Instances/upload');
    });

    Route::group('kind', function () {
        Route::get('index', 'Kinds/index');
        Route::get('classlist', 'Kinds/classlist');
        Route::post('edit', 'Kinds/edit');
        Route::get('del', 'Kinds/del');
        Route::get('updownmove', 'Kinds/updownmove');
        Route::get('batchdel', 'Kinds/batchdel');
    });

    Route::group('services', function () {
        Route::get('service', 'Services/Service');
        Route::post('submit_order', 'Services/submit_order');
        Route::get('order', 'Services/ServiceOrder');
        Route::get('cancel', 'Services/CancelOrder');
        Route::post('pay', 'Services/Pay');
        Route::get('product', 'Services/product');
        Route::get('attribute', 'Services/attribute');
        Route::get('search', 'Services/search_order');
        Route::get('havebuy', 'Services/haveBuy');
        Route::get('test', 'Services/test');
        Route::get('revew', 'Services/revew');
        Route::get('cancelservice', 'Services/cancelService');
        Route::get('buytpl', 'Services/HasBuyTpl');
    });

    Route::group('img', function () {
        Route::get('group', 'Imgs/GroupList');
        Route::get('gallery', 'Imgs/gallery');
        Route::get('delgroup', 'Imgs/delGroup');
        Route::post('editgroup', 'Imgs/editGroup');
        Route::get('change', 'Imgs/changeGroup');
        Route::get('delpic', 'Imgs/delPic');
        Route::get('music', 'Imgs/Music');
        Route::post('upload', 'Imgs/upload');
    });

    Route::group('pagearticle', function () {
        Route::get('list', 'PageArticles/list');
        Route::post('add', 'PageArticles/add');
        Route::get('delete', 'PageArticles/delete');
        Route::get('navigation', 'PageArticles/BottomNavigation');
        Route::post('savenavigation', 'PageArticles/SaveNavigation');
    });

    Route::group('form', function () {
        Route::get('formdel', 'Forms/formdel');
        Route::get('formdata', 'Forms/formdata');
        Route::get('datadel', 'Forms/datadel');
        Route::get('export', 'Forms/export');
        Route::get('formlist', 'Forms/formlist');
    });

    Route::group('TurnTable', function () {
        Route::get('check', 'turntable/TurnTablePc/check');
        Route::get('index', 'turntable/TurnTablePc/index');
        Route::post('edit', 'turntable/TurnTablePc/edit');
        Route::post('upload', 'turntable/TurnTablePc/upload');
        Route::get('record', 'turntable/TurnTablePc/record');
        Route::get('del', 'turntable/TurnTablePc/del');
        Route::post('saveVerify', 'turntable/TurnTablePc/saveVerify');
        Route::get('verifyList', 'turntable/TurnTablePc/verifyList');
        Route::get('verify', 'turntable/TurnTablePc/verify');
    });

    Route::group('PintuanPc', function () {
        Route::get('index', 'pintuan/PintuanPc/index');
        Route::get('detail', 'pintuan/PintuanPc/detail');
        Route::get('order', 'pintuan/PintuanPc/order');
        Route::post('edit', 'pintuan/PintuanPc/edit');
        Route::get('orderDetail', 'pintuan/PintuanPc/orderDetail');
        Route::post('downline', 'pintuan/PintuanPc/downline');
        Route::get('delivery', 'pintuan/PintuanPc/delivery');
        Route::get('cancelOrder', 'pintuan/PintuanPc/cancelOrder');
        Route::get('getDelivery', 'pintuan/PintuanPc/getDelivery');
        Route::get('refundlog', 'pintuan/PintuanPc/refundLog');
    });
    Route::get('collage/refund', 'pintuan/PintuanPc/refund');

    Route::group('TemplateMsg', function () {
        Route::get('index', 'TemplateMsgs/index');
        Route::get('change_status', 'TemplateMsgs/change_status');
    });

    Route::group('MerchantInfo', function () {
        Route::get('index', 'MerchantInfos/index');
        Route::post('save', 'MerchantInfos/save');
        Route::get('PaySetData', 'MerchantInfos/paySetData');
        Route::post('PaySet', 'MerchantInfos/paySet');
        Route::post('upload', 'MerchantInfos/upload');
    });

    Route::group('pmsn', function () {
        Route::get('appcount', 'Permission/getAppCount');
    });

    Route::group('permissions', function () {
        Route::get('appcount', 'Permission/getAppCount');
        Route::get('app_status', 'Permission/getAppPermission');
    });

    Route::group('appcenter', function () {
        Route::get('menu_list', 'user/AppCenter/menuList');
        Route::get('app_details', 'user/AppCenter/appDetails');
        Route::get('app_list', 'user/AppCenter/appList');
    });

    Route::group('whole', function () {
        Route::get('list', 'user/Whole/wholeList');
        Route::get('detail_list', 'user/Whole/wholeDetailList');
        Route::get('detail', 'user/Whole/wholeDetail');
        Route::post('submit_order', 'user/Whole/submitOrder');
        Route::post('submit_shiyong', 'user/Whole/submitOrderAndService');
        Route::get('expire_list', 'user/Whole/expireList');
        Route::get('effective_list', 'user/Whole/effectiveService');
    });

    Route::group('apply', function () {
        Route::get('product', 'Apply/product');
        Route::get('goods', 'Apply/goods');
        Route::post('submit_order', 'Apply/submit_order');
        Route::get('haveBuy', 'Apply/haveBuy');
    });
    //临时
    Route::get('app/functional/:id', 'user/app/functional');
    Route::get('app/auditing/:id', 'user/app/auditing');
    Route::get('app/bind/:id/[:appid]', 'user/app/bind');
    Route::get('app/info/:id', 'user/app/info');
    Route::get('app/get_experience_qrcode/:id', 'user/app/get_experience_qrcode');
    Route::get('app/PaySetData', 'user/app/PaySetData');

    Route::post('app/PaySet', 'user/app/PaySet');

    Route::post('app/upload', 'user/app/upload');
    Route::get('app/send_code', 'user/app/send_code');
    Route::get('app/skip', 'user/app/getSkipPath');
    Route::get('app/:id', 'user/app/read');
    Route::put('app/:id', 'user/app/update');
    Route::post('app/delete', 'user/app/delete');
    Route::delete('app/:id', 'user/app/delete');
    Route::get('app', 'user/app/index');

    Route::get('app/send_code', 'user/app/send_code');

    Route::post('setPassword', 'auth/postSetPassword');

    Route::get('survey/applet/:apply_id', 'user/survey/applet');
    Route::get('survey/user_portrait/:apply_id', 'user/survey/user_portrait');
    Route::post('survey/information/:apply_id', 'user/survey/information');

    Route::resource('tester', 'user/Tester');

    Route::post('siteapp/apply', 'user/siteapp/apply');
    Route::post('siteapp/designer', 'user/siteapp/designer');
    Route::post('siteapp/read', 'user/siteapp/read');
    Route::resource('siteapp', 'user/Siteapp');

    Route::get('page/list/:tid', 'user/page/index');
    Route::get('page/clear/:id/:page_id', 'user/page/clear_data');
    Route::resource('page', 'user/Page');

    Route::resource('designer', 'user/Designer');

    Route::post('micro_stations/get_qrcode', 'user/MicroStations/get_qrcode');
    Route::get('micro_stations/designer', 'user/MicroStations/designer');
    Route::post('micro_stations/updateDesigner', 'user/MicroStations/update_designer');
    Route::resource('micro_stations', 'user/MicroStations');

    Route::resource('user_templates', 'user/UserTemplates');
    Route::resource('users', 'user/Users');
    Route::resource('payments', 'user/Payments');
    Route::get('wxapp/:method', 'user/wxapp/industry');

    //提现
    Route::resource('withdrawals', 'user/Withdrawals');

    //收益
    Route::resource('revenues', 'user/Revenues');

    //备份还原
    Route::post('backups/restore', 'user/backups/restore');

    //模板备份
    Route::resource('backups', 'user/Backups');



    Route::group('wxlogin', function () {
        Route::post('bindtel', 'wechat/login/bindtel');
        Route::post('identcode', 'wechat/login/send');
        Route::post('delbind', 'wechat/login/delbind');
    });


    Route::get('permission', 'user/UserLevel/getlevel');
    Route::post('userhead', 'user/UserLevel/userhead');


    Route::group('baidu', function () {
        Route::get('down', 'index/Baidu/down');
        Route::get('info', 'index/Baidu/getInfo');
    });


    Route::group('mall', function () {
        Route::get('index', 'mall/index/index');
        Route::get('goods_list', 'mall/api.Goods/goodsList');
        Route::get('goods_cate', 'mall/api.Goods/goodsCate');
        Route::get('goods_cate_save', 'mall/api.goods.Category/addSave');
        Route::get('goods_cate_edit', 'mall/api.goods.Category/edit');
        Route::get('goods_cate_edit_save', 'mall/api.goods.Category/editSave');
        Route::get('goods_cate_delete', 'mall/api.goods.Category/delete');
        Route::post('goods_add_save', 'mall/api.Goods/goodsAddSave');
        Route::get('goods_content', 'mall/api.Goods/goodsContent');
        Route::post('goods_content_save', 'mall/api.Goods/goodsContentSave');
        Route::get('goods_addspec', 'mall/api.goods.Spec/addSpec');
        Route::get('goods_addspecvalue', 'mall/api.goods.Spec/addSpecValue');
        Route::get('goods_edit', 'mall/api.Goods/goodsEdit');
        Route::post('goods_edit_save', 'mall/api.Goods/goodsEditSave');
        Route::get('goods_delete', 'mall/api.Goods/goodsDelete');
        Route::get('goods_config_edit', 'mall/api.MallConfig/edit');
        Route::post('goods_config_edit_save', 'mall/api.MallConfig/editSave');
        //商城用户信息
        Route::get('userlist','mall/api.User/lists');
        Route::get('userdetail','mall/api.User/detailUser');
        // 商场订单信息
        Route::get('orderlist','mall/api.Order/lists');
        Route::get('orderdetail','mall/api.Order/orderdetail');
        Route::get('editprice','mall/api.Order/editPrice');
        Route::get('pricelog','mall/api.Order/changePriceLog');
        Route::get('delivery','mall/api.Order/delivery');
        Route::get('expressList','mall/api.Order/expressList');
        //首页商品列表
        Route::get('newgoods','mall/api.Goods/newgoodsList');
        Route::get('goodgoods','mall/api.Goods/goodGoods');
        Route::get('hotgoods','mall/api.Goods/hotGoods');
        Route::get('judgegoods','mall/api.Goods/judgeGoods');
        Route::get('judgecate','mall/api.Goods/judgeCate');
        Route::get('refund','mall/api.Order/refund');
        Route::get('refundlog','mall/api.Order/refundLog');
        Route::get('celorder','mall/api.Order/cancelOrder');
        Route::get('getdelay','mall/api.Order/getDelay');
        //自动收货时间
        Route::get('edit_order_over','mall/api.MallConfig/editOrderOver');
        Route::get('save_order_over','mall/api.MallConfig/saveOrderOver');
        Route::get('grup_goods','mall/api.Goods/grupGoods');
    });
    //用户管理


    // 拼团相关
    Route::group('bargain',function(){
        Route::get('list','bargain/Index/lists');
        Route::get('join_user','bargain/Index/joinList');
        Route::get('help_user','bargain/Index/helpUserList');
        Route::get('judege_mall','bargain/Index/judegeMall');
        Route::get('goods_list','bargain/Index/getGoodsList');
        Route::get('bargain_desc','bargain/Index/getBargarinGoods');
        Route::post('add_bargarin','bargain/Index/addBargain');
        Route::get('order_list','bargain/Index/OrderList');
        Route::get('order_desc','bargain/Index/detial');
        Route::post('edit_line','bargain/Index/editLine');
        Route::post('edit_save','bargain/Index/editSave');
        Route::get('delivery','bargain/Index/delivery');
        Route::get('edit_order','bargain/Index/editOrder');
        Route::get('cancel_order','bargain/Index/cancelOrder');
        Route::get('get_delay','bargain/Index/getDelay');
        Route::get('refund','bargain/Index/refund');
        Route::post('edit_online','bargain/Index/editOnline');
        Route::get('refundlog','bargain/Index/refundLog');
    });

//    /**
//     * 获取核销信息
//     */
//    Route::group('shipcord',function(){
//        Route::get('detail','shipcord/Writeoff/detial');
//        Route::post('verify','shipcord/Writeoff/verify');
//        Route::get('lists','shipcord/Writeoff/verifyList');
//    });

    /**
     * 营销报名 核销
     * @update xin.min 20190327
     */
    Route::group('loreenlist',function(){
        Route::post('verify','lore/Backend/verifyEnlist');
    });


    /**
     * 公众号
     */
    Route::group('wesv',function(){
         Route::get('lists','wechat/Wechatsever/getList');
        Route::get('bind','wechat/Wechatsever/bind');
        Route::get('bindurl','wechat/Wechatsever/bindurl');
        Route::get('newlist','wechat/Wechatsever/newlist');
    });

    /**
     * 获取当前应用市场信息
     */
    Route::get('appcenter/info/:sign','user/AppCenter/centerinfo');


// })->middleware(['Auth:user', 'Permission']);
})->middleware(['Auth:user']);
Route::get('bargain/add_bargarin','bargain/Index/addBargain');
 //退款


Route::group('page', function () {
    Route::get('index', 'MicroStationPage/index');
    Route::get('article', 'MicroStationPage/article_list');
    Route::get('navigation', 'MicroStationPage/BottomNavigation');
    Route::get('all_article', 'MicroStationPage/all_article');
    Route::get('details', 'MicroStationPage/detail');
    Route::get('getCode', 'MicroStationPage/getCode');
    Route::get('jssdk', 'MicroStationPage/jssdk');
    Route::get('merchantInfo', 'MicroStationPage/merchantInfo');
    Route::get('exists', 'MicroStationPage/exists');
    Route::get('check', 'MicroStationPage/check');
});


Route::group('news', function () {
    Route::get('list', 'index/news/list');    //新闻列表
    Route::get('search', 'index/news/search');    //新闻列表
    Route::get('nlist', 'index/news/nlist');    //新闻列表
    Route::get('show', 'index/news/show');    //新闻内容
    Route::get('cate', 'index/news/cate');    //新闻类别

    Route::get('newlist', 'news/newlist');              //新闻列表
    Route::get('ajaxnew', 'index/news/ajaxnew');    //异步列表
    Route::get('smdirectory', 'news/smdirectory');//展示首页
    Route::get('newshow', 'news/newshow');        //新闻内容

});

Route::group('home', function () {
    Route::get('index', 'home/index');    //官网首页
    Route::get('appletshop', 'home/appletshop');    //小程序市场
    Route::get('appletshopdetail', 'home/appletshopdetail');    //小程序市场详情
    Route::get('appcenter', 'home/appcenter'); //应用中心
    Route::get('cooperation', 'home/cooperation'); //加盟合作
    Route::get('operationsSchool', 'home/operationsSchool'); //运营学院
});

Route::get('ptest', 'index/Permission/getExpiryTime');
Route::post('contact/index', 'index/contact/index');   //用户提交手机号

Route::get('think', function () {
    return 'hello,ThinkPHP5!';
});

Route::get('wechatlogin', 'wechat/login/login');
Route::get('wechatimg', 'wechat/login/getImg');
Route::post('wechatinfo', 'wechat/login/getInfo');

Route::get('express','mall/api.Order/expressList');

Route::get('hello/:name', 'index/hello');

Route::get('product','mall/api.Goods/product');
Route::get('mall/test','mall/api.Order/test');

Route::get('tmall/test','mall/xapi.Test/ceshi');
Route::get('catab/list','index/catab/order');

Route::post('save_error_logger', 'index/log/pageError');


Route::get('handle', EditUserHandler::class);

Route::group('user',function (){
    Route::group('shipcord',function(){
        Route::get('detail','shipcord/Writeoff/detial');
        Route::get('verify','shipcord/Writeoff/getDetail');
        Route::get('lists','shipcord/Writeoff/verifyList');
        Route::post('cancle','shipcord/Writeoff/verify');
    });
});


