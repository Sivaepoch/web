<?php
/**
 * Created by PhpStorm.
 * User: pigcms
 * Date: 2019/2/20
 * Time: 10:34
 */
Route::group('user', function () {
    Route::group('custom',function(){
        Route::get('status/:id', 'user/Customshop/status');
        Route::get('index','user/Customshop/shopList');
        Route::get('delete/:id','user/Customshop/delete');
        Route::post('alldelete','user/Customshop/alldelete');
        Route::post('create','user/Customshop/create');
        Route::get('getgoods','user/Customshop/read');
        Route::get('getads','user/Customshop/getAds');
        Route::post('saveadds','user/Customshop/addAds');
        Route::post('editstatus','user/Customshop/editstatus');
        Route::post('allonline','user/Customshop/allonline');
    });
    Route::group('interorder',function(){
        Route::get('index','user/Integralorder/index');
        Route::post('cancel_order','user/Integralorder/delete');
        Route::get('order_desc','user/Integralorder/read');
        Route::get('delivery','user/Integralorder/update');
        Route::get('get_delay','user/Integralorder/getDelay');
    });

    //签到积分设置
    Route::group('intesign',function(){
       Route::get('index/:apply_id','user/Setintegral/index');
       Route::post('setsystem','user/Setintegral/setsystem');
       Route::post('delsign','user/Setintegral/delsign');
       Route::get('signlist','user/Setintegral/userSign');
       Route::post('update','user/Setintegral/update');
       Route::post('editstatus','user/Setintegral/editstatus');
       Route::get('status/:apply_id','user/Setintegral/status');
    });
    //积分任务
    Route::get('work/worklist','user/Setintegral/worklist');

})->middleware('Auth','user');
Route::resource('interorder','user/Integralorder');
//小程序积分商城接口
Route::group('integrshop',function(){
   Route::get('list','markt/Interorder/index');
   Route::get('goods','markt/Interorder/goods');
   Route::post('buy_now','markt/Interorder/buyNow');
   Route::get('orderlist','markt/Interorder/orderList');
   Route::get('ads','markt/Interorder/ads');
})->middleware('Xuser');
//签到
Route::group('sign',function(){
    Route::post('sign_in','markt/Singdesk/signIn');
    Route::get('sign_log','markt/Singdesk/signLog');
    Route::get('userstae','markt/Singdesk/userState');
    Route::get('worklist','markt/Singdesk/workList');
    Route::get('judge_status','markt/Singdesk/judge');
    Route::get('get_rule','markt/Singdesk/getRule');
})->middleware('Xuser');

