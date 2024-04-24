<div class="form-group">
    <label class="font-weight-bold">Nama</label>
    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ isset($type) ? old('name',$type->name) : old('name') }}" placeholder="Masukkan Nama Jenis Buku">

    @error('name')
        <div class="alert alert-danger mt-2">
            {{ $message }}
        </div>
    @enderror
</div>

<a href="{{route('types.index')}}" class="btn btn-md btn-secondary">Kembali</a>
<button type="reset" class="btn btn-md btn-warning">Reset</button>
<button type="submit" class="btn btn-md btn-primary">Simpan</button>