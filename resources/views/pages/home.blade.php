@extends('layout')

@section('content')

    <div class="bg-light p-5 rounded">
        <h1>Bongah</h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis eaque incidunt laudantium officia placeat, porro qui rerum sapiente sed voluptatem voluptatibus voluptatum! Cum cumque est fugit perspiciatis possimus quos sapiente.</p>
        <a class="btn btn-lg btn-primary" href="{{ route('banners.create') }}" role="button">Create a Banner</a>
    </div>

@stop
