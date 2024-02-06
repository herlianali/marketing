<?php

namespace App\Http\Controllers\Auth;

use App\Helpers\Userer;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nama' => ['required', 'string', 'max:255'],
            'akses' => 'required|in:marketing,administrator,manager_marketing',
            'no_rek' => 'sometimes',
            'ktp' => 'required|image|mimes:jpeg,png,jpg|max:5000',
            'foto' => 'required|image|mimes:jpeg,png,jpg|max:5000',
            'cv' => 'required|mimes:pdf,docx,doc|max:5000',
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        // dd($data->file('ktp'));
        return User::create([
            'id_user' => Userer::IDGenerator(new User, 'id_user', 3, 'U'),
            'nama' => $data['nama'],
            'akses' => $data['akses'],
            'status' => $data['status'],
            'no_rek' => $data['no_rek'],
            // 'no_rek' => $request->file('ktp')->store('public'),
            'password' => Hash::make($data['password']),
        ]);
    }
}
