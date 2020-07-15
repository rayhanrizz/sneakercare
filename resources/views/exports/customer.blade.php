<table>
    <thead>
    <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Alamat</th>
        <th>Telepon</th>
    </tr>
    </thead>
    <tbody>
        @forelse($data as $cust)
        <tr>
          <td>{{ ++$i }}</td>
          <td>{{ $cust->nama_cust}}</td>
          <td>{{ $cust->alamat_cust}}</td>
          <td>{{ $cust->tlp_cust}}</td>
        </tr>
        @empty
        <tr>
          <td colspan="7"><center>Data kosong</center></td>
        </tr>
        @endforelse
    </tbody>
</table>