<!DOCTYPE html>
<html>
    <head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>MyNews</title>
    </head>
    
    <body>

	@extends('layouts.profile')
	@section('title', '登録済みユーザーの一覧')

	@section('content')
	    <div class="container">
		<div class="row">
		    <h2>ユーザー一覧</h2>
		</div>
		<div class="row">
		    <div class="col-md-4">
			<a href="{{ action('Admin\ProfileController@add') }}" role="button" class="btn btn-primary">新規登録</a>
		    </div>
		    <div class="col-md-8">
			<form action="{{ action('Admin\ProfileController@mypage') }}" method="get">
			    <div class="form-group row">
				<label class="col-md-2">ユーザー名</label>
				<div class="col-md-8">
				    <input type="text" class="form-control" name="uer_name" value="{{ $user_name }}">
				</div>
				<div class="col-md-2">
				    {{ csrf_field() }}
				    <input type="submit" class="btn btn-primary" value="検索">
				</div>
			    </div>
			</form>
		    </div>
		</div>
		<div class="row">
		    <div class="list-news col-md-12 mx-auto">
			<div class="row">
			    <table class="table table-dark">
				<thead>
				    <tr>
					<th width="5%">ID</th>
					<th width="15%">名前</th>
					<th width="5%">性別</th>
					<th width="20%">趣味</th>
					<th width="35%">自己紹介</th>
				    </tr>
				</thead>
				<tbody>
				    @foreach($infos as $profile)
					<tr>
					    <th>{{ $profile->id }}</th>
					    <td>{{ str_limit($profile->name, 30) }}</td>
					    <td>{{ str_limit($profile->gender, 4) }}</td>
					    <td>{{ str_limit($profile->hobby, 30) }}</td>
					    <td>{{ str_limit($profile->introduction, 200) }}</td>
					    <td>
					    <div>
						<a href="{{ action('Admin\ProfileController@edit', ['id' => $profile->id]) }}">編集</a>
					    </div>
					    <div>
						<a href="{{ action('Admin\ProfileController@delete', ['id' => $profile->id]) }}">削除</a>
					    </div>
					    </td>
					</tr>
				    @endforeach
				</tbody>
			    </table>
			</div>
		    </div>
		</div>
	    </div>
	@endsection
	
    </body>
</html>
