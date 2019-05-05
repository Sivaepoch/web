<?php

//砍价
Route::group('xmarkt',function()
{
    Route::post('add_vist', 'markt/Api/addVist');
    Route::post('judge_user', 'markt/Api/getKjUser');
    Route::post('help_list', 'markt/Api/helpList');
    Route::post('join_kj', 'markt/Api/joinKj');
    Route::post('help_kj', 'markt/Api/helpKj');
    Route::post('buynow', 'markt/Api/buyNow');
    Route::post('pay','markt/Api/pay');
    Route::post('unpay','markt/Api/unPay');
    Route::post('user_kj','markt/Api/getUserKj');

    Route::post('kj_order','markt/Api/KjOrder');
    Route::post('get_inger','markt/Api/getInger');

})->middleware('Xuser');


Route::group('markt',function()
{
    Route::post('get_kjnum','markt/Goods/judgeUser');
    Route::post('kj_judge','markt/Goods/judgeBargain');
	Route::group('bargain', function() {
	    Route::get('active', 'markt/Goods/getActive');
	    Route::get('drawPrize', 'turntable/TurnTableWap/drawPrize');
	    Route::get('order_list', 'markt/Goods/orderList');
	    Route::get('middleRecord', 'turntable/TurnTableWap/middleRecord');
	    Route::get('share', 'turntable/TurnTableWap/share');
	    Route::get('recordDetail', 'turntable/TurnTableWap/recordDetail');
	});
});




