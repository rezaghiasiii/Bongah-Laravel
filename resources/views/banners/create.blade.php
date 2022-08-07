<x-app-layout>
    <x-slot name="content">

        <form class="w-full max-w-lg my-16 mx-auto" action="{{route('banners.store')}}" method="post">
            @include('partials.error')
            @include('banners.form')
        </form>
    </x-slot>
</x-app-layout>

