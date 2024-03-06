<?php

namespace App\Http\Controllers;

use App\Models\Keuntungan;
use App\Models\Kupon;
use App\Models\Tagline;
use App\Models\Testi;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{

    public function __construct() 
    {
        $this->middleware('auth');
    }


    public function index()
    { 
       
        if(Auth::user()->hasRole('Customer') || Auth::user()->hasRole('Reseller')){
            if(Auth::user()->is_active == '0')
            {
                Auth::logout();
                return redirect('/login')->with('warning','Akun anda di non-aktifkan, silakan hubungi admin!');
            }

            $transaksi = Transaksi::where('id_user','=',Auth::user()->id)->orderby('id','Desc')->get();
            return view('home_member',compact('transaksi'));
        }elseif(Auth::user()->hasRole('Admin') || Auth::user()->hasRole('Superadmin')){
            $transaksi = Transaksi::orderby('id','Desc')->get();
            return view('home',compact('transaksi'));
        }else{
            return view('home');
        }

    }
}
