<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TempatKos;
use App\User;
use App\Komentar;

class TempatKosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $kosts = TempatKos::all();
        // return ($kosts);
        return view('listKost')->with('kosts', $kosts);
    }

    public function clustering()
    {
        //
        $kosts = TempatKos::where();
        // return ($kosts);
        return view('listKost')->with('kosts', $kosts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('createkost');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Ada validasi terlebih dahulu
        $this->validate($request, [
            'name' => 'required',
            'kamar' => 'required|gt:0',
            'harga' => 'required|gt:0',
            'keterangan' => 'required',
            'alamat' => 'required',
            'foto' => 'image|required|max:1999'
            //dsb
        ]);

        // Handle File Upload
        if($request->hasFile('foto')){
            $filenameWithExt = $request->file('foto');
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('foto')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            $path = $request->file('foto')->storeAs('/public/image', $fileNameToStore);
        } else{
            $fileNameToStore = 'noimage.jpg';
        }

        $kosts = new TempatKos;
        $kosts->id = $request->input('id');
        $kosts->nama_tempat_kos = $request->input('name');
        $kosts->alamat = $request->input('alamat');
        $kosts->kamar_tersedia = $request->input('kamar');
        $kosts->harga = $request->input('harga');
        $kosts->status_promosi = $request->input('status');
        $kosts->keterangan_tempat_kos = $request->input('keterangan');
        $kosts->foto_kos = $fileNameToStore;
        $kosts->save();

        //
        return view('showTempatKos')->with('kosts', $kosts);
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
        $kosts = TempatKos::find($id);
        $users = User::find($kosts->id);
        // $users->komentar::where('tempat_kos_id_tempat_kos', $id)->get(); 
        // return $users;

        //cara fandi
        $komentar = Komentar::where('tempat_kos_id_tempat_kos', $id)->get();
        $data = array();
        for($i=0; $i<$komentar->count(); $i++)
        {
            array_push($data, User::find($komentar[$i]->id));
        }
        // return $komentar;
        // return $data;

        // // Cara 2 model
        // $komentar = Komentar::where('tempat_kos_id_tempat_kos', $id)->get();
        // return $komentar;
        return view('showTempatKos')->with('kosts', $kosts)->with('data', $data)->with('users', $users);
        // ->with('komentar', $komentar);
        // return view('showTempatKos')->with('data', ['kosts' => $kosts, 'komentar' => $komentar]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $kosts = TempatKos::find($id);
        return view('editTempatKos')->with('kosts', $kosts);
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
        //
        $this->validate($request, [
            'name' => 'required',
            'kamar' => 'required|gt:0',
            'harga' => 'required|gt:0',
            'keterangan' => 'required',
            'alamat' => 'required',
            //dsb
        ]);

        // Handle File Upload
        if($request->hasFile('foto')){
            $filenameWithExt = $request->file('foto');
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('foto')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            $path = $request->file('foto')->storeAs('/public/image', $fileNameToStore);
        }

        $kosts = TempatKos::find($id);
        $kosts->id = $request->input('id');
        $kosts->nama_tempat_kos = $request->input('name');
        $kosts->alamat = $request->input('alamat');
        $kosts->kamar_tersedia = $request->input('kamar');
        $kosts->harga = $request->input('harga');
        $kosts->status_promosi = $request->input('status');
        $kosts->keterangan_tempat_kos = $request->input('keterangan');
        if($request->hasFile('foto')){
            $kosts->foto_kos = $fileNameToStore;
        }
        $kosts->save();

        return view('showTempatKos')->with('kosts', $kosts);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $kosts = TempatKos::find($id);
        $kosts->delete();
        return redirect('tempatkos');
    }
}
