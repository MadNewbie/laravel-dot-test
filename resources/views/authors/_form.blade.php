<div class="form-group">
    <label class="font-weight-bold">Nama</label>
    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ isset($author) ? old('name',$author->name) : old('name') }}" placeholder="Masukkan Nama Penulis Buku">

    @error('name')
        <div class="alert alert-danger mt-2">
            {{ $message }}
        </div>
    @enderror
</div>

<a href="{{route('authors.index')}}" class="btn btn-md btn-secondary">Kembali</a>
<button type="reset" class="btn btn-md btn-warning">Reset</button>
<button type="submit" class="btn btn-md btn-primary">Simpan</button>