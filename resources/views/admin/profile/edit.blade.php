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
	@section('title', 'プロフィールの編集')

	@section('content')
	    <div class="container">
		<div class="row">
		    <div class="col-md-8 mx-auto">
			<h2>プロフィール編集</h2>
			<form action="{{ action('Admin\ProfileController@update') }}" method="post" enctype="multipart/form-data">
			    @if (count($errors) > 0)
				<ul>
				    @foreach($errors->all() as $e)
					<li>{{ $e }}</li>
				    @endforeach
				</ul>
			    @endif
			    <div class="form-group row">
				<label class="col-md-2" for="name">氏名</label>
				<div class="col-md-10">
				    <input type="text" class="form-control" name="name" value="{{ $profile_form->name  }}">
				</div>
			    </div>

			    <div class="form-group row">
				<label class="col-md-2" for="gender">性別</label>
				<div class="col-md-10">
				    <input name="gender" type="radio" value="男性">男性<br />
				    <input name="gender" type="radio" value="女性">女性
				</div>
			    </div>

			    <div class="form-group row">
				<label class="col-md-2" for="hobby">趣味</label>
				<div class="col-md-10">
				    <input type="text" class="form-control" name="hobby"  rows="5" value="{{ $profile_form->name }}">
				</div>
			    </div>
			    
			    <div class="form-group row">
				<label class="col-md-2" for="introduction">自己紹介</label>
				<div class="col-md-10">
				    <textarea class="form-control" name="introduction" rows="10">{{ $profile_form->introduction }}</textarea>
				</div>
			    </div>
			    <input type="hidden" name="id" value="{{ $profile_form->id }}">
			    {{ csrf_field() }}
			    <input type="submit" class="btn btn-primary" value="更新">
		    </div>
		</div>
			</form>
			<div class="row mt-5">
			    <div class="col-md-4 mx-auto">
				<h2>変更履歴</h2>
				<ul class="list-group">
				    @if ($profile_form->myhistories != NULL)
					@foreach ($profile_form->myhistories as $myhistory)
					    <li class="list-group-item">{{ $myhistory->edited_at }}</li>
					@endforeach
				    @endif
				</ul>
			    </div>
			</div>
	    </div>
	    </div>
	    </div>
	@endsection

    </body>
</html>
