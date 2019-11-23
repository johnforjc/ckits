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

        return view('listComment')->with('comments', $comments);
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
            'syarat' => 'required'
            //dsb
        ]);

        $kost = TempatKos::find($request->id_kost);
        $kost->rating = ($kost->rating*$kost->jumlah_komentar+$request->rating)/($kost->jumlah_komentar+1);
        $kost->jumlah_komentar=$kost->jumlah_komentar+1;
        $kost->save();

        $komentars = new Komentar;
        $komentars->id = $request->id_user;
        $komentars->tempat_kos_id_tempat_kos = $request->id_kost;
        $komentars->isi_komentar = $request->komentar;
        $komentars->rating = $request->rating;
        $komentars->save();

        return redirect()->route('tempatkos.show', $komentars->tempat_kos_id_tempat_kos);    
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
        $users = User::find($komentar->id);
        $kosts = TempatKos::find($komentar->tempat_kos_id_tempat_kos);
        return view('showDetailKomentar')->with('komentar', $komentar)->with('users', $users)->with('kosts', $kosts);
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
            'komentar' => 'required'
            //dsb
        ]);

        $kost = TempatKos::find($request->id_kost);
        $komentars = Komentar::find($id);
        
        if($request->rating){
            $kost->rating = ($kost->rating*$kost->jumlah_komentar-($komentars->rating-$request->rating))/($kost->jumlah_komentar);
            $kost->save();
            $komentars->rating = $request->rating;
        }
        
        $komentars->isi_komentar = $request->komentar;
        $komentars->save();

        return redirect()->route('tempatkos.show', $komentars->tempat_kos_id_tempat_kos); 
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
        $komentar = Komentar::find($id);
        $kost = TempatKos::find($komentar->tempat_kos_id_tempat_kos);
        $kost->jumlah_komentar=$kost->jumlah_komentar-1;
        if($kost->jumlah_komentar == 0){
            $kost->rating = 0;
        }
        else{
            $kost->rating = ($kost->rating*($kost->jumlah_komentar+1)-$komentar->rating)/($kost->jumlah_komentar);
        }
        $kost->save();
        $komentar->delete();
        return redirect('komentar');
    }
}
