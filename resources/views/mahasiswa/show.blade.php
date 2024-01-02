@extends('mahasiswa.layout')
@section('content')

<div class="card" style="margin: 20px;">
  <div class="card-header bg-primary text-white">
    <h4>Data Mahasiswa</h4>
  </div>
  <div class="card-body">
    <div class="row">
      <div class="col-md-6">
        <div class="card">
          <div class="card-body">
            <h3 class="card-Title">{{ $mahasiswa->Nama }}</h3>
            <p class="card-text">NPM: {{ $mahasiswa->NPM }}</p>
            <p class="card-text">Prodi: {{ $mahasiswa->Prodi }}</p>
            <p class="card-text">Fakultas: {{ $mahasiswa->fakultas }}</p>
            <p class="card-text">Alamat: {{ $mahasiswa->Alamat }}</p>
            <p class="card-text">IPK: {{ $mahasiswa->IPK }}</p>

            <!-- Tombol Edit -->
            <a href="{{ url('mahasiswa/' . $mahasiswa->id . '/edit') }}" class="btn btn-warning">Edit</a>

            <!-- Tombol Delete -->
            <form action="{{ url('mahasiswa/' . $mahasiswa->id) }}" method="post" style="display: inline;">
              {!! csrf_field() !!}
              @method('DELETE')
              <button type="submit" class="btn btn-danger"
                onclick="return confirm('Apakah Anda yakin ingin menghapus?')">Delete</button>
            </form>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Foto Mahasiswa</h5>
            @if ($mahasiswa->foto)
            <img src="{{ asset('storage/foto/' . $mahasiswa->foto) }}" width='140px' alt="Foto Mahasiswa"
              class="img-thumbnail">
            @else
            <p>Tidak ada foto tersedia</p>
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@stop