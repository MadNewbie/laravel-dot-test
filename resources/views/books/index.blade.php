<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Books') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <a href="{{route('books.create')}}" class="btn btn-md btn-success">Tambah</a>
                    <table class="table table-bordered table-hover mt-3">
                        <thead>
                            <tr>
                                <th scope="col">Judul</th>
                                <th scope="col">Jenis Buku</th>
                                <th scope="col">Nama Pengarang</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($books as $book)
                                <tr>
                                    <td>
                                        {{$book->title}}
                                    </td>
                                    <td>
                                        {{$book->type->name}}
                                    </td>
                                    <td>
                                        {{$book->author->name}}
                                    </td>
                                    <td class="text-center">
                                        <form action="{{route('books.destroy', $book->id)}}" method="POST" onsubmit="return confirm('Apakah anda yakin menghapus data ini?')">
                                            <a href="{{route('books.show', $book->id)}}" class="btn btn-sm btn-dark">Lihat</a>
                                            <a href="{{route('books.edit', $book->id)}}" class="btn btn-sm btn-primary">Ubah</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                               <div class="mt-3 alert alert-danger">
                                    Maaf, data buku belum tersedia
                               </div> 
                            @endforelse
                        </tbody>
                    </table>
                    {{$books->links()}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>