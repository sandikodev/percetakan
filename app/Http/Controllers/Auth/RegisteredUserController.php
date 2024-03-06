<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\send_url_download;
use App\Models\ProductPrice;
use App\Models\Transaksi;
use App\Models\User;
use App\Models\Website;
use App\Models\whatsapp_setting;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;
use Illuminate\Support\Facades\URL;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {


      return view('auth.login');

    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        
        // REPLACE INPUT NOMOR WHATSAPP BERAWALAN 62
        $hilangkan0_diawal = (int)$request->nomor_whatsapp;
        $tambahkan62_didepan = '62'.$hilangkan0_diawal;
        // REPLACE INPUT NOMOR WHATSAPP BERAWALAN 62

        $request->merge([
            'nomor_whatsapp' => $tambahkan62_didepan,
        ]);

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'nomor_whatsapp' => ['required', 'string', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $id_afiliasi = Str::random(8,time());

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'nomor_whatsapp' => $tambahkan62_didepan,
            'id_afiliasi'   => $id_afiliasi,
            'password' => Hash::make($request->password),
        ]);

        $user->assignRole('Customer');

        event(new Registered($user));

        Auth::login($user);
              
        notify()->success('Akun berhasil didaftarkan! ⚡️');
        return redirect(RouteServiceProvider::HOME);
    }
}
