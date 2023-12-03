<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class MarketingController extends Controller
{
    public function index()
    {
        $marketing = User::where('akses', 'marketing')->get();
        return view('marketing.index', compact('marketing'));
    }

    public function create()
    {
        return view('marketing.tambah_marketing');
    }
}
