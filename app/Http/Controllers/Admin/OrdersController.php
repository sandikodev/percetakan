<?php

namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Layanan;
use App\Models\LimitOrder;
use App\Models\Midtrans_setting;
use App\Models\Transaksi;
use App\Models\Website;
use Illuminate\Http\RedirectResponse;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:Admin||Superadmin');
    }

    public function limit_order()
    {
        $limit = LimitOrder::orderby('id', 'Desc')->get();
        return view('admin.limit.index', compact('limit'));
    }

    public function limit_order_update(Request $request, string $id): RedirectResponse
    {
        $request->validate([
            'maksimal_pending_pembayaran' => 'required',
        ]);

        $limit = LimitOrder::where('id', $id)->first();
        $limit->update([
            'maksimal_pending_pembayaran' => $request->maksimal_pending_pembayaran,
        ]);
        notify()->success('Data Berhasil diubah!');
        return redirect()->back();
    }


    public function all()
    {
        $transaksi = Transaksi::orderby('id', 'Desc')->get();
        return view('admin.orders.all', compact('transaksi'));
    }

    public function unpaid()
    {
        $transaksi = Transaksi::where('status_pembayaran', '=', 'UNPAID')->orderby('id', 'Desc')->get();
        return view('admin.orders.unpaid', compact('transaksi'));
    }

    public function pending()
    {
        $transaksi = Transaksi::where('status_pembayaran', '=', 'PAID')->orWhere('status_pembayaran', '=', 'POSTPAID')->orderby('id', 'Desc')->get();
        return view('admin.orders.pending', compact('transaksi'));
    }

    public function process()
    {
        $transaksi = Transaksi::where('status_order', '=', 'PROSES')->orderby('id', 'Desc')->get();
        return view('admin.orders.process', compact('transaksi'));
    }

    public function done()
    {
        $transaksi = Transaksi::where('status_order', '=', 'SELESAI')->orderby('id', 'Desc')->get();
        return view('admin.orders.all', compact('transaksi'));
    }

    public function destroy_admin(string $id)
    {
        $Transaksi = Transaksi::findOrfail($id);
        $Transaksi->delete();
        notify()->success('Transaksi berhasil dihapus! ⚡️');
        return redirect()->back();
    }

    public function semua_tagihan()
    {
        $transaksi = Transaksi::orderby('id', 'Desc')->get();
        return view('admin.tagihan.semua_tagihan', compact('transaksi'));
    }

    public function belum_lunas_tagihan()
    {
        $transaksi = Transaksi::where('status_pembayaran', '=', 'UNPAID')->orWhere('status_pembayaran', '=', 'POSTPAID')->orderby('id', 'Desc')->get();
        return view('admin.tagihan.belum_lunas_tagihan', compact('transaksi'));
    }

    public function lunas_tagihan()
    {
        $transaksi = Transaksi::where('status_pembayaran', '=', 'PAID')->orderby('id', 'Desc')->get();
        return view('admin.tagihan.lunas_tagihan', compact('transaksi'));
    }

    public function pengambilan_item()
    {
        $transaksi = Transaksi::where('status_order', '=', 'SELESAI')->orderby('id', 'Desc')->get();
        return view('admin.pengambilan_item.pengambilan_item', compact('transaksi'));
    }



    public function invoice_admin()
    {
        $token = $_GET['d'];
        $cek_id = Transaksi::where('id_transaksi', '=', $token)->first();
        if ($cek_id == NULL) {
            return abort(404);
        } else {
            $satuanlayanan = Layanan::where('id', '=', $cek_id->id_layanan)->first();
            $transaksi = Transaksi::where('id_transaksi', '=', $token)->first();
            $transaksi->update([
                'id_midtrans'  => time(),
            ]);

            $transaksi = Transaksi::where('id_transaksi', '=', $token)->first();
            $web_setting = Website::first();
            if ($web_setting->payment === 'OTOMATIS') {
                $midtrans  = Midtrans_setting::first();
                if ($midtrans->is_production == 'false') {
                    $isproduction = \Midtrans\Config::$isProduction = false;
                } elseif ($midtrans->is_production == 'true') {
                    $isproduction = \Midtrans\Config::$isProduction = true;
                } else {
                }

                // Set your Merchant Server Key
                \Midtrans\Config::$serverKey = "$midtrans->server_key";
                // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
                $isproduction;
                // Set sanitization on (default)
                \Midtrans\Config::$isSanitized = true;
                // Set 3DS transaction for credit card to true
                \Midtrans\Config::$is3ds = true;

                $params = array(
                    'transaction_details' => array(
                        'order_id' => $transaksi->id_midtrans,
                        'gross_amount' => $transaksi->total_tagihan,
                    ),
                    'customer_details' => array(
                        'first_name' =>  $transaksi->nama_lengkap,
                        'email' => $transaksi->email,
                    ),
                );

                $snapToken = \Midtrans\Snap::getSnapToken($params);

                $transaksi = Transaksi::where('id_transaksi', '=', $token)->first();

                $transaksi->update([
                    'snapToken'  => $snapToken,
                ]);
            } else {
                $snapToken = '';
            }

            return view('member.orders.invoice', compact('transaksi', 'snapToken', 'satuanlayanan'));
        }
    }


    public function ubah_status_order(Request $request, string $id): RedirectResponse
    {
        $request->validate([
            'status_order'       => 'required',
        ]);


        $Transaksi = Transaksi::where('id', $id)->first();

        if ($request->status_order === 'PENDING') {
            $status = 'PROSES';
        } elseif ($request->status_order === 'PROSES') {
            $status = 'SELESAI';
        } else {
            $status = $Transaksi->status_order;
        }


        $Transaksi->update([
            'harga_addons_service'     =>  $request->biaya_addons,
            'status_order'             =>  $status,
        ]);

        notify()->success('Data Berhasil diubah!');
        return redirect()->back();
    }

    public function ubah_status_pembayaran(Request $request, string $id): RedirectResponse
    {
        $request->validate([
            'status_pembayaran'       => 'required',
        ]);


        $Transaksi = Transaksi::where('id', $id)->first();


        $Transaksi->update([
            'status_pembayaran'     =>  $request->status_pembayaran,
        ]);

        notify()->success('Status Pembayaran Berhasil diubah!');
        return redirect()->back();
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
