<?php

namespace App\Http\Controllers;

use App\Models\Addons;
use App\Models\BayarSemua;
use App\Models\JenisBahan;
use App\Models\JenisLaminasi;
use App\Models\Layanan;
use App\Models\LimitOrder;
use App\Models\Midtrans_setting;
use App\Models\Penarikan_komisi;
use App\Models\Product;
use App\Models\ReviewCheckout;
use App\Models\Transaksi;
use App\Models\User;
use App\Models\Website;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Str;
use Illuminate\Contracts\View\View;

class CustomerController extends Controller
{

    function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:Customer||Reseller');
    }
    /**
     * Display a listing of the resource. 
     */
    public function index()
    {
        $orders = Transaksi::where('id_user','=',Auth::user()->id)->orderby('id','Desc')->get();
        $total_unpaid = Transaksi::where([ ['id_user','=',Auth::user()->id],['status_pembayaran','=','UNPAID'] ])->count('id');
        return view('member.orders.index',compact('orders','total_unpaid'));
    }

    public function produk_dashboard()
    {
        $produk = Product::where('status','=','PUBLISH')->orderby('id','Desc')->get();
        return view('member.produk.index',compact('produk'));
    }


    public function layanan_kami()
    {
        $layanan = Layanan::all();
        $bahan   = JenisBahan::all();
        $laminasi = JenisLaminasi::all();
        $addons = Addons::all();

        return view('member.layanan.index',compact('layanan','bahan','laminasi','addons'));
    }

    public function buat_pesanan()
    {
        $layanan = Layanan::all();
        $bahan   = JenisBahan::all();
        $laminasi = JenisLaminasi::all();
        $addons = Addons::all();

       
        if(Auth::user()->hasRole('Customer') === true){
            $transaksi = Transaksi::where([['status_pembayaran','=','UNPAID'], ['id_user','=',Auth::user()->id ] ])->count('id');
            $get_limit_order = LimitOrder::where('roles','=','Customer')->first();

            if($transaksi >= $get_limit_order->maksimal_pending_pembayaran){
                notify()->warning('Maaf, Anda Harus Melunasi Order Sebelumnya terlebih dulu!');
                return redirect()->back();
            }
        }

        if(Auth::user()->hasRole('Reseller') === true){
            $transaksi = Transaksi::where([['status_pembayaran','=','UNPAID'], ['id_user','=',Auth::user()->id ] ])->count('id');
            $get_limit_order = LimitOrder::where('roles','=','Reseller')->first();

            if($transaksi >= $get_limit_order->maksimal_pending_pembayaran){
                notify()->warning('Maaf, Anda Harus Melunasi Order Sebelumnya terlebih dulu!');
                return redirect()->back();
            }
        }

        return view('member.orders.create',compact('layanan','bahan','laminasi','addons'));
    }

    public function post_review(Request $request)
    {

        $request->validate([
            'url_berkas'       => 'required',
            'layanan'          => 'required|max:255',
        ]);
        

        $layanan = Layanan::find($request->layanan);
        $bahan   = JenisBahan::find($request->bahan);

        if ($layanan === null) {
            notify()->warning('Maaf, Layanan tidak tersedia!');
            return redirect()->back();
        }

        if(!empty($request->lebar1))
        {
            $lebar = $request->lebar1;
        }
        if(!empty($request->lebar2))
        {
            $lebar = $request->lebar2;
        }

        if ($bahan === null) {
            // notify()->warning('Maaf, Jenis Bahan tidak tersedia!');
            // return redirect()->back();
            $bahanpanjang = 0;
            $bahanharga = 0;
            $bahannama = '';
        }else{
            $bahanpanjang = $bahan->panjang;
            $bahanharga = $bahan->harga_cm2;
            $bahannama = $bahan->nama_bahan;
        }

        if(!empty($request->laminasi)){

            $laminasi = JenisLaminasi::find($request->laminasi);

            if ($laminasi === null) {
                // notify()->warning('Maaf, Jenis Laminasi tidak tersedia!');
                // return redirect()->back();
                $id_laminasi = null;
                $nama_laminasi = null;
                $harga_laminasi = null;
            }else{
                $id_laminasi = $laminasi->id;
                $nama_laminasi = $laminasi->nama_laminasi;
                $harga_laminasi = $laminasi->harga_cm2;
            }

            $bahanpanjang = $bahan->panjang;
            $bahanharga = $bahan->harga_cm2;

           

            $hitung_bahan    = ($lebar * $bahanpanjang) * $bahanharga;
            $hitung_laminasi = ($lebar * $bahanpanjang) * $harga_laminasi;
            $total_tagihan   = $hitung_bahan + $hitung_laminasi;

       
        }else{

            $id_laminasi = null;
            $nama_laminasi = null;
            $harga_laminasi = null;

            if($bahan === null){
                $bahanpanjang = 0;
            }else{
                $bahanpanjang = $bahan->panjang;
            }

    

            $hitung_bahan    = ($lebar * $bahanpanjang) * $bahanharga;
            $total_tagihan   = $hitung_bahan;

        }



        $id_transaksi       = Str::random(32,time());

        if($total_tagihan <= 1)
        {
                notify()->warning('Maaf, Total tagihan anda kurang dari Rp 1');
                return redirect()->back();
        }
      
        
        ReviewCheckout::create([
            'id_transaksi'          => $id_transaksi,
            'id_user'               => Auth::user()->id,
            'id_layanan'            => $layanan->id,
            'nama_layanan'          => $layanan->nama_service,
            'keterangan_layanan'    => $layanan->keterangan,
            'url_berkas'            => $request->url_berkas,
            'lebar'                 => $lebar,
            'id_bahan'              => $request->bahan,
            'nama_bahan'            => $bahannama,
            'panjang_bahan'         => $bahanpanjang,
            'harga_bahan_cm2'       => $bahanharga,
            'id_laminasi'           => $id_laminasi,
            'nama_laminasi'         => $nama_laminasi,
            'harga_laminasi_cm2'    => $harga_laminasi,
            'addons_service'        => $request->addons_service,
            'total_tagihan'         => $total_tagihan,
            'catatan_order'         => $request->catatan,
            'url_invoice'           => url('/transaksi/invoice?d='.$id_transaksi),
            'status_pembayaran'     => 'UNPAID',
            'nama_lengkap'          => Auth::user()->name,
            'email'                 => Auth::user()->email,
            'whatsapp'              => Auth::user()->nomor_whatsapp,
        ]);

        notify()->success('Silakan Review Pesanan Anda! ⚡️');
        return redirect()->route('orders.review_checkout',['d' => $id_transaksi]); 

    }


    public function checkout(Request $request, string $id)
    {
        if(empty($id)){
            notify()->warning('Maaf, terjadi kesalahan!');
            return redirect()->back();
        }

        $review_checkout = ReviewCheckout::where('id_transaksi','=',$id)->first();

        if(empty($review_checkout) || $review_checkout === null){
            notify()->warning('Maaf, terjadi kesalahan!');
            return redirect()->back();
        }
        
        $transaksi = $review_checkout->replicate(); 
        $transaksi->setTable('tb_transaksi');
        $transaksi->save();

        $hapus_review = ReviewCheckout::where('id_transaksi','=',$id)->first();
        $hapus_review->delete();

        notify()->success('Silakan melakukan pembayaran! ⚡️');
        return redirect()->route('orders.invoice',['d' => $id]);


    }


    public function checkout_sebelumnya(Request $request)
    {
        $request->validate([
            'url_berkas'       => 'required',
            'lebar'            => 'required|numeric|min:1|max:100',
            'layanan'          => 'required|max:255',
        ]);

        $layanan = Layanan::find($request->layanan);
        $bahan   = JenisBahan::find($request->bahan);

    

        if ($layanan === null) {
            notify()->warning('Maaf, Layanan tidak tersedia!');
            return redirect()->back();
        }

        if ($bahan === null) {
            notify()->warning('Maaf, Jenis Bahan tidak tersedia!');
            return redirect()->back();
        }

        if(!empty($request->laminasi)){

            $laminasi = JenisLaminasi::find($request->laminasi);

            if ($laminasi === null) {
                notify()->warning('Maaf, Jenis Laminasi tidak tersedia!');
                return redirect()->back();
            }

            $id_laminasi = $laminasi->id;
            $nama_laminasi = $laminasi->nama_laminasi;
            $harga_laminasi = $laminasi->harga_cm2;

            $hitung_bahan    = ($request->lebar * $bahan->panjang) * $bahan->harga_cm2;
            $hitung_laminasi = ($request->lebar * $bahan->panjang) * $harga_laminasi;
            $total_tagihan   = $hitung_bahan + $hitung_laminasi;

        }else{

            $id_laminasi = '';
            $nama_laminasi = '';
            $harga_laminasi = '';

            $hitung_bahan    = ($request->lebar * $bahan->panjang) * $bahan->harga_cm2;
            $total_tagihan   = $hitung_bahan;

        }

        $id_transaksi       = Str::random(32,time());

        $transaksi = Transaksi::create([
            'id_transaksi'          => $id_transaksi,
            'id_user'               => Auth::user()->id,
            'id_layanan'            => $layanan->id,
            'nama_layanan'          => $layanan->nama_service,
            'keterangan_layanan'    => $layanan->keterangan,
            'url_berkas'            => $request->url_berkas,
            'lebar'                 => $request->lebar,
            'id_bahan'              => $request->bahan,
            'nama_bahan'            => $bahan->nama_bahan,
            'panjang_bahan'         => $bahan->panjang,
            'harga_bahan_cm2'       => $bahan->harga_cm2,
            'id_laminasi'           => $id_laminasi,
            'nama_laminasi'         => $nama_laminasi,
            'harga_laminasi_cm2'    => $harga_laminasi,
            'addons_service'        => $request->addons_service,
            'total_tagihan'         => $total_tagihan,
            'catatan_order'         => $request->catatan,
            'url_invoice'           => url('/transaksi/invoice?d='.$id_transaksi),
            'status_pembayaran'     => 'UNPAID',
            'nama_lengkap'          => Auth::user()->name,
            'email'                 => Auth::user()->email,
            'whatsapp'              => Auth::user()->nomor_whatsapp,
        ]);

        notify()->success('Silakan melakukan pembayaran! ⚡️');
        return redirect()->route('orders.invoice',['d' => $id_transaksi]); 

    }
    
    public function history_pesanan()
    {
        $history = Transaksi::where('id_user','=',Auth::user()->id)->get();
        $total_unpaid = Transaksi::where([ ['id_user','=',Auth::user()->id],['status_pembayaran','=','UNPAID'] ])->count('id');

        return view('member.orders.index',compact('history','total_unpaid'));
    }

    public function bayar_nanti(Request $request, string $id)
    {

        Transaksi::find($id)->update(['status_pembayaran' => 'POSTPAID']);
        notify()->success('Berhasil, status pembayaran anda POSPAID / TERHUTANG ! ⚡️');
        return redirect()->back();
        
    }

    public function bayar_semua(Request $request)
    {
        $transaksi = Transaksi::where([ ['id_user','=',Auth::user()->id],['status_pembayaran','=','UNPAID'] ])->get();
        $id_midtrans = time();
        $mass_update_id_midtrans = Transaksi::where([ ['id_user','=',Auth::user()->id],['status_pembayaran','=','UNPAID'] ])->update(['id_midtrans' => $id_midtrans]);


        
        foreach($transaksi as $item){

            $bayarsemua = BayarSemua::where('id_transaksi','=',$item->id)->first();

            if($bayarsemua == null){
                BayarSemua::create([
                    'id_user' => Auth::user()->id,
                    'id_transaksi' => $item->id,
                    'total_tagihan' => $item->total_tagihan,
                    'status_klik_bayar_semua' => 'ON',
                ]);

            }
        }

        $bayarsemua_data = BayarSemua::where([ ['id_user','=',Auth::user()->id],['status_klik_bayar_semua','=','ON'] ])->get();

        $total_tagihan = BayarSemua::where([ ['id_user','=',Auth::user()->id],['status_klik_bayar_semua','=','ON'] ])->sum('total_tagihan');
       
        $web_setting = Website::first();

        if($web_setting->payment === 'OTOMATIS'){


                $midtrans  = Midtrans_setting::first();

                if($midtrans->is_production == 'false'){
                    $isproduction = \Midtrans\Config::$isProduction = false;
                }elseif($midtrans->is_production == 'true'){
                    $isproduction = \Midtrans\Config::$isProduction = true;
                }else{}
            
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
                            'order_id' => $id_midtrans,
                            'gross_amount' => $total_tagihan,
                        ),
                        'customer_details' => array(
                            'first_name' =>  Auth::user()->name,
                            'email' => Auth::user()->email,
                        ),
                    );

                    $snapToken = \Midtrans\Snap::getSnapToken($params);
                
                    $mass_update_id_midtrans = Transaksi::where([ ['id_user','=',Auth::user()->id],['status_pembayaran','=','UNPAID'] ])->update(['snapToken' => $snapToken]);

        }else{
            $snapToken = '';
        }


        return view('member.orders.invoice_bayar_semua',compact('bayarsemua_data','snapToken','total_tagihan'));
    }

    public function destroy_transaksi_customer(string $id)
    {
        $Transaksi = Transaksi::findOrfail($id);


        if($Transaksi->status_pembayaran === 'UNPAID' && $Transaksi->status_order === 'UNPAID'){

            $Transaksi->delete();
            notify()->success('Transaksi berhasil dihapus! ⚡️');
            return redirect()->back();

        }else{

            notify()->error('MAAF Transaksi Tidak dapat dihapus! ⚡️');
            return redirect()->back();

        }

    }


    public function invoice()
    {   
       // http://percetakan.test/transaksi/invoice?d=osrXxEw8SWgPvwMxunJxbwOu8Qb59aYE

        $token = $_GET['d'];

        $cek_id = Transaksi::where('id_transaksi', '=', $token)->first();


        if($cek_id == NULL){
            return abort(404);
        }else{

           $satuanlayanan = Layanan::where('id','=',$cek_id->id_layanan)->first();

           $transaksi = Transaksi::where('id_transaksi', '=', $token)->first();

           $transaksi->update([
               'id_midtrans'  => time(),
           ]);

           $transaksi = Transaksi::where('id_transaksi', '=', $token)->first();
          
           $web_setting = Website::first();

           if($web_setting->payment === 'OTOMATIS'){


                   $midtrans  = Midtrans_setting::first();

                   if($midtrans->is_production == 'false'){
                       $isproduction = \Midtrans\Config::$isProduction = false;
                   }elseif($midtrans->is_production == 'true'){
                       $isproduction = \Midtrans\Config::$isProduction = true;
                   }else{}
               
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
           }else{
               $snapToken = '';
           }

            return view('member.orders.invoice', compact('transaksi','snapToken','satuanlayanan'));       
        }

    }

    public function review_checkout()
    {   
       // http://percetakan.test/transaksi/invoice?d=osrXxEw8SWgPvwMxunJxbwOu8Qb59aYE

        $token = $_GET['d'];

        $cek_id = ReviewCheckout::where('id_transaksi', '=', $token)->first();

        if($cek_id == NULL){
            return abort(404);
        }else{

           $transaksi = ReviewCheckout::where('id_transaksi', '=', $token)->first();

           $transaksi->update([
               'id_midtrans'  => time(),
           ]);

           $transaksi = ReviewCheckout::where('id_transaksi', '=', $token)->first();
          
           $web_setting = Website::first();

           if($web_setting->payment === 'OTOMATIS'){


                   $midtrans  = Midtrans_setting::first();

                   if($midtrans->is_production == 'false'){
                       $isproduction = \Midtrans\Config::$isProduction = false;
                   }elseif($midtrans->is_production == 'true'){
                       $isproduction = \Midtrans\Config::$isProduction = true;
                   }else{}
               
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
                   
                       $transaksi = ReviewCheckout::where('id_transaksi', '=', $token)->first();

                       $transaksi->update([
                           'snapToken'  => $snapToken,
                       ]);
           }else{
               $snapToken = '';
           }

            return view('member.orders.review_checkout', compact('transaksi','snapToken'));       
        }

    }

    public function manual_checkout(Request $request, string $id)
    {
    //    dd($request);

        $request->validate([
            'file'               => 'required',
            'id_transaksi'       => 'required',
            'type_payment'       => 'required',
        ]);


        $transaksi = Transaksi::where('id', '=', $request->id_transaksi)->first();

        // upload bukti transfer
        $path_photo = public_path('images/bukti_transfer/');
        !is_dir($path_photo) &&
            mkdir($path_photo, 0777, true);

        $imageName = time() . '.' . $request->file->extension();
        $request->file->move($path_photo, $imageName);
        // end upload bukti transfer
        $photo_imageName = $imageName;


        $transaksi->update([
           'bukti_transfer'        =>  $photo_imageName,
           'type_pembayaran'       =>  $request->type_payment,
           'status_pembayaran'     => 'MENUNGGU KONFIRMASI',
       ]);

       notify()->success('Pembayaran Berhasil disubmit, silakan tunggu!');
       return redirect()->back();

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
