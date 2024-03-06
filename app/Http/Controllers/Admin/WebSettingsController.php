<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request; 
use App\Http\Controllers\Controller;
use App\Models\ProductPrice;
use App\Models\Transaksi;
use App\Models\User;
use App\Models\Website;
use App\Models\whatsapp_setting;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Str;
use Illuminate\Mail\SentMessage;
use Illuminate\Support\Facades\Mail;
use App\Mail\send_url_download;

class WebSettingsController extends Controller
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
         $website = Website::where('id','=','1')->first();

         return view('admin.settings.website.index',compact('website'));
     }

     public function whatsapp_gateway()
     {
         $website = Website::select('whatsapp_gateway')->where('id','=','1')->first();
 
         return view('admin.settings.whatsapp.index',compact('website'));
     }

     public function telegram_gateway()
     {
         $website = Website::select('telegram_gateway')->where('id','=','1')->first();
 
         return view('admin.settings.telegram.index',compact('website'));
     }

     public function ubah_web_settings(Request $request, string $id): RedirectResponse
     {
        // dd($request);
 
         $request->validate([
             'nama_web'     => 'required',
             'payment'      => 'required',
             'icon'         => 'image|mimes:jpeg,png,jpg|max:5048',
         ]);


         $web_setting = Website::first();
 

         if($request->hasFile('icon')){
            // upload photo produk
            $path_photo = public_path('images/');
            !is_dir($path_photo) &&
                mkdir($path_photo, 0777, true);

            $imageName = time() . '.' . $request->icon->extension();
            $request->icon->move($path_photo, $imageName);
            // end upload produk
            $photo_imageName = $imageName;
        }else{
            $photo_imageName = $web_setting->icon;
        }

         $web_setting->update([
            'icon'          =>  $photo_imageName,
            'nama_web'      =>  $request->nama_web,
            'payment'       =>  $request->payment,
        ]);

        notify()->success('Website Settings Berhasil diubah!');
        return redirect()->back();
 
     }

     public function ubah_web_settings_rekening(Request $request, string $id): RedirectResponse
     {
        // dd($request);
 
         $request->validate([
             'nama_bank'            => 'required',
             'norek_bank'           => 'required',
             'nama_pemilik_bank'    => 'required',
         ]);


         $web_setting = Website::first();
 

         $web_setting->update([
            'nama_bank'             =>  $request->nama_bank,
            'norek_bank'            =>  $request->norek_bank,
            'nama_pemilik_bank'     =>  $request->nama_pemilik_bank,
        ]);

        notify()->success('Rekening Berhasil diubah!');
        return redirect()->back();
 
     }

     public function ubah_whatsapp_settings(Request $request, string $id): RedirectResponse
     {
        // dd($request);
 
         $request->validate([
             'whatsapp_gateway'            => 'required',
         ]);


         $web_setting = Website::first();
 

         $web_setting->update([
            'whatsapp_gateway'             =>  $request->whatsapp_gateway,
        ]);

        notify()->success('Whatsapp gateway Berhasil diubah!');
        return redirect()->back();
 
     }

     public function ubah_telegram_settings(Request $request, string $id): RedirectResponse
     {
        // dd($request);
 
         $request->validate([
             'telegram_gateway'            => 'required',
         ]);


         $web_setting = Website::first();
 

         $web_setting->update([
            'telegram_gateway'             =>  $request->telegram_gateway,
        ]);

        notify()->success('Telegram gateway Berhasil diubah!');
        return redirect()->back();
 
     }






/// ================ email notif change =============//

public function ubah_pesan_notif_order_email(Request $request, string $id)
{

   $request->validate([
       'order'            => 'required',
   ]);
   


   $web_setting = Website::first();


   $web_setting->update([
      'email_notif_order'             =>  $request->order,
  ]);

  notify()->success('Data Berhasil diubah!');
  return redirect()->back();

}

public function ubah_pesan_notif_order_sukses_email(Request $request, string $id)
{
   $request->validate([
       'order_sukses'            => 'required',
   ]);


   $web_setting = Website::first();


   $web_setting->update([
      'email_notif_payment_sukses'             =>  $request->order_sukses,
  ]);

  notify()->success('Data Berhasil diubah!');
  return redirect()->back();

}

public function ubah_pesan_notif_setelah_register_email(Request $request, string $id)
{
   $request->validate([
       'setelah_register'            => 'required',
   ]);


   $web_setting = Website::first();


   $web_setting->update([
      'email_notif_setelah_register'             =>  $request->setelah_register,
  ]);

  notify()->success('Data Berhasil diubah!');
  return redirect()->back();

}

/// ================ end email notif ================//


     public function uploadImage(Request $request) {		
        {
            if ($request->hasFile('upload')) {
                 $originName = $request->file('upload')->getClientOriginalName();
                 $fileName = pathinfo($originName, PATHINFO_FILENAME);
                 $extension = $request->file('upload')->getClientOriginalExtension();
                 $fileName = $fileName . '_' . time() . '.' . $extension;
     
                 $request->file('upload')->move(public_path('media'), $fileName);
     
                 $url = asset('media/' . $fileName);
                 return response()->json(['fileName' => $fileName, 'uploaded'=> 1, 'url' => $url]);
             }
         }
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
