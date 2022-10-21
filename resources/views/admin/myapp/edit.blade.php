@extends('layouts.admin')
@section('title', 'メニューの編集')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>メニューの編集</h2>
                <form action="{{ action('App\Http\Controllers\Admin\MyappController@update') }}" method="post" enctype="multipart/form-data">
                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="form-group row">
                        <label class="col-md-2" for="menu">メニュー</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="menu" value="{{ $menu_form->menu}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="reps">回数</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="reps" value="{{ $menu_form->reps}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="sets">セット</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="sets" value="{{ $menu_form->sets}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-10">
                            <input type="hidden" name="id" value="{{ $menu_form->id }}">
                            @csrf
                            <input type="submit" class="btn btn-primary" value="更新">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection