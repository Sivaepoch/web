<?php

/**
 * @Author: brooke
 * @Date:   2019-01-16 14:49:51
 * @Last Modified by:   brooke
 * @Last Modified time: 2019-04-22 17:05:41
 */

use app\briefed\model\enums\InformationCollects;

//内容资讯
Route::group('briefed',function(){
    //用户端 页面渲染
    Route::group('user',function(){
        //公众号授权
        Route::get('material/source_bind_url','briefed/Materials/sourceBindUrl');
    });

    //接口
    Route::group('api',function(){
        //用户端
        Route::group('user',function(){
            //通过链接搜索
            Route::get('material/link_search','briefed/Materials/linkSearch');

            //素材库
            Route::resource('material','briefed/Materials')->only(['index', 'save', 'delete']);

            //批量删除文章
            Route::post('material/delete_multiple', 'briefed/Materials/deleteMultiple');

            //更新公众号文章
            Route::get('source/update_source_articles', 'briefed/Sources/updateSourceArticles');

            //获取作者信息
            Route::get('authors/read', 'briefed/Authors/read');

            //作者
            Route::resource('authors', 'briefed/Authors')->only(['save', 'index', 'delete']);

            //文章来源
            Route::resource('sources', 'briefed/Sources')->only(['index', 'save', 'delete']);

            //栏目
            Route::resource('columns', 'briefed/Columns')->only(['index', 'read', 'save', 'delete']);

            //配置
            Route::resource('configs', 'briefed/Configs')->only(['index', 'save']);

            //批量删除评论
            Route::post('replys/delete_multiple', 'briefed/Replys/deleteMultiple');

            //批量通过评论
            Route::post('replys/update_multiple', 'briefed/Replys/updateMultiple');

            //评论
            Route::resource('replys', 'briefed/Replys')->only(['index', 'save', 'update', 'delete']);

            //文章
            Route::resource('articles', 'briefed/Articles');

            //批量删除文章
            Route::post('articles/delete_multiple', 'briefed/Articles/deleteMultiple');

            //嵌入公众号文章
            Route::post('articles/embed_article', 'briefed/Articles/embedArticle');

            //单文章评论
            Route::get('articles/:id/replys', 'briefed/Articles/replys');

            //素材库选入
            Route::post('material/election', 'briefed/Materials/election');

            //获取群发模板消息次数
            Route::get('articles/get_pushed_template_degree', 'briefed/Articles/getPushedTemplateDegree');

            //新文章群发模板消息
            Route::post('articles/push_template_msg', 'briefed/Articles/pushTemplateMsg');

            //获取腾讯视频真实URL
            Route::get('material/link_real_tx_video_url', 'briefed/Materials/linkRealTxVideoUrl');

        })->middleware('Auth','user');

        //手机端
        Route::group('web',function(){
            //获取配置
            Route::get('configs','\app\briefed\wap_controller\Configs@index');

            //获取分类列表
            Route::get('columns','briefed/Columns/index');

            //文章列表
            Route::get('articles', '\app\briefed\wap_controller\Articles@index');

            //专栏文章列表
            Route::get('column/articles', '\app\briefed\wap_controller\Articles@columnArticles');

            //收藏列表
            Route::get('collects', '\app\briefed\wap_controller\Collects@index');

            //收藏
            Route::post('collects', '\app\briefed\wap_controller\Collects@update')->option(['type' => InformationCollects::INFORMATION_TYPE]);

            //文章评论列表
            Route::get('article/:id/replys','\app\briefed\wap_controller\Articles@replys');

            //阅读完一篇文章
            Route::get('article/:id/reading', '\app\briefed\wap_controller\Articles@readingFinished');

            //文章详情
            Route::get('article/:id', '\app\briefed\wap_controller\Articles@read');

            //文章详情(为了支持点击事件)
            Route::post('article/:id', '\app\briefed\wap_controller\Articles@read');

            //评论点赞
            Route::post('fabulous','\app\briefed\wap_controller\Fabulous@update');

            //评论
            Route::post('replys', '\app\briefed\wap_controller\Replys@save');

            //删除评论
            Route::delete('replys/:id','briefed/Replys/delete');

            //关注作者
            Route::post('authors/collects', '\app\briefed\wap_controller\Collects@update')->option(['type' => InformationCollects::INFORMATION_AUTHOR_TYPE]);

            //作者的文章和详情
            Route::get('authors/:id', '\app\briefed\wap_controller\Authors@read');

            //我关注的作者
            Route::get('authors', '\app\briefed\wap_controller\Authors@index');
        })->middleware('Xuser');
    });
});