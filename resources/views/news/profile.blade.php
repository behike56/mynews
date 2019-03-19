<!DOCTYPE html>
<html>
    <head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>MyNews</title>
    </head>
    
    <body>

	@extends('layouts.front')
	@section('title', '管理者情報')

	@section('content')
	    <div class="container">
		<div class="row">
		    <h2>管理者情報</h2>
		</div>
		
		<div class="row">
		    <div class="posts col-md-8 mx-auto mt-3">
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
