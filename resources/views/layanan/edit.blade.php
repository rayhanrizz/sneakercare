@extends('layouts.adminmain')

@section('content')
<section class="section">
  
  <div class="section-header">
    <h1>
      Layanan <small>Edit Data</small>
    </h1>
  </div>

  <div class="section-body">
    <div class="col-12 col-md-6 col-lg-6">
        <div class="card">
          <div class="card-header">
            <a href="{{ route('layanan.index') }}"> 
              <button type="button" class="btn btn-outline-info">
                <i class="fas fa-arrow-circle-left"></i> Back
              </button>
          </a>
          </div>
          @if ($errors->any())
            <div class="alert alert-danger">
              <ul>
                @foreach($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
          @endif
          <div class="card-body">
            <form action="{{ route('layanan.update', $layanan->id_layanan) }}" method="POST" enctype="multipart/form-data">
              <input type="hidden" name="_method" value="PUT">
              @csrf
              <div class="form-group">
                <label>Layanan</label>
                <input type="text" name="nama_layanan" class="form-control" value="{{ $layanan->nama_layanan }}">
              </div>
              <div class="form-group">
                <label class="control-label">Gambar</label>
                <input name="gambar" type="file" class="form-control" value="{{ url('/image/'.$layanan->gambar) }}">
                <input name="hidden_image" type="hidden" class="form-control" value="{{$layanan->gambar}}">
                <img src="{{ URL::to('/')}}/image/{{ $layanan->gambar }}" class="img-thumbnail" width="150"/>
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-primary">SAVE</button>
              </div>
              </form>
          </div>
        </div>
      </div>  
  </div>

</section>
@endsection(