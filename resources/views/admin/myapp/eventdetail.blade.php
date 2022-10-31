@extends('layouts.admin')
@section('title', 'メニューの新規登録')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>メニューの新規登録</h2>
                <form action="{{ action('App\Http\Controllers\Admin\MyappController@eventdetail') }}" method="post" enctype="multipart/form-data">

                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    
                    <div class="form-group row">
                        <label class="col-md-2">種目</label>
                        <div class="col-md-4">
                            
                             <select class="form-control" name="event_id">
                             @foreach( $events as $eventdetails)
                                <option value="{{ $eventdetails->id }}">{{ $eventdetails->name}}></option>
                             @endforeach
                             </select>
                             <a href="https://cb8773d8e47445c68b8cdd1855a50870.vfs.cloud9.us-east-2.amazonaws.com/admin/myapp/event_name">その他の種目の登録はこちら</a>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-md-2">重さ</label>
                        <div class="col-md-2">
                            <input type="text" class="form-control" name="weight" value="{{ old('weight') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">回数</label>
                        <div class="col-md-2">
                            <input type="text" class="form-control" name="reps" value="{{ old('reps') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                    　<label class="col-md-2">セット</label>
                    　<div class="col-md-2">
                            <input type="text" class="form-control" name="sets" value="{{ old('sets') }}">
                    　</div>
                    </div>
                   @csrf
                    <input type="submit" class="btn btn-primary" value="追加">
                </form>
                <input type="button"  class="btn btn-primary" onclick="location.href='https://cb8773d8e47445c68b8cdd1855a50870.vfs.cloud9.us-east-2.amazonaws.com/admin/myapp/home'"value="カレンダーに戻る">
                <input type="button"  class="btn btn-primary" onclick="location.href='https://cb8773d8e47445c68b8cdd1855a50870.vfs.cloud9.us-east-2.amazonaws.com/admin/myapp/event_name'"value="種目名を登録">
                <input type="button"  class="btn btn-primary" onclick="location.href='https://cb8773d8e47445c68b8cdd1855a50870.vfs.cloud9.us-east-2.amazonaws.com/admin/myapp/record_menu'"value="カレンダーに記録する">
            </div>
        </div>
    </div>
@endsection