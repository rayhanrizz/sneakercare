@extends('layouts.adminmain')

@section('content')
<section class="section">
  
  <div class="section-header">
    <h1>
      Admin <small>Edit Profile</small>
    </h1>
  </div>

  <div class="section-body">
    <div class="col-12 col-md-6 col-lg-6">
        <div class="card">
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
            <form action="{{ route('admin.update', $user->id) }}" method="POST" enctype="multipart/form-data">
              <input type="hidden" name="_method" value="PUT">
              @csrf
              <div class="form-group">
                <label>Username</label>
                <input type="text" name="name" class="form-control" value="{{ $user->name }}">
              </div>
              <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control" value="{{ $user->email }}">
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-primary">SAVE CHANGES</button>
              </div>
              </form>
          </div>
        </div>
      </div>  
  </div>

</section>
@endsection(