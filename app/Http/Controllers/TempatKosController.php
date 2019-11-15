<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TempatKos;

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
        // return ("HALO");
        // Ada validasi terlebih dahulu
        $this->validate($request, [
            'name' => 'required',
            'kamar' => 'required|gt:0',
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
        $kosts->nama_tempat_kos = $request->input('name');
        $kosts->alamat = $request->input('alamat');
        $kosts->kamar_tersedia = $request->input('kamar');
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
        return view('showTempatKos')->with('kosts', $kosts);
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

        $kosts = TempatKos::find($id);
        $kosts->nama_tempat_kos = $request->input('name');
        $kosts->alamat = $request->input('alamat');
        $kosts->kamar_tersedia = $request->input('kamar');
        $kosts->status_promosi = $request->input('status');
        $kosts->keterangan_tempat_kos = $request->input('keterangan');
        $kosts->foto_kos = $fileNameToStore;
        $kosts->save();

        return('showTempatKos')->with('kosts', $kosts);
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
