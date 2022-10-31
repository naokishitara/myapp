@extends('layouts.admin')
@section('menu', '登録済みメニューの一覧')

@section('content')
    <div class="container">
        <div class="row">
            <h2>メニューを記録しよう</h2>
        </div>
         <div class="row">
         <div class="col-md-8">
          <form action="{{ action('App\Http\Controllers\Admin\MyappController@record_menu') }}" method="post">
            <table class="table table-dark">
             <thead>
               <tr>
                <th width="10%">ID</th>
                 <th width="30%">メニュー</th>
                <th width="20%">重さ</th>
                <th width="20%">回数</th>
                <th width="20%">セット</th>
               </tr>
              </thead> 
                
                 @foreach( $eventdetails as $eventdetail)
                
                 <tr>
                   <td> <input type="checkbox" name="eventdetail_ids[]" value="{{ $eventdetail->id }}"></td> 
                   <td>{{ $eventdetail->event->name}}</td> 
                   <td>{{ $eventdetail->weight}}</td> 
                   <td>{{ $eventdetail->reps}}</td> 
                   <td>{{ $eventdetail->sets}} </td>
                 </tr>
                 @endforeach
           
                  
              </table>
               <div class="col-md-8">
                @csrf
               
                <input type="submit" class="btn btn-primary" value="記録">
                 @csrf
                </form>
                <input type="button"  class="btn btn-primary" onclick="location.href='https://cb8773d8e47445c68b8cdd1855a50870.vfs.cloud9.us-east-2.amazonaws.com/admin/myapp/home'"value="カレンダーに戻る">
                <input type="button"  class="btn btn-primary" onclick="location.href='https://cb8773d8e47445c68b8cdd1855a50870.vfs.cloud9.us-east-2.amazonaws.com/admin/myapp/event_name'"value="種目名を登録">
                <input type="button"  class="btn btn-primary" onclick="location.href='https://cb8773d8e47445c68b8cdd1855a50870.vfs.cloud9.us-east-2.amazonaws.com/admin/myapp/eventdetail'"value="メニューを作る">
                </div>        
               
               
                
                </div>
            </div>
        

