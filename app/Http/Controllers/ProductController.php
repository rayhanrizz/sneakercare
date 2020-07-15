<?php

namespace App\Http\Controllers;
use App\Product;
use Illuminate\Http\Request;
use App\Exports\ProductExport;
use Maatwebsite\Excel\Facades\Excel;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = Product::when($request->search, function($query) use($request){
            $query->where('nama_product', 'LIKE', '%'.$request->search.'%');
        })->paginate(10);

        return view('product.index', compact('data'))->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product.create');
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
            'nama_product' => 'required',
            'harga' => 'required'
        ]);

        Product::create([
            'nama_product' => $request->nama_product,
            'harga' => $request->harga
        ]);

        return redirect('/product')->with('success', 'Data is succesfully Added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('product.edit', compact('product'));
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
            'nama_product' => 'required',
            'harga' => 'required'
        ]);

        $form_data = array(
            'nama_product' => $request->nama_product,
            'harga' => $request->harga
        );
        Product::where('id_product',$id)->update($form_data);
        return redirect('/product')->with('success', 'Data is successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Product::findOrFail($id);
        $delete->delete();
        return redirect('/product')->with('success', 'Data is succesfully deleted.');
    }
    public function export(Request $request)
    {
        return Excel::download(new ProductExport, 'product-'.date("Y-m-d").'.xlsx');
    }
}
