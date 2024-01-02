@extends('mahasiswa.layout')
@section('content')

<div class="card" style="margin:20px;">
  <div class="card-header">Edit Data Mahasiswa</div>
  <div class="card-body">

    <form action="{{ url('mahasiswa/' . $mahasiswa->id) }}" method="post" enctype="multipart/form-data">
      {!! csrf_field() !!}
      @method("PATCH")
      <input type="hidden" name="id" id="id" value="{{ $mahasiswa->id }}" />

      <label for="NPM">NPM</label><br>
      <input type="text" name="NPM" id="NPM" value="{{ $mahasiswa->NPM }}" class="form-control"><br>

      <label for="Nama">Nama</label><br>
      <input type="text" name="Nama" id="Nama" value="{{ $mahasiswa->Nama }}" class="form-control"><br>

      <label for="Prodi">Prodi</label><br>
      <input type="text" name="Prodi" id="Prodi" value="{{ $mahasiswa->Prodi }}" class="form-control"><br>

      <label for="fakultas">Fakultas</label><br>
      <input type="text" name="fakultas" id="fakultas" value="{{ $mahasiswa->fakultas }}" class="form-control"><br>

      <label for="Alamat">Alamat</label><br>
      <input type="text" name="Alamat" id="Alamat" value="{{ $mahasiswa->Alamat }}" class="form-control"><br>

      <label for="IPK">IPK</label><br>
      <input type="text" name="IPK" id="IPK" value="{{ $mahasiswa->IPK }}" class="form-control"><br>

      <!-- Menampilkan foto saat ini -->
      @if ($mahasiswa->foto)
      <img src="{{ asset('storage/foto/' . $mahasiswa->foto) }}" width='120px' alt="Foto Mahasiswa"
        class="img-thumbnail">
      @else
      <p>Tidak ada foto tersedia</p>
      @endif

      <br>

      <label for="foto">Pilih Foto Baru</label><br>
      <input type="file" name="foto" id="foto" class="form-control-file"><br><br><br>

      <input type="submit" value="Update" class="btn btn-success"><br>
    </form>

  </div>
</div>

@stop