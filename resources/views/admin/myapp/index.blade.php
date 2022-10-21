@extends('layouts.admin')
@section('menu', '登録済みメニューの一覧')

@section('content')
    <div class="container">
        <div class="row">
            <h2>メニュー一覧</h2>
        </div>
        <div class="col-md-8">
                <form action="{{ action('App\Http\Controllers\Admin\MyappController@index') }}" method="get">
        @csrf
         <input type="submit" class="btn btn-primary" value="検索">
        </div>
                </form>
    </div>

           <div class="list-news col-md-12 mx-auto">
                <div class="row">
                    <table class="table table-dark">
                        <thead>
                            <tr>
                                <th width="20%">ID</th>
                                <th width="40%">メニュー</th>
                                <th width="20%">回数</th>
                                 <th width="20%">セット</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $menu)
                                <tr>
                                    <th>{{ $menu->id }}</th>
                                    <td>{{ Str::limit($menu->menu, 100) }}</td>
                                    <td>{{ Str::limit($menu->reps, 50) }}</td>
                                    <td>{{ Str::limit($menu->sets, 50) }}</td>
                                     <td>
                                        <div>
                                            <a href="{{ action('App\Http\Controllers\Admin\MyappController@edit', ['id' => $menu->id]) }}">編集</a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection