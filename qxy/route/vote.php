<?php

Route::group('user', function () {
    Route::group('vote',function(){
        Route::get('index','vote/Index/index');
        Route::get('templist','vote/Index/templist');
        Route::get('detail','vote/Index/detail');
        Route::get('delvote','vote/Index/delvote');
        Route::get('custom','vote/Index/custom');
        Route::get('customdetail','vote/Index/customdetail');
        Route::get('delcustom','vote/Index/delcustom');
        Route::get('signup','vote/Index/signup');
        Route::get('delsignup','vote/Index/delsignup');
        Route::get('signupdetail','vote/Index/signupdetail');
        Route::get('records','vote/Index/records');
        Route::get('delrecords','vote/Index/delrecords');
        Route::post('savecustom','vote/Index/savecustom');
        Route::post('savevote','vote/Index/savevote');
        Route::post('savesignup','vote/Index/savesignup');
    });
})->middleware('Auth','user');

Route::group('user', function () {
    Route::group('vote',function(){
        Route::get('newdown','vote/Index/newdown');
    });
});

Route::group('user', function () {
    Route::group('voteweb',function(){
        Route::get('login','vote/Indexweb/login');
        Route::get('index','vote/Indexweb/index');
        Route::get('templist','vote/Indexweb/templist');
        Route::get('detail','vote/Indexweb/detail');
        Route::get('delvote','vote/Indexweb/delvote');
        Route::get('custom','vote/Indexweb/custom');
        Route::get('customdetail','vote/Indexweb/customdetail');
        Route::get('delcustom','vote/Indexweb/delcustom');
        Route::get('signup','vote/Indexweb/signup');
        Route::get('delsignup','vote/Indexweb/delsignup');
        Route::get('signupdetail','vote/Indexweb/signupdetail');
        Route::get('records','vote/Indexweb/records');
        Route::get('delrecords','vote/Indexweb/delrecords');
        Route::get('newdown','vote/Indexweb/newdown');
        Route::get('helpinfo','vote/Indexweb/helpinfo');
        Route::get('jssdkapi','vote/Indexweb/jssdkapi');
        Route::post('mediaapi','vote/Indexweb/mediaapi');
        Route::post('savecustom','vote/Indexweb/savecustom');
        Route::post('savevote','vote/Indexweb/savevote');
        Route::post('savesignup','vote/Indexweb/savesignup');
        Route::post('uploadimg','vote/Indexweb/uploadimg');
        Route::post('relevance','vote/Indexweb/relevance');
        Route::get('apps', 'vote/Indexweb/allapps');
        Route::get('getLevel', 'vote/Indexweb/getLevel');
        Route::get('delrelevance', 'vote/Indexweb/delrelevance');
    });
});//->allowCrossDomain()

Route::group('user', function () {
    Route::group('votesm',function(){
        Route::get('index','vote/Indexsm/index');
        Route::get('detail','vote/Indexsm/detail');
        Route::get('delvote','vote/Indexsm/delvote');
        Route::get('custom','vote/Indexsm/custom');
        Route::get('delcustom','vote/Indexsm/delcustom');
        Route::get('signup','vote/Indexsm/signup');
        Route::get('delsignup','vote/Indexsm/delsignup');
        Route::get('signupdetail','vote/Indexsm/signupdetail');
        Route::get('records','vote/Indexsm/records');
        Route::get('delrecords','vote/Indexsm/delrecords');
        Route::get('hasvote','vote/Indexsm/hasvote');
        Route::post('savecustom','vote/Indexsm/savecustom');
        Route::post('savevote','vote/Indexsm/savevote');
        Route::post('savesignup','vote/Indexsm/savesignup');
        Route::post('saverecord','vote/Indexsm/saverecord');
    });
})->middleware('Xuser');