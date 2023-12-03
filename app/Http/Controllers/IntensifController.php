<?php

namespace App\Http\Controllers;

use App\Models\Gaji;
use App\Models\Intensif;
use App\Models\Pelanggan;
use App\Models\User;
use DB;
use Illuminate\Http\Request;

class IntensifController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pelanggan = Pelanggan::where('verifikasi','Belum Diverifikasi')
                ->orderBy('id_pel', 'asc')
                ->get();

        return view('intensif', compact('pelanggan'));
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

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Intensif  $intensif
     * @return \Illuminate\Http\Response
     */
    public function show(Intensif $intensif)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Intensif  $intensif
     * @return \Illuminate\Http\Response
     */
    public function edit(Intensif $intensif)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Intensif  $intensif
     * @return \Illuminate\Http\Response
     */
    public function update($pelanggan)
    {

    }

    public function approve($id)
    {
        $data = Pelanggan::where('id_pel', $id)->first();
        $user = User::where('id_user', $data->user_id)->first();
        // dd($user->id);
        DB::table('gaji')->insert([
            'user_id' => $user->id,
            'pelanggan_id' => $data->id,
            'pendapatan' => $data->paket->fee_marketing,
        ]);
        $data->verifikasi='Diterima';
        $data->save();


        flash('Data Berhasil Diterima');
        return redirect()->route('intensif.index');
    }

    public function reject($id)
    {
        $data = Pelanggan::where('id_pel', $id)->first();
        $data->verifikasi='Ditolak';
        $data->save();

        flash('Data Verifikasi Ditolak');
        return redirect()->route('intensif.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Intensif  $intensif
     * @return \Illuminate\Http\Response
     */
    public function destroy(Intensif $intensif)
    {
        //
    }
}
