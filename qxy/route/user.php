<?php
Route::group('user',function(){
	Route::resource('userinfo', 'user/Userinfos');
    Route::get('userdetail/:id','user/Userinfos/getUser');
    Route::get('userlog','user/Userinfos/userLog');
    Route::post('editinter','user/Userinfos/editInter');
    Route::post('edit_tag','user/Userinfos/editTag');
    Route::post('mall_edit_user','user/Userinfos/editUser');
    Route::post('sysetmuser/edit','user/Appletuser/edit');
})->middleware('Auth','user');

Route::get('sysetmuser/index','user/Appletuser/index');
Route::get('sysetmuser/bindlist','user/Appletuser/bindApplet');

Route::group('user',function(){
    Route::group('pushed',function(){
        Route::get('read/[:id]','user/Pushed/read');
        Route::get('promptly_pushed','user/Pushed/promptlyPushed');
    });
	Route::resource('pushed', 'user/Pushed');

    Route::group('page',function(){
        Route::get('pages','user/Page/pages');
        Route::get('homepage','user/Page/homepage');
    });

    //门店相关
    Route::group('store',function(){
        //分部
        Route::get('branchs','user/Store/getBranchs');
        Route::get('branch/[:id]','user/Store/getBranch');
        Route::post('branch','user/Store/postBranch');
        Route::delete('branch/:id','user/Store/deleteBranch');

        //员工
        Route::get('staffs','user/Store/getStaffs');
        Route::get('staff','user/Store/getStaffInfo');
        Route::get('staff_qrcode','user/Store/getStaffBindQrcode');
        Route::post('staff','user/Store/postStaff');
        Route::delete('staff/:id','user/Store/deleteStaff');

        //角色
        Route::get('role', 'user/Store/getRole');
    });
    //设置用户标签
    Route::get('user_lable','user/UserLabel/userLabel');
    Route::post('set_user_lable','user/UserLabel/setUserLable');
    Route::get('getlist','user/UserLabel/getlist');
    Route::post('set_new_label','user/UserLabel/setNewLabel');
    Route::post('edit_label','user/UserLabel/editLabel');
    Route::post('del_label','user/UserLabel/delLabel');
})->middleware('Auth','user');




