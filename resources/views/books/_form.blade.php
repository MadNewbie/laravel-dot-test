<div class="form-group">
    <label class="font-weight-bold">Judul</label>
    <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ isset($book) ? old('title',$book->title) : old('title') }}" placeholder="Masukkan Judul Buku">

    @error('title')
        <div class="alert alert-danger mt-2">
            {{ $message }}
        </div>
    @enderror
</div>

<div class="form-group">
    <label class="font-weight-bold">Jenis Buku</label>
    <select name="type_id" class="form-control">
        <option>Pilih Jenis Buku</option>
        @foreach ($types as $id=>$name)
         <option value="{{$id}}" {{ isset($book) ? ($id==$book->type_id ? 'selected' : '') : '' }}>{{$name}}</option>   
        @endforeach
    </select>

    @error('type_id')
        <div class="alert alert-danger mt-2">
            {{ $message }}
        </div>
    @enderror
</div>

<div class="form-group">
    <label class="font-weight-bold">Penulis</label>
    <select name="author_id" class="form-control">
        <option>Pilih Nama Penulis Buku</option>
        @foreach ($authors as $id=>$name)
         <option value="{{$id}}" {{ isset($book) ? ($id==$book->author_id ? 'selected' : '') : '' }}>{{$name}}</option>   
        @endforeach
    </select>

    @error('author_id')
        <div class="alert alert-danger mt-2">
            {{ $message }}
        </div>
    @enderror
</div>

<a href="{{route('authors.index')}}" class="btn btn-md btn-secondary">Kembali</a>
<button type="reset" class="btn btn-md btn-warning">Reset</button>
<button type="submit" class="btn btn-md btn-primary">Simpan</button>