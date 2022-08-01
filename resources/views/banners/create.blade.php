@extends('layout')

@section('content')

    <h1>Selling your home?</h1>

    <hr>

    <form action="{{ route('banners.store') }}" method="post" enctype="multipart/form-data" role="form">
        @include('banners.form')
    </form>
@stop
