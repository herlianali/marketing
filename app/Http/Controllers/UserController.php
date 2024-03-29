<?php

namespace App\Http\Controllers;

use App\Helpers\Userer;
use App\Models\Pelanggan;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\DataTables;

class UserController extends Controller
{
    public function index()
    {
        $data = User::all();
        return view('data_marketing', compact('data'));
    }

    public function create()
    {
        return view('tambah_data_marketing');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'akses' => 'required|in:marketing,administrator,manager_marketing',
            'no_rek' => 'sometimes|required|numeric',
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $post = new User();
        $user = Userer::IDGenerator(new User(), 'id_user', 3, 'U'); /** Generate id */
        $post->id_user = $user;
        $post->nama = $request->nama;
        $post->akses = $request->akses;
        $post->no_rek = $request->no_rek;
        $post->password = Hash::make($request->password);
        // $post->password = $request->password;
        $post->save();
        if($request->hasFile('ktp')){
            $requestData['ktp'] = $request->file('ktp')->store('public');
        }

        if($request->hasFile('foto')){
            $requestData['foto'] = $request->file('foto')->store('public');
        }
        flash('Data Berhasil Di Simpan');
        return redirect()->route('user.index');

    }

    public function show($sales)
    {
        // $marketing = Pelanggan::all();
        $sales = User::where('id_user', $sales)->first();
        return view('detail_marketing',compact('sales'));
    }

    public function edit($user)
    {
        $user = User::where('id_user', $user)->first();
        return view('edit_data_marketing',compact('user'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'akses' => 'required|in:marketing,administrator,manager_marketing',
            'no_rek' => 'sometimes|required|numeric',
            'ktp' => 'required|image|mimes:jpeg,png,jpg|max:5000',
            'foto' => 'required|image|mimes:jpeg,png,jpg|max:5000',
            'cv' => 'required|mimes:pdf,doc,docx|max:5000',
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $model = User::where('id_user', $id)->first();
        if($request->hasFile('ktp')){
            $model->ktp && Storage::delete($model->ktp);
            $requestData['ktp'] = $request->file('ktp')->store('public');
        }

        if($request->hasFile('foto')){
            $model->foto && Storage::delete($model->foto);
            $requestData['foto'] = $request->file('foto')->store('public');
        }

        if($request->hasFile('cv')){
            $model->cv && Storage::delete($model->cv);
            $requestData['cv'] = $request->file('cv')->store('public');
        }

        $data = [
            'nama' => $request->nama,
            'akses' => $request->akses,
            'no_rek' => $request->no_rek,
            // 'password' => $request->password,
            'password' => Hash::make($request->password),
        ];
        User::where('id_user',$id)->update($data);

        flash('Data Berhasil Di Ubah');
        if (Auth::user()->akses == 'marketing') {
            return redirect()->route('home');
        }else{
            return redirect()->route('user.index');
        }
    }

    public function destroy($user)
    {
        User::where('id_user', $user)->delete();
        flash('Data Berhasil Di Hapus');
        return redirect()->route('user.index');
    }
}
