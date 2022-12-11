@extends('layouts.admin')
@section('title', '種目名の登録')
@section('content')
    <div align="center" class="container">
        <div class="row">
                <h1>種目名の登録</h1>
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
                                <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                            </div>
                            <div class="col-mb-4">
                            @csrf
                            <input type="submit" class="btn btn-primary" value="登録">
                            </div>
                         </div>
                </form>
                <div class="inline-block=btn">
                <input type="button"  class="btn btn-primary" onclick="location.href='https://myapp-sn.dix.asia/admin/myapp/eventdetail'" value="メニューを作る">
                <input type="button"  class="btn btn-primary" onclick="location.href='https://myapp-sn.dix.asia/admin/myapp/record_menu'" value="カレンダーに記録">
                <input type="button"  class="btn btn-primary" onclick="location.href='https://myapp-sn.dix.asia/admin/myapp/main'"value="カレンダーに戻る">
                </div>
               
           </div>  
        </div>
    </div>
@endsection