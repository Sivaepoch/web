<?php

/**
 * @Author: brooke
 * @Date:   2018-10-16 17:35:49
 * @Last Modified by:   pigcms
 * @Last Modified time: 2018-12-24 14:47:06
 */
Route::group('agent', function () {
    Route::group('api', function () {
        Route::post('login', 'agent/auth/postLogin');
        Route::post('logout', 'agent/auth/logout');
        Route::get('get_info', 'agent/agent/getInfo');

        Route::group('auth', function () {
            Route::get('bill/get_applet', 'agent/bill/getApplet');
            Route::get('bill/config', 'agent/bill/config');
            Route::get('bill/get_apply', 'agent/bill/getApply');
            Route::get('agent/survey', 'agent/agent/survey');
            Route::get('customer/check_phone', 'agent/customer/checkPhone');
            Route::resource('balance', 'agent/Balance');
            Route::resource('customer', 'agent/Customer');
            Route::resource('bill', 'agent/Bill');
            Route::resource('agent', 'agent/Agent');
            Route::resource('sales', 'agent/Sales');
            Route::resource('sales/:id', 'agent/Sales');
            Route::resource('profits', 'agent/Profits');
            Route::get('fanyong', 'agent/Profits/fanyong');
        })->middleware('Auth', 'agent');
    });
});
