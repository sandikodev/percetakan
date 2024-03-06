<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Broadcast;
use App\Models\Midtrans_setting;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Str;
use Illuminate\Mail\SentMessage;

class MidtransController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     function __construct()
     {
         $this->middleware('auth');
         $this->middleware('role:Superadmin');
     }

     public function index()
     {
         $midtrans = Midtrans_setting::where('id','=','1')->first();

         return view('admin.settings.midtrans.index',compact('midtrans'));
     }

     public function ubah_midtrans(Request $request, string $id): RedirectResponse
     {
 
         $request->validate([
             'merchant_id'   => 'required',
             'client_key'            => 'required',
             'server_key'    => 'required',
             'is_production'    => 'required',
             'snap_url'   => 'required',
         ]);


         $midtrans = Midtrans_setting::first();

         $midtrans->update([
            'merchant_id'   =>  $request->merchant_id,
            'client_key'            =>  $request->client_key,
            'server_key'    =>  $request->server_key,
            'is_production'    =>  $request->is_production,
            'snap_url'    =>  $request->snap_url,
        ]);

        notify()->success('Midtrans Berhasil diubah!');
        return redirect()->route('midtrans.index');
 
     }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
