<?php

namespace App\Http\Controllers;
use App\Fasilitas;
use Illuminate\Http\Request;

class FasilitasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = Fasilitas::when($request->search, function($query) use($request){
            $query->where('nama_fasilitas', 'LIKE', '%'.$request->search.'%');
        })->paginate(10);

        return view('fasilitas.index', compact('data'))->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('fasilitas.create');
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
            'nama_fasilitas' => 'required',
            'gambar' => 'required|image|max:2048'
        ]);

        $file = $request->file('gambar');
     
        $nama_file = time()."_".$file->getClientOriginalName();
     
        $tujuan_upload = 'image';
        $file->move($tujuan_upload,$nama_file);

        Fasilitas::create([
            'nama_fasilitas' => $request->nama_fasilitas,
            'gambar' => $nama_file,
        ]);

        return redirect('/fasilitas')->with('success', 'Data is succesfully Added.');
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
        $fasilitas = Fasilitas::findOrFail($id);
        return view('fasilitas.edit', compact('fasilitas'));
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
                'nama_fasilitas' => 'required',
                'gambar' => 'required|image|max:2048'
            ]);
                $nama_file = time()."_".$file->getClientOriginalName();
                $tujuan_upload = 'image';
                $file->move($tujuan_upload,$nama_file);
        }else{
            $request->validate([
                'nama_fasilitas' => 'required'
            ]);
        }

        $form_data = array(
            'nama_fasilitas' => $request->nama_fasilitas,
            'gambar' => $nama_file,
        );
        Fasilitas::where('id_fasilitas',$id)->update($form_data);
        return redirect('/fasilitas')->with('success', 'Data is successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Fasilitas::findOrFail($id);
        $delete->delete();
        return redirect('/fasilitas')->with('success', 'Data is succesfully deleted.');
    }
}
