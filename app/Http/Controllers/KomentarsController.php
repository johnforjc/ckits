<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Komentar;
use App\TempatKos;
use App\User;

class KomentarsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return 'hello ckits';
        $comments = Komentar::all();
        return view('listComment')->$comments;
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create_manual($id_kos)
    {
        $kost=TempatKos::find($id_kos);
        return view('tambahkomentar')->with('kost', $kost);
    }

    public function create()
    {
        return view('tambahkomentar');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //tinggal diubah
        $this->validate($request, [
            'komentar' => 'required',
            'rating' => 'required',
            //dsb
        ]);

        $komentars = new Komentar;
        $komentars->id = $request->id_user;
        $komentars->tempat_kos_id_tempat_kos = $request->id_kost;
        $komentars->isi_komentar = $request->komentar;
        $komentars->rating = $request->rating;
        $komentars->save();

        // return 0;
        return redirect('tempatkos');
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
        $komentar = Komentar::find($id);
        return view('showDetailKomentar')->with('komentar', $komentar);
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
        $komentar = Komentar::find($id);
        return view('editKomentar')->with('komentar', $komentar);
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
            'komentar' => 'required',
            'rating' => 'required',
            //dsb
        ]);

        $komentars = Komentar::find($id);
        $komentars->isi_komentar = $request->komentar;
        $komentars->rating = $request->rating;
        $komentars->save();

        return redirect('tempatkos');
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
        $komentar = TempatKos::find($id);
        $komentar->delete();
    }
}
