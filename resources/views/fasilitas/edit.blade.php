@extends('layouts.adminmain')

@section('content')
<section class="section">
  
  <div class="section-header">
    <h1>
      Fasilitas <small>Edit Data</small>
    </h1>
  </div>

  <div class="section-body">
    <div class="col-12 col-md-6 col-lg-6">
        <div class="card">
          <div class="card-header">
            <a href="{{ route('fasilitas.index') }}"> 
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
            <form action="{{ route('fasilitas.update', $fasilitas->id_fasilitas) }}" method="POST" enctype="multipart/form-data">
              <input type="hidden" name="_method" value="PUT">
              @csrf
              <div class="form-group">
                <label>Fasilitas</label>
                <input type="text" name="nama_fasilitas" class="form-control" value="{{ $fasilitas->nama_fasilitas }}">
              </div>
              <div class="form-group">
                <label class="control-label">Gambar</label>
                <input name="gambar" type="file" class="form-control" value="{{ url('/image/'.$fasilitas->gambar) }}">
                <input name="hidden_image" type="hidden" class="form-control" value="{{$fasilitas->gambar}}">
                <img src="{{ URL::to('/')}}/image/{{ $fasilitas->gambar }}" class="img-thumbnail" width="150"/>
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