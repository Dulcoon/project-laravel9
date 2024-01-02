@extends('mahasiswa.layout')
@section('content')
<div class="container">
  <div class="row" style="margin:20px;">
    <div class="col-12">
      <div class="card">
        <div class="card-header bg-primary">
          <h2 class="text-center text-white">Management Data Mahasiswa</h2>
        </div>
        <div class="card-body">
          <a href="{{ url('/mahasiswa/create') }}" class="btn btn-success btn-sm" title="Tambah Mahasiswa Baru">
            Tambah Data Mahasiswa
          </a>
          <br />
          <br />
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th>#</th>
                  <th>NPM</th>
                  <th>Nama</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach($mahasiswa as $item)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $item->NPM }}</td>
                  <td>{{ $item->Nama }}</td>
                  <td>
                    <a href="{{ url('/mahasiswa/' . $item->id) }}" title="View mahasiswa"><button
                        class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                    <form method="POST" action="{{ url('/mahasiswa' . '/' . $item->id) }}" accept-charset="UTF-8"
                      style="display:inline">
                      {{ method_field('DELETE') }}
                      {{ csrf_field() }}
                      <button type="submit" class="btn btn-danger btn-sm" title="Delete mahasiswa"
                        onclick="return confirm('Confirm delete?')"><i class="fa fa-trash-o" aria-hidden="true"></i>
                        Delete</button>
                    </form>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>
@endsection