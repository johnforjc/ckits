<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Komentar;
use App\TempatKos;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('listUser')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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
        $users = User::find($id);
        return view('profil')->with('users', $users);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users = User::find($id);
        return view('editProfil')->with('users', $users);
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
            'nama_user' => 'required',
            'email' => 'required',
            'no_telp' => 'required'
        ]);
        
        $users = User::find($id);
        $users->nama_user = $request->input('nama_user');
        $users->email = $request->input('email');
        $users->no_telp = $request->input('no_telp');
        $users->save();

        return redirect()->action('UsersController@show',  $id)->with('success', 'Users telah diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $komentar = Komentar::where('id', $id)->get();
        for($i=0; $i<$komentar->count(); $i++)
        {
            $kost = TempatKos::find($komentar[$i]->tempat_kos_id_tempat_kos);
            $kost->jumlah_komentar=$kost->jumlah_komentar-1;
            if($kost->jumlah_komentar == 0){
                $kost->rating = 0;
            }
            else{
                $kost->rating = ($kost->rating*($kost->jumlah_komentar+1)-$komentar[$i]->rating)/($kost->jumlah_komentar);
            }
            $kost->save();
            $komentar[$i]->delete();
        }
        $user->delete();
        return redirect('users');
    }
}
