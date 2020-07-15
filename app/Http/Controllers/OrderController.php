<?php

namespace App\Http\Controllers;
use App\Order;
use App\Customer;
use App\Product;
use PDF;
use Illuminate\Http\Request;
use App\Exports\OrderExport;
use Maatwebsite\Excel\Facades\Excel;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = Order::when($request->search, function($query) use($request){
            $query->where('nama_cust', 'LIKE', '%'.$request->search.'%');
        })->orderBy('id_order','asc')
        ->join('customer', 'customer.id_cust', '=', 'order.nama_cust_order')
        ->paginate(10);

        return view('order.index', compact('data'))->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = Customer::all();
        $bahan = Product::all();
        return view('order.create', compact('data','bahan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $this->validate($request, [
            'tgl_order' => 'required',
            'nama_cust_order' => 'required',
            'nama_brg_order' => 'required',
            'jenis_bahan_order' => 'required',
            'harga' => 'required',
            'opsi_antar_order' => 'required',
            'status' => 'required',
            'tgl_selesai_order' => 'required',
            'harga' => 'required',
            'total_harga_order' => 'required'
        ]);

        Order::create([
            'tgl_order' => $request->tgl_order,
            'nama_cust_order' => $request->nama_cust_order,
            'nama_brg_order' => $request->nama_brg_order,
            'jenis_bahan_order' => $request->jenis_bahan_order,
            'harga' => $request->harga,
            'opsi_antar_order' => $request->opsi_antar_order,
            'status' => $request->status,
            'tgl_selesai_order' => $request->tgl_selesai_order,
            'total_harga_order' => $request->total_harga_order,
        ]);

        return redirect('/order')->with('success', 'Data is succesfully Added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Customer::all();
        $bahan = Product::all();
        $order = Order::findOrFail($id);
        return view('order.show', compact('order','data','bahan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Customer::all();
        $bahan = Product::all();
        $order = Order::findOrFail($id);
        return view('order.edit', compact('order','data','bahan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'tgl_order' => 'required',
            'nama_cust_order' => 'required',
            'nama_brg_order' => 'required',
            'jenis_bahan_order' => 'required',
            'harga' => 'required',
            'opsi_antar_order' => 'required',
            'status' => 'required',
            'tgl_selesai_order' => 'required',
            'harga' => 'required',
            'total_harga_order' => 'required'
        ]);

        $form_data = array(
            'tgl_order' => $request->tgl_order,
            'nama_cust_order' => $request->nama_cust_order,
            'nama_brg_order' => $request->nama_brg_order,
            'jenis_bahan_order' => $request->jenis_bahan_order,
            'harga' => $request->harga,
            'opsi_antar_order' => $request->opsi_antar_order,
            'status' => $request->status,
            'tgl_selesai_order' => $request->tgl_selesai_order,
            'total_harga_order' => $request->total_harga_order,
        );
        Order::where('id_order',$id)->update($form_data);
        return redirect('/order')->with('success', 'Data is successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Order::findOrFail($id);
        $delete->delete();
        return redirect('/order')->with('success', 'Data is succesfully deleted.');
    }

    public function export(Request $request)
    {
        return Excel::download(new OrderExport, 'order-'.date("Y-m-d").'.xlsx');
    }

    public function cetak_struk($id)
    {
        $order = Order::findOrFail($id);
        $pdf = PDF::loadview('order.invoice',['order'=>$order])->setPaper('a4', 'landscape');
        return $pdf->download('invoice-pdf.pdf');
    }
}
