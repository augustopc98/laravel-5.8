@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class ="col-3 p-5">
            <img src="http://www.solaruno.com/image/catalog/imagenes/logo11.png"width="200px">
        </div>
        <div class ="col-9 p-5">
            <div class="d-flex justify-content-between align-items-baseline">
            <h1>{{ $user->username}}</h1>
            <a href="/p/create">Add New Post</a><!-- Aca le pedimos al controlador el nombre de usuario para dejarlo como titulo-->
            </div>
        <a href="/profile/{{ $user->id }}/edit">Edit Profile</a>
        <div class="d-flex">
                <div class="pr-5"><strong>{{ $user->posts->count() }}</strong> Productos</div>
                <div class="pr-5"><strong>23k</strong> Ventas</div>
                <div class="pr-5"><strong>21</strong> Empresas Socias</div>
            </div>
        <div class="pt-2 font-weight-bold">{{ $user->profile->title }}</div>
        <div>{{ $user->profile->description }}</div>
        <div><a href="#">{{ $user->profile->url }}</a></div>
        </div>
    </div>
    <div class="row pt-5">
        @foreach($user->posts as $post)
        <div class="col-4 pb-4">
        <a href="/p/{{ $post->id }}">
                    <img src="/storage/{{ $post->image }}" class="w-50">
                </a>
        </div>
        @endforeach

    </div>
</div>

@endsection
