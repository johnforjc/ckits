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
        $kosts = TempatKos::all()->sortByDesc("status_promosi");
        // return ($kosts);
        return view('listKost')->with('kosts', $kosts);
    }

    public function listpemilik($id)
    {
        $kosts = TempatKos::where('id', $id)->orderBy("status_promosi", "desc")->get();
        return view('listKost')->with('kosts', $kosts);
    }

    public function clustering(Request $request)
    {
        //
        // return $request->harga_max;

        if(is_null($request->harga_max)) $request->harga_max=9999999;
        if(is_null($request->rating_min)) $request->rating_min=0;
        $kosts = TempatKos::where([
                                    ['harga', '<=', $request->harga_max],
                                    ['rating', '>=', $request->rating_min]
                                    ])->orderBy("status_promosi", "desc")->get();
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
            'foto' => 'image|required|max:1999',
            'syarat' => 'required'
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
        $kosts->rating = $request->rating;
        $kosts->jumlah_komentar = $request->jumlah;
        $kosts->save();

        //
        return redirect()->route('tempatkos.show', $kosts->id_tempat_kos);
        // return view('showTempatKos')->with('kosts', $kosts);
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
        $users = User::find($kosts->id);

        $komentar = Komentar::where('tempat_kos_id_tempat_kos', $id)->get();
        $data = array();
        for($i=0; $i<$komentar->count(); $i++)
        {
            array_push($data, User::find($komentar[$i]->id));
        }

        return redirect()->route('tempatkos.show', $kosts->id_tempat_kos);
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
        $komentar = Komentar::where('tempat_kos_id_tempat_kos', $id)->get();
        for($i=0; $i<$komentar->count(); $i++)
        {
            $komentar[$i]->delete();
        }
        $kosts->delete();
        return redirect('tempatkos');
    }
}
