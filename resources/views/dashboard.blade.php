<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="row container">
                        <div class="col-4">
                            <div class="card">
                                <div class="card-header">Jumlah Penulis Yang Tercatat Sistem</div>
                                <div class="card-body">
                                    <h1 class="text-xl font-semibold card-title">{{$authorsCount}}</h1>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="card">
                                <div class="card-header">Jumlah Buku Yang Tercatat Sistem</div>
                                <div class="card-body">
                                    <h1 class="text-xl font-semibold card-title">{{$booksCount}}</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
