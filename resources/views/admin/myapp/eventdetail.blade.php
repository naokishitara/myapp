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
                            
                             <select class="form-control" name="events_ids[]">
                             @foreach( $posts as $eventdetails)
                              <option value="{{ $eventdetails->id }}">{{ $eventdetails->name}}></option>
                              @endforeach
                              </select>
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
            </div>
        </div>
    </div>
@endsection