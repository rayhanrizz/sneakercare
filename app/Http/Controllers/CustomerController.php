<?php

namespace App\Http\Controllers;
use App\Customer;
use Illuminate\Http\Request;
use App\Exports\CustomerExport;
use Maatwebsite\Excel\Facades\Excel;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = Customer::when($request->search, function($query) use($request){
            $query->where('nama_cust', 'LIKE', '%'.$request->search.'%');
        })->paginate(10);

        return view('customer.index', compact('data'))->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customer.create');
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
            'nama_cust' => 'required',
            'alamat_cust' => 'required',
            'tlp_cust' => 'required'
        ]);

        Customer::create([
            'nama_cust' => $request->nama_cust,
            'alamat_cust' => $request->alamat_cust,
            'tlp_cust' => $request->tlp_cust
        ]);

        return redirect('/customer')->with('success', 'Data is succesfully Added.');
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
        $customer = Customer::findOrFail($id);
        return view('customer.edit', compact('customer'));
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
            'nama_cust' => 'required',
            'alamat_cust' => 'required',
            'tlp_cust' => 'required'
        ]);

        $form_data = array(
            'nama_cust' => $request->nama_cust,
            'alamat_cust' => $request->alamat_cust,
            'tlp_cust' => $request->tlp_cust
        );
        Customer::where('id_cust',$id)->update($form_data);
        return redirect('/customer')->with('success', 'Data is successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Customer::findOrFail($id);
        $delete->delete();
        return redirect('/customer')->with('success', 'Data is succesfully deleted.');
    }
    public function export(Request $request)
    {
        return Excel::download(new CustomerExport, 'customer-'.date("Y-m-d").'.xlsx');
    }
}
