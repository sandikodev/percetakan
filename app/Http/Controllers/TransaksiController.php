<?php

namespace App\Http\Controllers;

use App\Mail\send_url_download;
use App\Models\Midtrans_setting;
use App\Models\ProductPrice;
use App\Models\Transaksi;
use App\Models\User;
use App\Models\Website;
use App\Models\whatsapp_setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function callback(Request $request){

        $midtrans  = Midtrans_setting::first();

        $serverKey = $midtrans->server_key;
        $hashed = hash("sha512", $request->order_id.$request->status_code.$request->gross_amount.$serverKey);
        if($hashed == $request->signature_key){
            if($request->transaction_status == 'capture'){
;
                $Transaksi = Transaksi::where('id_midtrans',$request->order_id)->first();
                $Transaksi->update(['status_pembayaran' => 'PAID']);

            }elseif($request->transaction_status == 'settlement'){

                $Transaksi = Transaksi::where('id_midtrans',$request->order_id)->first();
                $Transaksi->update(['status_pembayaran' => 'PAID']);

            }elseif($request->transaction_status == 'pending'){
                $order = Transaksi::where('id_midtrans',$request->order_id)->first();
                
                $order->update(['status_payment' => 'UNPAID']);
                
            }elseif ($request->transaction_status == 'deny') {
                $order = Transaksi::where('id_midtrans',$request->order_id)->first();
                
                $order->update(['status_payment' => 'DITOLAK']);
                
            }elseif ($request->transaction_status == 'expire') {
                $order = Transaksi::where('id_midtrans',$request->order_id)->first();
                
                $order->update(['status_payment' => 'EXPIRED']);
                
            }elseif ($request->transaction_status == 'cancel') {
                $order = Transaksi::where('id_midtrans',$request->order_id)->first();
                
                $order->update(['status_payment' => 'CANCELED']);
            }
            
        }

    }


    public function index()
    {
        //
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
