<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pembayaran;
use App\TempatKos;

class PembayaransController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $payments = Pembayaran::all();

        return view('listpembayaran')->with('payments', $payments);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create_manual($id_kos)
    {
        $kost=TempatKos::find($id_kos);

        return view('tambahpromosi')->with('kost', $kost);
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
        $this->validate($request, [
            'promosi' => 'required'
        ]);

        $payment = new Pembayaran;
        $payment->valid=0;
        $payment->jenis_promosi = $request->promosi;
        $payment->harga = $request->harga;

        return view('Lakukan pembayaran')->with('payment', $payment);
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
        //
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
        $payment = Pembayaran::find($id);

        if($request->hasFile('foto')){
            $filenameWithExt = $request->file('foto');
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('foto')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            $path = $request->file('foto')->storeAs('/public/image', $fileNameToStore);
            $payment->foto = $fileNameToStore;
        }

        if($request->valid == 1)
        {
            $payment->valid=1;
            $kost=TempatKos::find($payment->id_tempat_kos);
            $mulai_berlaku = now();
            if($payment->jenis_promosi=1) $kost->expired_promotion = $mulai_berlaku->addDays(180);
            else if($payment->jenis_promosi=2) $kost->expired_promotion = $mulai_berlaku->addDays(360);
            else if($payment->jenis_promosi=3) $kost->expired_promotion = $mulai_berlaku->addDays(720);
        }

        $payment->save();

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
    }
}
