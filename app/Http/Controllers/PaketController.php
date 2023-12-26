<?php

namespace App\Http\Controllers;

use App\Models\Paket;
use Illuminate\Http\Request;

class PaketController extends Controller
{
    public function index()
    {
        $paket = Paket::all();
        return view('paket.index', compact('paket'));
    }

    public function create()
    {
        return view('paket.tambah_paket');
    }

    public function store(Request $request)
    {
        $request->validate([
            'paket' => ['required', 'string', 'max:255'],
            'fee_marketing' => ['required', 'string', 'max:255'],
        ]);

        $fee_marketing = (int)str_replace('.','',str_replace('Rp. ','',$request->fee_marketing));
        $post = new Paket();
        $post->paket = $request->paket;
        $post->fee_marketing = $fee_marketing;
        $post->save();
        flash('Data Berhasil Disimpan');
        return redirect()->route('paket.index');
    }

    public function edit($id)
    {
        $paket = Paket::where('id', $id)->first();
        return view('paket.edit_paket', compact('paket'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'paket' => ['required', 'string', 'max:255'],
            'fee_marketing' => ['required', 'string', 'max:255'],
        ]);

        $fee_marketing = (int)str_replace('.','',str_replace('Rp. ','',$request->fee_marketing));
        // $post = new Paket;
        // $post->find($id);
        $data = [
            'paket' => $request->paket,
            'fee_marketing' => $fee_marketing,
        ];
        Paket::where('id', $id)->update($data);
        flash('Data Berhasil Disimpan');
        return redirect()->route('paket.index');
    }

    public function destroy($id)
    {
        Paket::where('id', $id)->delete();
        return redirect()->route('paket.index');
    }
}
