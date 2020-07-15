<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Invoice</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <style>
        body{
            font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            color:#333;
            text-align:left;
            font-size:18px;
            margin:0;
        }
        .container{
            margin:0 auto;
            margin-top:35px;
            padding:40px;
            width:750px;
            height:auto;
            background-color:#fff;
        }
        caption{
            font-size:28px;
            margin-bottom:15px;
        }
        table{
            border:1px solid #333;
            border-collapse:collapse;
            margin:0 auto;
            width:740px;
        }
        td, tr, th{
            padding:12px;
            border:1px solid #333;
            width:185px;
        }
        th{
            background-color: #f0f0f0;
        }
        h4, p{
            margin:0px;
        }
    </style>
</head>
<body>
    <div class="container">
        <table>
            <caption>
                Sneaker Care Invoice
            </caption>
            <thead>
                <tr>
                    <th colspan="3">Invoice <strong>#{{ $order->id_order }}</strong></th>
                    <th>{{ $order->created_at->format('D, d M Y') }}</th>
                </tr>
                <tr>
                    <td colspan="2">
                        <h4>Perusahaan: </h4>
                        <p>Sneaker Care.<br>
                            Malang<br>
                            +62 8123 4567 890<br>
                            sneakercare@example.com
                        </p>
                    </td>
                    <td colspan="2">
                        <h4>Pelanggan: </h4>
                        <p>{{ $order->customer->nama_cust }}<br>
                        {{ $order->customer->alamat_cust }}<br>
                        {{ $order->customer->tlp_cust }} <br>
                        </p>
                    </td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th>Nama Barang</th>
                    <th>Jasa</th>
                    <th>Harga</th>
                    <th>Subtotal</th>
                </tr>
                <tr>
                    <td>{{ $order->nama_brg_order }}</td>
                    <td>{{ $order->product->nama_product }}</td>
                    <td>Rp {{ number_format($order->harga) }}</td>
                    <td>Rp {{ number_format($order->harga) }}</td>
                </tr>
                <tr>
                    <th colspan="3">Subtotal</th>
                    <td>Rp {{ number_format($order->harga) }}</td>
                </tr>
                <tr>
                    <th>Biaya Antar</th>
                    <td></td>
                    <td></td>
                    <td>Rp {{ number_format($order->opsi_antar_order) }}</td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="3">Total</th>
                    <td>Rp {{ number_format($order->total_harga_order) }}</td>
                </tr>
            </tfoot>
        </table>
    </div>
</body>
</html>