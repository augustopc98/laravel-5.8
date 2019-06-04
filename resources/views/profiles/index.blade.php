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
            <a href="#">Add New Post</a><!-- Aca le pedimos al controlador el nombre de usuario para dejarlo como titulo-->
            </div>
        <div class="d-flex">
                <div class="pr-5"><strong>153</strong> Productos</div>
                <div class="pr-5"><strong>23k</strong> Ventas</div>
                <div class="pr-5"><strong>21</strong> Empresas Socias</div>
            </div>
        <div class="pt-2 font-weight-bold">{{ $user->profile->title }}</div>
        <div>{{ $user->profile->description }}</div>
        <div><a href="#">{{ $user->profile->url }}</a></div>
        </div>
    </div>
    <div class="row pt-4">
        <div class="col-3">
                <img src="http://www.solaruno.com/image/cache/catalog/imagenes/la-ostia-18[W]-150x150.JPG" class="w-50">
        </div>
        <div class="col-3">
                <img src="http://www.solaruno.com/image/cache/catalog/imagenes/foco-sobrepuesto-cuadrado-150x150.jpg" class="w-50">
        </div>
        <div class="col-3">
                <img src="http://www.solaruno.com/image/cache/catalog/imagenes/salida-simple-150x150.png" class="w-50">
        </div>
        <div class="col-3">
            <img src="http://www.solaruno.com/image/cache/catalog/ds43_Mesa%20de%20trabajo%201-150x150.jpg" class="w-50">
        </div>
</div>

@endsection
