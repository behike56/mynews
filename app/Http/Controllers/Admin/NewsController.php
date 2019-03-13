<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\News;

class NewsController extends Controller{
    
    /**
     *記事作成画面へ遷移
     * @return view('admin.news.create')
     **/
    public function add()
    {
	return view('admin.news.create');
    }

    /**
     * 記事作成・保存機能
     * DB mynews.news
     * @parameter (Request $request)
     * @return 	redirect('admin/news')
     **/
    public function create(Request $request)
    {
	// Varidationを行う
	$this->validate($request, News::$rules);

	$news = new News;
	$form = $request->all();

        // フォームから画像が送信されてきたら、
	//保存して、$news->image_path に画像のパスを保存する
	if (isset($form['image'])) {
            $path = $request->file('image')->store('public/image');
            $news->image_path = basename($path);
	} else {
            $news->image_path = null;
	}

	// フォームから送信されてきた_tokenを削除する
	unset($form['_token']);
	// フォームから送信されてきたimageを削除する
	unset($form['image']);

	// データベースに保存する
	$news->fill($form);
	$news->save();
	
	// 記事作成後は記事一覧画面へ遷移する
	return redirect('admin/news');
    }

    /**
     * 記事一覧表示の機能と画面
     * @parameter (Request $request)
     * @return ('admin.news.index', 
     * @return ['posts' => $posts, 'cond_title' => $cond_title])
     **/
    public function index(Request $request)
    {
	$cond_title = $request->cond_title;
	if ($cond_title != '') {
            // 検索されたら検索結果を取得する
            $posts = News::where('title', $cond_title)->get();
	} else {
            // それ以外はすべてのニュースを取得する
            $posts = News::all();
	}
	return view('admin.news.index', ['posts' => $posts, 'cond_title' => $cond_title]);
    }

    public function edit(Request $request)
    {
	// News Modelからデータを取得する
	$news = News::find($request->id);
	if (empty($news)) {
            abort(404);    
	}
	return view('admin.news.edit', ['news_form' => $news]);
    }


    /**
     * 編集画面から送信されたデータで上書きする（更新）
     **/
    public function update(Request $request)
    {
	// Validationをかける
	$this->validate($request, News::$rules);
	
	// News Modelからデータを取得する
	$news = News::find($request->id);
	
	// 送信されてきたフォームデータを格納する
	$news_form = $request->all();
	
	if (isset($news_form['image'])) {
            $path = $request->file('image')->store('public/image');
            $news->image_path = basename($path);
            unset($news_form['image']);
	} elseif (isset($request->remove)) {
            $news->image_path = null;
            unset($news_form['remove']);
	}
	
	unset($news_form['_token']);
	
	// 該当するデータを上書きして保存する
	$news->fill($news_form)->save();

	return redirect('admin/news');
    }


    /**
     * 記事の削除機能
     * @return redirect('admin/news/')
     **/
    public function delete(Request $request){
	// 該当するNews Modelを取得
	$news = News::find($request->id);
	// 削除する
	$news->delete();
	return redirect('admin/news/');
    }
}
