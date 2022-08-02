@extends('layout')

@section('content')

    <h1>Selling your home?</h1>

    <hr>

    <div class="row">

        @include('partials.error')

        <form class="col-md-6" action="{{ route('banners.store') }}" method="post" enctype="multipart/form-data"
              role="form">
            @include('banners.form')
        </form>

    </div>
@stop
