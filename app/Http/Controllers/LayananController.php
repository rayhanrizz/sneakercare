<?php

namespace App\Http\Controllers;
use App\Layanan;
use Illuminate\Http\Request;

class LayananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = Layanan::when($request->search, function($query) use($request){
            $query->where('nama_layanan', 'LIKE', '%'.$request->search.'%');
        })->paginate(10);

        return view('layanan.index', compact('data'))->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layanan.create');
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
            'nama_layanan' => 'required',
            'gambar' => 'required|image|max:2048'
        ]);

        $file = $request->file('gambar');
     
        $nama_file = time()."_".$file->getClientOriginalName();
     
        $tujuan_upload = 'image';
        $file->move($tujuan_upload,$nama_file);

        Layanan::create([
            'nama_layanan' => $request->nama_layanan,
            'gambar' => $nama_file
        ]);

        return redirect('/layanan')->with('success', 'Data is succesfully Added.');
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
        $layanan = Layanan::findOrFail($id);
        return view('layanan.edit', compact('layanan'));
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
        $nama_file = $request->hidden_image;
        $file = $request->file('gambar');

        if ($file !='') {
                $this->validate($request, [
                'nama_layanan' => 'required',
                'gambar' => 'required|image|max:2048'
            ]);
                $nama_file = time()."_".$file->getClientOriginalName();
                $tujuan_upload = 'image';
                $file->move($tujuan_upload,$nama_file);
        }else{
            $request->validate([
                'nama_layanan' => 'required'
            ]);
        }
        ;
        $form_data = array(
            'nama_layanan' => $request->nama_layanan,
            'gambar' => $nama_file
        );
        Layanan::where('id_layanan',$id)->update($form_data);
        return redirect('/layanan')->with('success', 'Data is successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Layanan::findOrFail($id);
        $delete->delete();
        return redirect('/layanan')->with('success', 'Data is succesfully deleted.');
    }
}
