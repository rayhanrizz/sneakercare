@extends('layouts.adminmain')

@section('content')
<section class="section">
  
  <div class="section-header">
    <h1>
      Order <small>Detail Data</small>
    </h1>
  </div>

  <div class="section-body">
    <div class="col-12 col-md-6 col-lg-6">
        <div class="card">
          <div class="card-header">
            <a href="{{ route('order.index') }}"> 
              <button type="button" class="btn btn-outline-info">
                <i class="fas fa-arrow-circle-left"></i> Back
              </button>
          </a>
          </div>
          <div class="card-body">
              <div class="form-group">
                <label>Tanggal Order</label>
                <input type="date" name="tgl_order" class="form-control" value="{{ $order->tgl_order }}" readonly="">
              </div>
              <div class="form-group">
                <label>Nama Customer</label>
                <input type="text" name="nama_brg_order" class="form-control" value="{{ $order->customer->nama_cust }}" readonly="">
              </div>
              <div class="form-group">
                <label>Alamat Customer</label>
                <input type="text" name="alamat" class="form-control" value="{{ $order->customer->alamat_cust }}" readonly="">
              </div>
              <div class="form-group">
                <label>Telepon Customer</label>
                <input type="text" name="tlp" class="form-control" value="{{ $order->customer->tlp_cust }}" readonly="">
              </div>
              <div class="form-group">
                <label>Nama Barang</label>
                <input type="text" name="nama_brg_order" class="form-control" value="{{ $order->nama_brg_order }}" readonly="">
              </div>
              <div class="form-group">
                <label>Jenis Bahan</label>
                <input type="text" name="nama_brg_order" class="form-control" value="{{ $order->product->nama_product }}" readonly="">
              </div>
              <div class="form-group">
                <label>Harga</label>
                <input type="text" name="harga" class="form-control" value="{{ $order->harga }}" readonly="">
              </div>
              <div class="form-group">
                <label>Biaya Antar Jemput</label>
                <input type="text" name="opsi_antar_order" class="form-control" value="{{ $order->opsi_antar_order }}" readonly="">
              </div>
              <div class="form-group">
                <label>Status</label>
                <input type="text" name="nama_brg_order" class="form-control" value="{{ $order->status }}" readonly="">
              </div>
              <div class="form-group">
                <label>Tanggal Selesai</label>
                <input type="date" name="tgl_selesai_order" class="form-control" value="{{ $order->tgl_selesai_order }}" readonly="">
              </div>
              <div class="form-group">
                <label>Total</label>
                <input type="text" name="total_harga_order" class="form-control" value="{{ $order->total_harga_order }}" readonly="">
              </div>
          </div>
        </div>
      </div>  
  </div>

</section>
@endsection(