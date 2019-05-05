<?php

Route::get('lore/index', 'lore/website/index');
Route::get('lore/api/qrcodeParams', 'lore/api/getQrcodeParams');
Route::post('lore/api/notify', 'lore/api/notify');
//知识付费 & 营销报名
Route::controller('lore/backend', 'lore/backend');
Route::controller('lore/api', 'lore/api')->middleware('Xuser');
//打卡
Route::controller('lore/backendcard', 'lore/backendcard');
Route::controller('lore/apicard', 'lore/apicard')->middleware('Student');
Route::controller('lore/apitcard', 'lore/apitcard')->middleware('Teacher');
Route::get('lore/apicard/week', 'lore/apicard/getWeek')->middleware('Xuser');
Route::get('lore/apicard/course', 'lore/apicard/getCourse')->middleware('Xuser');
Route::get('lore/apicard/homeworkLists', 'lore/apicard/getHomeworklists')->middleware('Xuser');
Route::get('lore/apicard/signinLists', 'lore/apicard/getSigninLists')->middleware('Xuser');
Route::get('lore/apicard/menu', 'lore/apicard/getMenu')->middleware('Xuser');
Route::get('lore/apicard/indexPath', 'lore/apicard/getIndexPath')->middleware('Xuser');
Route::post('lore/apicard/praise', 'lore/apicard/postPraise')->middleware('Xuser');
Route::post('lore/apicard/discuss', 'lore/apicard/postDiscuss')->middleware('Xuser');
Route::get('lore/apicard/TotalRank', 'lore/apicard/getTotalRank')->middleware('Xuser');
Route::controller('lore/upload', 'lore/upload')->middleware('Xuser');
//点赞活动
Route::controller('lore/backendlaud', 'lore/backendlaud');
Route::controller('lore/apilaud', 'lore/apilaud')->middleware('Xuser');

