@extends('layouts.calendar')
@section('title', '僕の筋トレコーダー')

 @section('content')
  <body>
        <h1>筋トレlife</h1>
         @csrf
         <div class="col-md-4">
             <a href="{{ action('App\Http\Controllers\Admin\MyappController@add') }}" role="button" class="btn btn-primary">登録</a>
         </div>
          <div class="col-md-8">
              <a href="{{ action('App\Http\Controllers\Admin\MyappController@index') }}" role="button" class="btn btn-primary">一覧 </a> 
         </div>
         
         <div class="row" >
         <div class="col-6">
         <h2 class="mb-5"><a href= "{{action('App\Http\Controllers\Admin\MyappController@create_calendar',['ym'=>$prev])}}">{{$prev}} </a>&lt;
            {{$html_title}}&gt; <a href= "{{action('App\Http\Controllers\Admin\MyappController@create_calendar',['ym'=>$next])}}">{{$next}}</a></h2>
         <table class='table table-bordered'><tr align='center'><th>曜日</th><th>日付</th><th>メニュー</th></tr>
            @foreach($weekjp as $i => $week)
            <tr align='center'><th>{{$week}}</th><td>{{$i + 1}}</td><td></td></tr>
            @endforeach
         </table>
        </div>
        </div>        
   </body>
 </html>