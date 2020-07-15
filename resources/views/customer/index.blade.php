@extends('layouts.adminmain')

@section('content')
<section class="section">
  
  <div class="section-header">
    <h1>Customer</h1>
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
            <a href="{{ route('customer.index') }}" class="pull-right">
              <button type="button" class="btn btn-info">All Data</button>
            </a>
          </div>
          <div class="card-header">
            <a href="{{route('customer.create')}}">
              <button type="button" class="btn btn-primary"><i class="fa fa-plus"></i> Add New</button>
            </a>
            &nbsp;
            <a href="export_customer">
              <button type="button" class="btn btn-success"><i class="fa fa-print"></i> Export Excel</button>
            </a>
            &nbsp;
          </div>
          <div class="card-body">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th scope="col">No</th>
                  <th scope="col">Nama</th>
                  <th scope="col">Alamat</th>
                  <th scope="col">Telepon</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
               @forelse($data as $customer)
                <tr>
                  <td>{{ ++$i }}</td>
                  <td>{{ $customer->nama_cust }}</td>
                  <td>{{ $customer->alamat_cust }}</td>
                  <td>{{ $customer->tlp_cust }}</td>
                  <td>
                    <form action="{{ route('customer.destroy', $customer->id_cust) }}" method="POST">
                        <div class="btn-group">
                            <a class="btn btn-sm btn-warning edit_modal color" href="{{ route('customer.edit', $customer->id_cust) }}"><i class="fas fa-pen"></i></a>
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