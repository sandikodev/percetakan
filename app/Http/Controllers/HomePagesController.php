<?php

namespace App\Http\Controllers;

use App\Mail\send_url_download;
use App\Models\Faq;
use App\Models\Keuntungan;
use App\Models\Kontak;
use App\Models\Kupon;
use App\Models\Product;
use App\Models\Tagline;
use App\Models\Testi;
use App\Models\User;
use App\Models\Website;
use App\Models\whatsapp_setting;
use Illuminate\Http\Request;
use GuzzleHttp;
use Illuminate\Support\Facades\Http as FacadesHttp;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use File;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\URL;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Support\Str;
use Illuminate\Auth\Events\Registered;

class HomePagesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    protected $table='categories';

    public function __construct() 
    {
       // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    { 
       // return view('home');
    }

    public function welcome()
    { 

        return view('auth.login');
        
    }

}