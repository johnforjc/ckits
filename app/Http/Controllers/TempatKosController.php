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
        return view('tambahkos');
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
            'kamar' => ['required|gt:0'],
            'detail' => 'required'
            //dsb
        ]);

        $kosts = new TempatKos;
        $kosts->nama_tempat_kos = $request->name;
        $kosts->kamar_tersedia = $request->kamar;
        $kosts->status_promosi = 0;
        $kosts->keterangan_tempat_kos = $request->detail;
        $kosts->store();
        //
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
        return view('showDetail')->with('kosts', $kosts);
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
    }
}
