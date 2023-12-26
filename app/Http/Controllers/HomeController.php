<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $total_marketing = User::where('akses', 'marketing')->count();
        $total_pelanggan = Pelanggan::all()->count();
        $total_pelanggan_baru = Pelanggan::where('verifikasi', 'Belum Diverifikasi')->count();
        // dd($total_pelanggan_baru);
        return view('home', compact('total_marketing', 'total_pelanggan', 'total_pelanggan_baru'));
    }
}
