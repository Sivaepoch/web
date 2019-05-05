<?php
Route::group('wesv', function () {
    //消息回复
    Route::post('messsage', 'wechat/Message/handlemsg');
    Route::post('click', 'wechat/Message/click');
    Route::post('subscribe', 'wechat/Message/subscribe');
    Route::post('unsubscribe', 'wechat/Message/unsubscribe');
});

// // 公众号授权
Route::group('user', function () {
    Route::group('wesv', function () {
        Route::get('lists', 'wechat/Wechatsever/getList');
        Route::get('bind', 'wechat/Wechatsever/bind');
        Route::get('bindurl', 'wechat/Wechatsever/bindurl');
        Route::post('addmune', 'wechat/Wechatsever/addmune');
        Route::post('upimg', 'wechat/Wechatsever/upimg');
        Route::get('power', 'wechat/Wechatsever/getpower');
        //图片上传
        Route::post('upload', 'wechat/Wechatsever/upload');
        Route::get('getwechat', 'wechat/Wechatsever/getWechat');
        Route::get('fodderist', 'wechat/Wechatsever/getFodderList');
        Route::post('setreply', 'wechat/Wechatsever/msgraply');
        Route::get('fodder', 'wechat/Wechatsever/fodder');
        Route::post('edit_fodder', 'wechat/Wechatsever/editFodder');
        Route::get('applet_list', 'wechat/Wechatsever/appletList');
        Route::get('get_fodder', 'wechat/Wechatsever/getFodder');
        Route::get('key_list', 'wechat/Wechatsever/getkeyList');
        Route::get('cate_list', 'wechat/Wechatsever/cateList');
        Route::post('add_cate', 'wechat/Wechatsever/addCate');
        Route::post('del_key', 'wechat/Wechatsever/deleKey');
        Route::post('del_fodder', 'wechat/Wechatsever/delFodder');
        Route::get('get_keywords', 'wechat/Wechatsever/keywords');
        Route::post('edit_keywords', 'wechat/Wechatsever/editKey');
        Route::post('set_menu', 'wechat/Wechatsever/setMenu');
        Route::get('get_menu', 'wechat/Wechatsever/menulist');
        Route::post('newupimg', 'wechat/Wechatsever/newupimg');
        Route::post('delwechat', 'wechat/Wechatsever/delWechat');
    });
})->middleware('Auth', 'user');
