<?php

Route::group('user', function () {
    Route::group('appline', function () {
        Route::get('index', 'user/AppLine/index');
        Route::get('list_ex_self', 'user/AppLine/contentListExSelf');
        Route::post('save', 'user/AppLine/save');
        Route::post('updateStatus', 'user/AppLine/updateStatus');
        Route::post('del', 'user/AppLine/del');
        Route::get('edit', 'user/AppLine/edit');
    });
})->middleware('Auth', 'user');

Route::group('user', function () {
    Route::group('applinesm', function () {
        Route::get('can_enter', 'user/AppLine/canEnter');
        Route::get('where_go', 'user/AppLine/whereGo');
        Route::post('del_ok', 'user/AppLine/delOk');
    });
// });
})->middleware('Xuser');
