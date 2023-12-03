<?php

namespace App\Http\Controllers;

use App\Helpers\Pelangganer;
use App\Models\Paket;
use App\Models\Pelanggan;
use App\Models\User;
use Illuminate\Http\Request;
use Storage;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data["pelanggan"] = Pelanggan::all();
        return view('pelanggan', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $marketing = User::where('akses','marketing')->get();
        $paket = Paket::all();
        return view('tambah_pelanggan', compact('marketing', 'paket'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $requestData = $request->validate([
            'nm_pelanggan' => ['required', 'string', 'max:150'],
            'alamat' => 'required',
            'no_hp' => 'required',
            'user_id' => 'required',
            'tgl_masuk' => 'required',
            'paket_id' => 'required',
            'ktp' => 'required|image|mimes:jpeg,png,jpg|max:5000',
            'wajah' => 'required|image|mimes:jpeg,png,jpg|max:5000',
        ]);

        $requestData['bulan'] = date('m', strtotime($request->tgl_masuk));

        if($request->hasFile('ktp')){
            $requestData['ktp'] = $request->file('ktp')->store('public');
        }

        if($request->hasFile('wajah')){
            $requestData['wajah'] = $request->file('wajah')->store('public');
        }
        $requestData['id_pel'] = Pelangganer::IDGenerator(new Pelanggan(), 'id_pel',
        3, 'P'); /** Generate id */
        Pelanggan::create($requestData);
        flash('Data Berhasil Di Simpan');
        return redirect()->route('pelanggan.index');

        // $post = new Pelanggan();
        // $pelanggan = Pelangganer::IDGenerator(new Pelanggan(), 'id_pel', 3, 'P'); /** Generate id */
        // $post->id_pel = $pelanggan;
        // $post->nm_pelanggan = $request->nm_pelanggan;
        // $post->alamat = $request->alamat;
        // $post->no_hp = $request->no_hp;
        // $post->user_id = $request->marketing;
        // $post->tgl_masuk = $request->tgl_masuk;
        // $post->ktp = $request->ktp;
        // $post->wajah = $request->wajah;

        // $post->save();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function edit($pelanggan)
    {
        $marketing = User::all();
        $pelanggan = Pelanggan::where('id_pel', $pelanggan)->first();
        return view('edit_pelanggan',compact('marketing','pelanggan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $requestData = $request->validate([
            'nm_pelanggan' => ['required', 'string', 'max:150'],
            'alamat' => 'required',
            'no_hp' => 'required',
            'user_id' => 'required',
            'tgl_masuk' => 'required',
            'ktp' => 'required|image|mimes:jpeg,png,jpg|max:5000',
            'wajah' => 'required|image|mimes:jpeg,png,jpg|max:5000',
        ]);

        $model = Pelanggan::where('id_pel', $id)->first();
        if($request->hasFile('ktp')){
            $model->ktp && Storage::delete($model->ktp);
            $requestData['ktp'] = $request->file('ktp')->store('public');
        }

        if($request->hasFile('wajah')){
            $model->wajah && Storage::delete($model->wajah);
            $requestData['wajah'] = $request->file('wajah')->store('public');
        }

        // $model->fill($requestData);
        // $model->save();
        Pelanggan::where('id_pel',$id)->update($requestData);
        flash('Data Berhasil Di Ubah');
        return redirect()->route('pelanggan.index');

        // $data = [
        //     'nm_pelanggan' => $request->nm_pelanggan,
        //     'alamat' => $request->alamat,
        //     'no_hp' => $request->no_hp,
        //     'user_id' => $request->marketing,
        //     'tgl_masuk' => $request->tgl_masuk,
        // ];
        // Pelanggan::where('id_pel',$id)->update($data);


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function destroy($pelanggan)
    {
        // Pelanggan::where('id_pel', $pelanggan)->delete();
        $model = Pelanggan::where('id_pel', $pelanggan)->first();
        $model->ktp && Storage::delete($model->ktp);
        $model->wajah && Storage::delete($model->wajah);
        $model->delete();
        flash('Data Berhasil Di Hapus');
        return redirect()->route('pelanggan.index');
    }
}
