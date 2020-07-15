<table>
    <thead>
    <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Harga</th>
    </tr>
    </thead>
    <tbody>
        @forelse($data as $prd)
        <tr>
          <td>{{ ++$i }}</td>
          <td>{{ $prd->nama_product }}</td>
          <td>{{ $prd->harga}}</td>
        </tr>
        @empty
        <tr>
          <td colspan="7"><center>Data kosong</center></td>
        </tr>
        @endforelse
    </tbody>
</table>