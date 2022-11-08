@extends('layouts.admin')
@section('title', '僕の筋トレコーダー')
@section('content')
  
   <div class="container">
    <div class="row">
     <div class="col-md-8 mx-auto">
        <h1>筋トレlife</h1>
         @csrf
        <input type="button"  class="btn btn-primary" onclick="location.href='https://shielded-depths-42794.herokuapp.com/admin/myapp/event'"value="種目名登録">
        <input type="button"  class="btn btn-primary" onclick="location.href='https://shielded-depths-42794.herokuapp.com/admin/myapp/eventdetail'"value="メニュー登録">
        <input type="button"  class="btn btn-primary" onclick="location.href='https://shielded-depths-42794.herokuapp.com/admin/myapp/record_menu'"value="カレンダーに記録">
        <div class="row">
        <div class="col-12">
        <h2 class="mb-5"><a href= "{{action('App\Http\Controllers\Admin\MyappController@create_calendar',['ym'=>$prev])}}">{{$prev}} </a>
        &lt;{{$html_title}}&gt;
        <a href= "{{action('App\Http\Controllers\Admin\MyappController@create_calendar',['ym'=>$next])}}">{{$next}}</a></h2>
        <table class='table table-bordered'><tr align='center'><th class="character-color">曜日</th><th class="character-color">日付</th><th class="character-color">メニュー</th></tr>
            
            @foreach($days as $i => $day)
            <tr align='center'>
            <th class="character-color">{{$day['day_of_week']}}</th>
            <td class="character-color">{{$i+1}}</td>
            <td class="character-color">
                @foreach($day['records'] as $record)
                     <p> {{$record}}</p>
                @endforeach
            </td>
            </tr>
            @endforeach
         </table>
       </div>
      </div>
     </div>
    </div>        
   </div>
 </html>