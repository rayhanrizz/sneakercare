@extends('layouts.adminmain')

@section('content')
<section class="section">
  
  <div class="section-header">
    <h1>Jadwal Selesai Pengerjaan Order</h1>
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
          <div class="card-body">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th scope="col">No</th>
                  <th scope="col">Nama Customer</th>
                  <th scope="col">Nama Barang</th>
                  <th scope="col">Jasa</th>
                  <th scope="col">Tanggal Selesai</th>
                </tr>
              </thead>
              <tbody>
               @forelse($data as $order)
                <tr>
                  <td>{{ ++$i }}</td>
                  <td>{{ $order->customer->nama_cust }}</td>
                  <td>{{ $order->nama_brg_order }}</td>
                  <td>{{ $order->product->nama_product }}</td>
                  <td>{{ $order->tgl_selesai_order }}</td>
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