@if (count($errors) > 0)
    <div role="alert" class="mb-5">
        <div class="bg-red-500 text-white font-bold rounded-t px-4 py-2">
            Danger
        </div>
        <div class="rounded-b bg-red-100 px-4 py-3 text-red-700 shadow">
            @foreach ($errors->all() as $error)
                <p>{{$error}}</p>
            @endforeach
        </div>
    </div>
@endif
