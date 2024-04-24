<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Authors') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2 class="font-semibold">Detail Penulis Buku</h2>
                    <div class="row mt-4">
                        <div class="col-3">
                            Nama
                        </div>
                        <div class="col-9">
                            {{$author->name}}
                        </div>
                    </div>
                    <div class="row container mt-4">
                        <a href="{{route('authors.index')}}" class="btn btn-sm btn-secondary">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>