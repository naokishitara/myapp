@extends('layouts.admin')
@section('title', 'メニューの新規登録')
@section('content')
    <div class="container">
        <div class="row">
            
                <h2>種目名の登録</h2>
                <form action= "{{ action('App\Http\Controllers\Admin\MyappController@event_name')}}" method="post" enctype="multipart/form-data">

                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    
                    <div class="form-group row">
                         <div class="inputs">
                            <label class="col-md-2">種目名</label>
                            <div class="col-md-3">
                           <p><input type="text" class="form-control" name="name" value="{{ old('name') }}"></p>
                            @csrf
                            <p><input type="submit" class="btn btn-primary" value="追加"></p>
                            </div>
                         </div>
                </form>
                <div class="inline-block=btn">
                <input type="button"  class="btn btn-primary" onclick="location.href='https://cb8773d8e47445c68b8cdd1855a50870.vfs.cloud9.us-east-2.amazonaws.com/admin/myapp/eventdetail'" value="メニューを作る">
                <input type="button"  class="btn btn-primary" onclick="location.href='https://cb8773d8e47445c68b8cdd1855a50870.vfs.cloud9.us-east-2.amazonaws.com/admin/myapp/record_menu'" value="カレンダーに記録">
                <input type="button"  class="btn btn-primary" onclick="location.href='https://cb8773d8e47445c68b8cdd1855a50870.vfs.cloud9.us-east-2.amazonaws.com/admin/myapp/main'"value="カレンダーに戻る">
                </div>
               
           </div>  
        </div>
    </div>
@endsection