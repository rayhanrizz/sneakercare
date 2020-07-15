@extends('layouts.adminmain')

@section('content')
<section class="section">
  
  <div class="section-header">
    <h1>Fasilitas</h1>
  </div>
  @if ($message = Session::get('success'))
    <div class="card">
        <div class="card-body">
              <div class="alert alert-success">
                  <p>{{ $message }}</p>
              </div>
        </div>
    </div>
  @endif
  <div class="section-body">
    <div class="col-12 col-md-12 col-lg-12">
        <div class="card">
          <div class="card-header">
            <form method="GET" class="form-inline">
              <div class="form-group">
                <input type="text" name="search" class="form-control" placeholder="Search" value="{{ request()->get('search') }}">
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
              </div>
            </form>
            <a href="{{ route('fasilitas.index') }}" class="pull-right">
              <button type="button" class="btn btn-info">All Data</button>
            </a>
          </div>
          <div class="card-header">
            <a href="{{route('fasilitas.create')}}">
              <button type="button" class="btn btn-primary"><i class="fa fa-plus"></i> Add New</button>
            </a>
          </div>
          <div class="card-body">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th scope="col">No</th>
                  <th scope="col">Nama</th>
                  <th scope="col">Gambar</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
               @forelse($data as $fasilitas)
                <tr>
                  <td>{{ ++$i }}</td>
                  <td>{{ $fasilitas->nama_fasilitas }}</td>
                  <td><img width="120px" src="{{ url('/image/'.$fasilitas->gambar) }}"></td>
                  <td>
                    <form action="{{ route('fasilitas.destroy', $fasilitas->id_fasilitas) }}" method="POST">
                        <div class="btn-group">
                            <a class="btn btn-sm btn-warning edit_modal color" href="{{ route('fasilitas.edit', $fasilitas->id_fasilitas) }}"><i class="fas fa-pen"></i></a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger delete color" onclick="return confirm('Are you sure to delete this data ?');"><i class="fas fa-trash"></i></button>
                        </div>
                    </form>
                  </td>
                </tr>
               @empty
                <tr>
                  <td colspan="3"><center>Data kosong</center></td>
                </tr>
                @endforelse
              </tbody>
            </table>
            {!! $data->appends(request()->except('page'))->render() !!}
          </div>
          <div class="card-footer text-right">
            <nav class="d-inline-block">
            </nav>
          </div>
        </div>
      </div>  
  </div>

</section>

@endsection()