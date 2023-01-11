<x-app-layout>
    <x-slot name="content">
        <div class="rounded shadow-lg">
            <img class="min-h-full" src="/images/slider2-eposi1-1820x785.jpg" alt="Sunset in the mountains">
            <hr>
            <div class="px-6 py-4">
                <div class="font-bold text-xl mb-2">The Coldest Sunset</div>
                <p class="text-gray-700 text-base">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus quia, nulla! Maiores et
                    perferendis eaque, exercitationem praesentium nihil.
                </p>
            </div>
            <div class="p-10">
                <x-button-link href="{{route('banners.create')}}">
                    {{__('Create a Banner')}}
                </x-button-link>
            </div>
            <div class="p-10">
                <div class="flex flex-row">
                    @foreach($banners as $banner)
                        <div class="basis-auto m-5">
                            <div class="block p-6 rounded-lg shadow-lg bg-white max-w-sm">
                                <h5 class="text-gray-900 text-xl leading-tight font-medium mb-2">{{ $banner->street . ' ' . $banner->city . ' ' . $banner->zip}}</h5>
                                <p class="text-gray-700 text-base mb-4">
                                    {{ $banner->description }}
                                </p>
                                <a href="{{route('banners.show',$banner->id)}}"
                                        class=" inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">
                                    Show
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </x-slot>
</x-app-layout>
