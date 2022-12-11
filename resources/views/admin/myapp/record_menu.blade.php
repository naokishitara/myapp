@extends('layouts.admin')
@section('menu', '登録済みメニューの一覧')
@section('content')
    <div align="center" class="container">
        <div class="row">
         <div class="col-md-12 mx-auto">
            <h2>メニューを記録しよう</h2>
         <div class="row">
             <div class="col-md-12">
                 <form action="{{ action('App\Http\Controllers\Admin\MyappController@record_menu') }}" method="post">
                      @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                     <table align="center"class="table table-dark">
                     <thead>
                     <tr>
                     <th width="10%">ID</th>
                     <th width="30%">メニュー</th>
                     <th width="20%">重さ</th>
                　　　　<th width="20%">回数</th>
                　　　　<th width="20%">セット</th>
                     </tr>
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
              　<input type="submit" class="btn btn-primary" value="カレンダーに記録">
                @csrf
                </form>
                <input type="button"  class="btn btn-primary" onclick="location.href='https://myapp-sn.dix.asia/admin/myapp//event'"value="種目名を登録">
                <input type="button"  class="btn btn-primary" onclick="location.href='https://myapp-sn.dix.asia/admin/myapp/eventdetail'"value="メニューを作る">
                <input type="button"  class="btn btn-primary" onclick="location.href='https://myapp-sn.dix.asia/admin/myapp/main'"value="カレンダーに戻る">
                </div>
             </div>
　       </div>
　     </div>
    </div>
 </div>       

