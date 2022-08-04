<x-app-layout>
    <x-slot name="content">
        <form class="w-full max-w-lg my-32 mx-auto" action="{{route('banners.store')}}" method="post">
            @include('banners.form')
            @include('partials.error')
        </form>
    </x-slot>
</x-app-layout>

