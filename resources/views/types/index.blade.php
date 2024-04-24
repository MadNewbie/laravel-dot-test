<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Types') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <a href="{{route('types.create')}}" class="btn btn-md btn-success">Tambah</a>
                    <table class="table table-bordered table-hover mt-3">
                        <thead>
                            <tr>
                                <th scope="col">Nama</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($types as $type)
                                <tr>
                                    <td>
                                        {{$type->name}}
                                    </td>
                                    <td class="text-center">
                                        <form action="{{route('types.destroy', $type->id)}}" method="POST" onsubmit="return confirm('Apakah anda yakin menghapus data ini?')">
                                            <a href="{{route('types.show', $type->id)}}" class="btn btn-sm btn-dark">Lihat</a>
                                            <a href="{{route('types.edit', $type->id)}}" class="btn btn-sm btn-primary">Ubah</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                               <div class="mt-3 alert alert-danger">
                                    Maaf, data jenis buku belum tersedia
                               </div> 
                            @endforelse
                        </tbody>
                    </table>
                    {{$types->links()}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>