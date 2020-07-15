@extends('layouts.adminmain')

@section('content')
<section class="section">
  
  <div class="section-header">
    <h1>
      Order <small>Edit Data</small>
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
            <form action="{{ route('order.update', $order->id_order) }}" method="POST" enctype="multipart/form-data" name="form">
              <input type="hidden" name="_method" value="PUT">
              @csrf
              <div class="form-group">
                <label>Tanggal Order</label>
                <input type="date" name="tgl_order" class="form-control" value="{{ $order->tgl_order }}">
              </div>
              <div class="form-group">
                  <label for="" class="control-label">Nama Customer</label>
                    <select class="form-control" name="nama_cust_order">
                      @foreach($data as $cust)
                      <option value="{{ $cust->id_cust }}" {{ $cust->id_cust == $order->nama_cust_order ? 'selected="selected"' : '' }}> {{ $cust->nama_cust}} </option>
                      @endforeach
                    </select>
              </div>
              <div class="form-group">
                <label>Nama Barang</label>
                <input type="text" name="nama_brg_order" class="form-control" value="{{ $order->nama_brg_order }}">
              </div>
              <div class="form-group">
                  <label for="" class="control-label">Jasa</label>
                    <select class="form-control" name="jenis_bahan_order">
                      @foreach($bahan as $bhn)
                      <option value="{{ $bhn->id_product }}" {{ $bhn->id_product == $order->jenis_bahan_order ? 'selected="selected"' : '' }}> {{ $bhn->nama_product}} </option>
                      @endforeach
                    </select>
              </div>
              <div class="form-group">
                  <label for="" class="control-label">Harga</label>
                    <select class="form-control" name="harga">
                      @foreach($bahan as $bhn)
                      <option value="{{ $bhn->harga }}" {{ $bhn->harga == $order->harga ? 'selected="selected"' : '' }}> {{ $bhn->nama_product}} - {{ $bhn->harga}}</option>
                      @endforeach
                    </select>
              </div>
              @if($order->opsi_antar_order == "0")
              <div class="form-group">
                  <label for="status" class="control-label">Biaya Antar Jemput</label>
                  <select class="form-control" name="opsi_antar_order">
                      <option value="0" selected="selected">Tidak - Rp 0</option>
                      <option value="10000">Ya - Rp 10,000</option>
                  </select>
              </div>
              @elseif($order->opsi_antar_order == "10000")
              <div class="form-group">
                  <label for="status" class="control-label">Biaya Antar Jemput</label>
                  <select class="form-control" name="opsi_antar_order">
                      <option value="0">Tidak - Rp 0</option>
                      <option value="10000" selected="selected">Ya - Rp 10,000</option>
                  </select>
              </div>
              @endif
              @if($order->status == "Proses")
              <div class="form-group">
                  <label for="status" class="control-label">Status</label>
                  <select class="form-control" name="status">
                      <option value="Proses" selected="selected">Proses</option>
                      <option value="Selesai">Selesai</option>
                  </select>
              </div>
              @elseif($order->status == "Selesai")
              <div class="form-group">
                  <label for="status" class="control-label">Status</label>
                  <select class="form-control" name="status">
                      <option value="Proses">Proses</option>
                      <option value="Selesai" selected="selected">Selesai</option>
                  </select>
              </div>
              @endif
              <div class="form-group">
                <label>Tanggal Selesai</label>
                <input type="date" name="tgl_selesai_order" class="form-control" value="{{ $order->tgl_selesai_order }}">
              </div>
              <div class="form-group">
                <label>Total</label>
                <div class="input-group mb-3">
                  <input type="text" class="form-control" name="total_harga_order" value="{{ $order->total_harga_order }}">
                    <div class="input-group-append">
                      <input type=button name=submit onclick="tambah()" value="Total" class="btn btn-primary">
                    </div>
                  </div>
              </div>

              <div class="form-group">
                <button type="submit" class="btn btn-primary">SAVE</button>
              </div>
              </form>
          </div>
        </div>
      </div>  
  </div>

  <script>
  function tambah() {
   a=parseInt(form.harga.value); 
   b=parseInt(form.opsi_antar_order.value); 
   c=a+b 
   form.total_harga_order.value = c; 
 }
</script>

</section>
@endsection(