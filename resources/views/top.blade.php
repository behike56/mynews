<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
         html, body {
             background-color: #fff;
             color: #636b6f;
             font-family: 'Nunito', sans-serif;
             font-weight: 200;
             height: 100vh;
             margin: 0;
         }

         .full-height {
             height: 100vh;
         }

         .flex-center {
             align-items: center;
             display: flex;
             justify-content: center;
         }
p
         .position-ref {
             position: relative;
         }

         .top-right {
             position: absolute;
             right: 10px;
             top: 18px;
         }

         .content {
             text-align: center;
         }

         .title {
             font-size: 84px;
         }

         .links > a {
             color: #636b6f;
             padding: 0 25px;
             font-size: 13px;
             font-weight: 600;
             letter-spacing: .1rem;
             text-decoration: none;
             text-transform: uppercase;
         }

         .m-b-md {
             margin-bottom: 30px;
         }

	 table {
	     border: 1px #000000 ridge;
	     background-color: #d3d3d3;
	 }

	 td {
	     border: 1px #000000 outset;
	     background-color: #778899;
	     padding: 2px 2px;
	 }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                    <a href="{{ url('/home') }}">Home</a>
            @else
                    <a href="{{ route('login') }}">投稿者-ログイン</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}">投稿者-登録</a>
                    @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    My News
                </div>

                <div class="links">
		    <table>
			<thead>
			    <tr>
				<th>ゲスト用ページ</th>
				<th>投稿者用ページ</th>
			    </tr>
			</thead>
			<tbody>
			    <tr>
				<td>
				    <a href="{{url('/index')}}">記事を見る</a>
				</td>
				<td>
				    <a href="{{url('/admin/news/create')}}">記事作成</a>
				</td>
			    </tr>
			    <tr>
				<td>
				    <a href="{{url('/profile')}}">投稿者のプロフィールを見る</a>
				</td>
				
				<td>
				    <a href="{{url('/admin/profile/create')}}">プロフィール作成＆編集</a>
				</td>
			    </tr>
			    <tr>
				<td></td>
				<td>
				    <a href="{{url('/admin/news')}}">記事の編集</a>
				</td>
			    </tr>
                    </table>
                </div>
            </div>
        </div>
    </body>
</html>
