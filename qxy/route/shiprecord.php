<?php
/**
 * Created by PhpStorm.
 * User: pigcms
 * Date: 2019/4/24
 * Time: 9:53
 */
Route::group('user',function(){
   Route::group('vertail',function(){
      Route::get('detail','shipcord/Verificat/detail');
      Route::post('cancel','shipcord/Verificat/cancel');
      Route::get('log','shipcord/Verificat/shipLog');
   });
});