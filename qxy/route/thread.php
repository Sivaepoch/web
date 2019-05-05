<?php

Route::group('user', function () {
    Route::group('thread',function(){
        Route::get('index','thread/Index/index');
        Route::get('classlist','thread/Index/classlist');
        Route::get('delcate','thread/Index/delcate');
        Route::post('changecate', 'thread/Index/changecate');
        Route::post('addthread','thread/Index/addthread');
        Route::get('changethread','thread/Index/changethread');
        Route::post('changethread', 'thread/Indexsm/changethread');
        Route::get('detail','thread/Index/detail');
        Route::post('threadreply','thread/Index/threadreply');
        Route::get('delreply','thread/Index/delreply');
        Route::post('changereport','thread/Index/changereport');
        Route::get('returnreport','thread/Index/returnreport');
        Route::get('delthread','thread/Index/delthread');
    });
});

Route::group('thread', function() {
	Route::group('indexsm',function(){
		Route::get('index','thread/Indexsm/index');
	    Route::get('classlist','thread/Indexsm/classlist');
	    Route::post('changethread', 'thread/Indexsm/changethread');
	    Route::post('changeoperation','thread/Indexsm/changeoperation');
        Route::post('addthread','thread/Indexsm/addthread');
        Route::post('threadreport','thread/Indexsm/threadreport');
        Route::post('readlink','thread/Indexsm/readlink');
        Route::get('detail','thread/Indexsm/detail');
        Route::get('replydetail','thread/Indexsm/replydetail');
        Route::post('threadreply','thread/Indexsm/threadreply');
        Route::get('personalcenter','thread/Indexsm/personalcenter');
        Route::get('mythread','thread/Indexsm/mythread');
        Route::get('delreply','thread/Indexsm/delreply');
        Route::get('received','thread/Indexsm/received');
        Route::get('upthread','thread/Indexsm/upthread');
        Route::get('allreply','thread/Indexsm/allreply');
        Route::post('uploadimg','thread/Indexsm/uploadimg');
    });
})->middleware('Xuser');