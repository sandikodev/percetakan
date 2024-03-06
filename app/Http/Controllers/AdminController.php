<?php

namespace App\Http\Controllers;

use App\Models\Lisensi;
use App\Models\LisensiKategori;
use App\Models\LisensiUsed;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Http;

class AdminController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:Admin||SuperAdmin');
    }
    
    public function dashboard()
    {

 
        return view('admin.index');
    }


    public function informasi()
    {
        return view('admin.informasi');
    }

}
