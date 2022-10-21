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
                
                 @foreach( $posts as $eventdetails)
                
                 <tr>
                  <th>{{ $eventdetails->id }}</th>
                   <td> <input type="checkbox" name="events_ids[]" value="{{ $eventdetails->id }}"> : {{ $eventdetails->name}}</td>
                   <td>{{$eventdetails->weight}}"</td>
                  <td>{{$eventdetails->reps}}</td>
                   <td>{{$eventdetails->sets}}</td>
                 </tr>
                 @endforeach
           
                 <input type="hidden" name="weight" value="{{$eventdetails->weight}}">
             <input type="hidden" name="reps" value="{{$eventdetails->reps}}">
             <input type="hidden" name="sets" value="{{$eventdetails->sets}}">
             <input type="hidden" name="date" value="{{$eventdetails->date}}">      
              </table>
               <div class="col-md-8">
                @csrf
               
                <input type="submit" class="btn btn-primary" value="記録">
                 @csrf
                </form>
          
                </div>        
               
               
                
                </div>
            </div>
        

