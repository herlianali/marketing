<?php

namespace App\Http\Controllers;

use App\Models\Gaji;
use App\Models\Pelanggan;
use App\Models\User;
use Auth;
use DB;
use Illuminate\Http\Request;

class GajiController extends Controller
{
    public function index()
    {
        $id_user = Auth::user()->id;
        $marketing = User::where('id', Auth::user()->id)->first();
        $gaji = Gaji::where('user_id', $id_user)->get();
        $total = Gaji::where('user_id', $id_user)->sum('pendapatan');
        // dd($id_user);
        return view('gaji.index', compact('marketing', 'gaji', 'total'));
    }
}
