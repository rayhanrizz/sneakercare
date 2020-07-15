<table>
    <thead>
    <tr>
        <th>No</th>
        <th>Tanggal Order</th>
        <th>Nama Customer</th>
        <th>Nama Barang</th>
        <th>Jenis Bahan</th>
        <th>Harga</th>
        <th>Biaya Antar Jemput</th>
        <th>Status</th>
        <th>Tanggal Selesai</th>
        <th>Total Harga</th>
    </tr>
    </thead>
    <tbody>
        @forelse($data as $cust)
        <tr>
          <td>{{ ++$i }}</td>
          <td>{{ $cust->tgl_order}}</td>
          <td>{{ $cust->customer->nama_cust}}</td>
          <td>{{ $cust->nama_brg_order}}</td>
          <td>{{ $cust->product->nama_product}}</td>
          <td>{{ $cust->harga}}</td>
          <td>{{ $cust->opsi_antar_order}}</td>
          <td>{{ $cust->status}}</td>
          <td>{{ $cust->tgl_selesai_order}}</td>
          <td>{{ $cust->total_harga_order}}</td>
        </tr>
        @empty
        <tr>
          <td colspan="7"><center>Data kosong</center></td>
        </tr>
        @endforelse
    </tbody>
</table>