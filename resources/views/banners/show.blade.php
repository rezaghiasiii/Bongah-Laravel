<x-app-layout>
    <x-slot name="content">
        <div class="max-w-sm rounded overflow-hidden shadow-lg mx-auto">
            @foreach ($banner->photos as $photo)
                <img class="w-full" src="/{{$photo->path}}" alt="">
            @endforeach

            <div class="px-6 py-4">
                <div class="font-bold text-xl mb-2">{{$banner->street}}</div>
                <div class="font-bold text-xl mb-2">{{$banner->price}}</div>
                <p class="text-gray-700 text-base">
                    {!! $banner->description !!}
                </p>
            </div>
            @if(Auth::check())
                <hr>

                <div class="px-6 pt-4 pb-2">
                    <h2 class="text-center font-bold">Add Your Photos</h2>
                    <form id="addPhotosForm" class="dropzone"
                          action="{{route('store_photo_path', [$banner->zip,$banner->street])}}"
                          method="POST" enctype="multipart/form-data">
                        {!! csrf_field() !!}
                    </form>
                </div>
            @endif
        </div>


        <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
        <script>
            Dropzone.options.addPhotosForm = {
                paramName: "photo", // The name that will be used to transfer the file
                maxFilesize: 3, // MB
                acceptedFiles: '.jpg, .jpeg, .png, ,bmp',
                uploadMultiple: false,
                parallelUploads: 1,
                parallelChunkUploads: false
            }
        </script>
    </x-slot>
</x-app-layout>
