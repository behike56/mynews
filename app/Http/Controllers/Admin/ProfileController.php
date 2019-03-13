<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Profile;

use App\Myhistory;

use Carbon\Carbon;

class ProfileController extends Controller{

    /**
     *プロフィール作成画面へ遷移
     * @return view('admin.news.create')
     **/
    public function add(){
	return view('admin.profile.create');
    }

    /**
     * プロフィール作成・保存機能
     * DB mynews.profile
     * @parameter (Request $request)
     * @return 	redirect('admin/news')
     **/
    public function create(Request $request){

	// Varidationを行う
	$this->validate($request, Profile::$rules);

	$profile = new Profile;
	$data = $request->all(); 

	// データベースに保存する
	$profile->fill($data);
	$profile->save();
	
	
	return redirect('admin/profile');
    }

    /**
     * プロフィール情報の表示機能
     * @parameter (Request $request)
     * @return ('admin.news.profile', 
     * @return ['posts' => $posts, 'user_name' => $user_name])
     **/
    public function mypage(Request $request){
	$user_name = $request->name;
	if ($user_name != '') {
            // 検索されたら検索結果を取得する
            $posts = Profile::where('name', $user_name)->get();
	} else {
            // それ以外はすべてのニュースを取得する
            $infos = Profile::all();
	}
	
	return view('admin.profile.mypage', ['infos' => $infos, 'user_name' => $user_name]);
    }
    

    public function edit(Request $request)
    {
	$profile = Profile::find($request->id);

	return view('admin.profile.edit', ['profile_form' => $profile]);
    }


    /**
     * 編集画面から送信されたデータで上書きする（更新）
     **/
    public function update(Request $request){
	
	// Validationをかける
	$this->validate($request, Profile::$rules);
	
	// Profile Modelからデータを取得する
	$profile = Profile::find($request->id);

	// 送信されてきたフォームデータを格納する
	$profile_form = $request->all();
	unset($profile_form['_token']);
	
	// 該当するデータを上書きして保存する
	$profile->fill($profile_form)->save();

	//変更履歴の記録
	$myhistory = new Myhistory;
        $myhistory->user_id = $profile->id;
        $myhistory->edited_at = Carbon::now();
        $myhistory->save();

	return redirect('admin/profile');
    }

    /**
     * ユーザーの削除機能
     * @return redirect('admin/profile')
     **/
    public function delete(Request $request){
	// 該当するPrifle Modelを取得
	$profile = Profile::find($request->id);
	// 削除する
	$profile->delete();
	return redirect('admin/profile');
    }
}
