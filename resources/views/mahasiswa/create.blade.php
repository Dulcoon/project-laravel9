@extends('mahasiswa.layout')
@section('content')

<div class="card" style="margin:20px;">
  <div class="card-header">Tambah Mahasiswa Baru</div>
  <div class="card-body">

    <form action="{{ url('mahasiswa') }}" method="post" enctype="multipart/form-data">
      {!! csrf_field() !!}
      <label>NPM</label></br>
      <input type="text" name="NPM" id="NPM" class="form-control" required></br>
      <label>Nama</label></br>
      <input type="text" name="Nama" id="Nama" class="form-control" required></br>
      <label>Prodi</label></br>
      <input type="text" name="Prodi" id="Prodi" class="form-control" required></br>
      <label>Fakultas</label></br>
      <input type="text" name="fakultas" id="fakultas" class="form-control" required></br>
      <label>Alamat</label></br>
      <input type="text" name="Alamat" id="Alamat" class="form-control" required></br>
      <label>IPK</label></br>
      <input type="text" name="IPK" id="IPK" class="form-control" required></br>
      <label>Foto</label></br>
      <input type="file" name="foto" id="foto" class="form-control"><br>
      <input type="submit" value="   Save   " class="btn btn-success"></br>
    </form>

  </div>
</div>

@stop