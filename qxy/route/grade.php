<?php
/**
 * Created by PhpStorm.
 * User: pigcms
 * Date: 2019/3/27
 * Time: 14:02
 */

Route::group('user', function () {
    Route::get('grade/index/:apply_id','user/Garde/index');
    Route::post('grade/update','user/Garde/update');
    Route::get('grade/worklist','user/Garde/worklist');
})->middleware('Auth', 'user');

Route::group('xuser',function(){
   Route::group('grade',function(){
       Route::get('rule','markt/Grade/userGrade');
       Route::get('user_log','markt/Grade/userLog');
   }) ;
})->middleware('Xuser');

