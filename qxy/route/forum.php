<?php 
Route::group('user',function(){
	Route::group('forum',function(){
		Route::get('index','forum/Forums/index');
		Route::post('add','forum/Forums/create');
		Route::get('getdetial','forum/Forums/getdetial');
		Route::get('userlist','forum/Users/getList');
		Route::get('forumlist','forum/Forums/forumList');
		Route::get('lucre','forum/Incron/lists');
		Route::post('edituser','forum/Users/editUser');
		Route::get('judgeapp','forum/Forums/judgeapp');
		Route::post('edit','forum/Forums/update');
		Route::post('setowner','forum/Forums/setOwner');
		Route::get('forumuser','forum/Users/forumuser');
		Route::get('ads','forum/Forums/getads');
		Route::get('points','forum/Forums/getPoints');
		Route::post('editpoint','forum/Forums/editpoint');
		Route::post('addcustom','forum/Custom/create');
		Route::post('editcustom','forum/Custom/update');
		Route::get('getcustom','forum/Custom/getCustom');
		Route::get('down','forum/Forums/getDown');
		Route::get('getqrcode','forum/Forums/getqrcode');
		Route::get('checkown','forum/Forums/checkOwner');
		Route::post('editsort','forum/Forums/editSort');
        Route::get('grade','forum/Forums/getGrade');
        Route::post('editgrade','forum/Forums/editGrade');
        Route::get('def_cover','forum/Forums/defCover');
	});
})->middleware('Auth','user');

Route::group('forum',function(){
	Route::get('down','forum/Forums/getposter');
	Route::get('newdown','forum/Forums/newdown');
	Route::get('replycont','forum/Custom/replyCont');
	Route::get('judgeser','forum/ForumApi/judgeServer');
    Route::post('judgestatus','forum/ForumApi/judgeStatus');
});

Route::group('xuser',function(){
	Route::group('forum',function(){
		Route::get('list','forum/ForumApi/getList');
		Route::get('myforum','forum/ForumApi/userForum');
		Route::get('detail','forum/ForumApi/getForum');
		Route::post('join','forum/ForumApi/join');//免费参与
		Route::post('judge','forum/ForumApi/judgeUser');//判断用户是否已经参与了
		Route::post('pay','forum/ForumApi/pay');//付费参与
		Route::get('forum_user','forum/ForumApi/forumUser'); //当前社区参与的用户列表
		Route::get('pointslog','forum/ForumApi/getPointsLog');
		Route::post('setowner','forum/ForumApi/setForumOwner'); //小程序设置管理员
        Route::get('getrule','forum/ForumApi/getPointrule'); //小程序用户积分获取方式
        Route::post('judgestatus','forum/ForumApi/judgeStatus');
        //新增的功能
        Route::get('get_user','forum/ForumUser/getUser');
        Route::post('follow','forum/ForumUser/dofollow');
        Route::get('follow_list','forum/ForumUser/followList');
        Route::get('be_follow_list','forum/ForumUser/befollowList');
        //发送消息
        Route::post('send_msg','forum/ForumMessage/sendMessage');
        Route::get('msg_list','forum/ForumMessage/msgList');
        Route::get('get_msg','forum/ForumMessage/getMsg');
        Route::get('msg_num','forum/ForumMessage/messageNum');
        Route::get('search_user','forum/ForumApi/search');
        Route::get('get_top','forum/ForumApi/getTop');
        Route::post('add_view','forum/ForumApi/addview');
        Route::get('get_new','forum/ForumApi/getNew');

	});
    Route::get('getposter','forum/ForumPoster/getposter');
    Route::get('setposter','forum/ForumPoster/setposter');
    Route::get('userposter','forum/ForumPoster/userposter');

	Route::post('edituser','forum/ForumUser/editUser');
    Route::get('get_date','forum/ForumUser/getMonth');
    Route::get('user_label','forum/ForumUser/labelList');


})->middleware('Xuser');



Route::get('forum/get_location','forum/ForumUser/getLocation');
Route::get('forum/get_site','forum/ForumUser/getProvice');