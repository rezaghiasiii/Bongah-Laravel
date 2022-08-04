<x-app-layout>
    <x-slot name="content">
        <div class="rounded shadow-lg">
            <img class="min-h-full" src="/images/slider2-eposi1-1820x785.jpg" alt="Sunset in the mountains">
            <hr>
            <div class="px-6 py-4">
                <div class="font-bold text-xl mb-2">The Coldest Sunset</div>
                <p class="text-gray-700 text-base">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus quia, nulla! Maiores et perferendis eaque, exercitationem praesentium nihil.
                </p>
            </div>
            <div class="p-10">
                <x-button-link href="{{route('banners.create')}}">
                    {{__('Create a Banner')}}
                </x-button-link>
            </div>
        </div>
    </x-slot>
</x-app-layout>
