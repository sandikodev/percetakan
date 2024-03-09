<?php

use App\Http\Controllers\Admin\LayananController;
use App\Http\Controllers\Admin\MidtransController;
use App\Http\Controllers\Admin\OrdersController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\WebSettingsController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HomePagesController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TransaksiController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| SOURCE WEBSITE INI DIBUAT OLEH BIKINWEEB.COM
| ALL RIGHT RESERVED @ DILINDUNGI OLEH LISENSI DAN UNDANG-UNDANG.
|
*/

Route::get('/', [HomePagesController::class, 'welcome'])->name('home.welcome');


Route::middleware('auth')->group(function () {
        // orders
        Route::get('/admin/orders', [OrdersController::class, 'all'])->name('orders');
        Route::get('/admin/order/unpaid', [OrdersController::class, 'unpaid'])->name('order.unpaid');
        Route::get('/admin/order/pending', [OrdersController::class, 'pending'])->name('order.pending');
        Route::get('/admin/order/process', [OrdersController::class, 'process'])->name('order.process');
        Route::get('/admin/order/done', [OrdersController::class, 'done'])->name('order.done');


        // Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
        // Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        // Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

        //========================= MEMBER AREA =============================================//   

        // Route::get('/customer/layanan-kami', [CustomerController::class, 'layanan_kami'])->name('customer_layanan.layanan_kami');
        // Route::get('/customer/buat-pesanan', [CustomerController::class, 'buat_pesanan'])->name('orders.buat_pesanan');
        // Route::post('/customer/post-checkout', [CustomerController::class, 'post_review'])->name('orders.post_review');
        // Route::get('/transaksi/review-checkout', [CustomerController::class, 'review_checkout'])->name('orders.review_checkout');
        // // Route::post('/customer/checkout', [CustomerController::class, 'checkout'])->name('orders.checkout');
        // Route::put('/customer/checkout/{id}', [CustomerController::class, 'checkout'])->name('orders.checkout');
        // Route::put('/bayar_nanti/{id}', [CustomerController::class, 'bayar_nanti'])->name('orders.bayar_nanti');
        // Route::put('/bayar_semua/{id}', [CustomerController::class, 'bayar_semua'])->name('orders.bayar_semua');

        // Route::get('/customer/history-pesanan', [CustomerController::class, 'history_pesanan'])->name('orders.history_pesanan');
        // Route::get('/transaksi/invoice', [CustomerController::class, 'invoice'])->name('orders.invoice');
        // Route::put('/customer/manual-checkout/{id}', [CustomerController::class, 'manual_checkout'])->name('checkout.manual_checkout');
        // Route::delete('/customer/transaksi/{id}', [CustomerController::class, 'destroy_transaksi_customer'])->name('orders.destroy_transaksi_customer');

        // Route::get('getBahan/{id}', function ($id) {
        //         $bahan = App\Models\JenisBahan::where('id_layanan', $id)->get();
        //         return response()->json($bahan);
        // });

        // Route::get('getLaminasi/{id}', function ($id) {
        //         $laminasi = App\Models\JenisLaminasi::where('id_layanan', $id)->get();
        //         return response()->json($laminasi);
        // });

        // Route::get('getLebarandPcs/{id}', function ($id) {
        //         $layananlebarpcs = App\Models\Layanan::where('id', $id)->get();
        //         return response()->json($layananlebarpcs);
        // });

        //========================= MEMBER AREA =============================================//    



        //========================= ADMIN AREA =============================================// 

        // Route::get('/admin/layanan/create-bahan', [LayananController::class, 'create_bahan'])->name('layanan.create_bahan');
        // Route::delete('/admin/layanan/bahan/{id}', [LayananController::class, 'destroy_bahan'])->name('layanan.destroy_bahan');
        // Route::put('admin/layanan/bahan/{id}', [LayananController::class, 'update_bahan'])->name('layanan.update_bahan');
        // Route::post('/admin/layanan/bahan', [LayananController::class, 'post_bahan'])->name('layanan.post_bahan');

        // Route::get('/admin/layanan/create-laminasi', [LayananController::class, 'create_laminasi'])->name('layanan.create_laminasi');
        // Route::delete('/admin/layanan/laminasi/{id}', [LayananController::class, 'destroy_laminasi'])->name('layanan.destroy_laminasi');
        // Route::put('admin/layanan/laminasi/{id}', [LayananController::class, 'update_laminasi'])->name('layanan.update_laminasi');
        // Route::post('/admin/layanan/laminasi', [LayananController::class, 'post_laminasi'])->name('layanan.post_laminasi');

        // Route::get('/admin/layanan/create-addons', [LayananController::class, 'create_addons'])->name('layanan.create_addons');
        // Route::delete('/admin/layanan/addons/{id}', [LayananController::class, 'destroy_addons'])->name('layanan.destroy_addons');
        // Route::put('admin/layanan/addons/{id}', [LayananController::class, 'update_addons'])->name('layanan.update_addons');
        // Route::post('/admin/layanan/addons', [LayananController::class, 'post_addons'])->name('layanan.post_addons');

        // Route::get('admin/limit', [OrdersController::class, 'limit_order'])->name('limit_order.limit_order');
        // Route::put('admin/limit/{id}', [OrdersController::class, 'limit_order_update'])->name('limit_order.limit_order_update');


        // Route::resource('admin/layanan', LayananController::class);


        // Route::delete('/admin/transaksi/{id}', [OrdersController::class, 'destroy_admin'])->name('order.destroy_admin');
        // Route::get('/transaksi/data-invoice', [OrdersController::class, 'invoice_admin'])->name('orders.invoice_admin');
        // Route::put('admin/transaksi/ubah-status-order/{id}', [OrdersController::class, 'ubah_status_order'])->name('orders.ubah_status_order');
        // Route::get('/admin/tagihan/semua-tagihan', [OrdersController::class, 'semua_tagihan'])->name('tagihan.semua_tagihan');
        // Route::get('/admin/tagihan/belum-lunas', [OrdersController::class, 'belum_lunas_tagihan'])->name('tagihan.belum_lunas_tagihan');
        // Route::get('/admin/tagihan/lunas', [OrdersController::class, 'lunas_tagihan'])->name('tagihan.lunas_tagihan');
        // Route::put('admin/tagihan/ubah-status-tagihan/{id}', [OrdersController::class, 'ubah_status_pembayaran'])->name('tagihan.ubah_status_pembayaran');
        // Route::get('/admin/item/pengambilan-item', [OrdersController::class, 'pengambilan_item'])->name('item.pengambilan_item');
        // Route::put('admin/users/ubah-status-users/{id}', [UserController::class, 'ubah_status_user'])->name('user_status.ubah_status_user');
        // Route::resource('admin/users', UserController::class);

        // Route::get('admin/settings/payment-gateway', [MidtransController::class, 'index'])->name('midtrans.index');
        // Route::put('admin/settings/ubah-payment-gateway/{id}', [MidtransController::class, 'ubah_midtrans'])->name('midtrans.ubah_midtrans');
        // Route::get('admin/settings/web-settings', [WebSettingsController::class, 'index'])->name('websettings.index');
        // Route::get('admin/settings/whatsapp-gateway', [WebSettingsController::class, 'whatsapp_gateway'])->name('websettings.whatsapp_gateway');
        // Route::put('admin/settings/ubah-whatsapp-settings/{id}', [WebSettingsController::class, 'ubah_whatsapp_settings'])->name('websettings.ubah_whatsapp_settings');
        // Route::get('admin/settings/telegram-gateway', [WebSettingsController::class, 'telegram_gateway'])->name('websettings.telegram_gateway');
        // Route::put('admin/settings/ubah-telegram-settings/{id}', [WebSettingsController::class, 'ubah_telegram_settings'])->name('websettings.ubah_telegram_settings');

        // Route::put('admin/settings/ubah-web-settings/{id}', [WebSettingsController::class, 'ubah_web_settings'])->name('websettings.ubah_web_settings');
        // Route::put('admin/settings/ubah-web-settings-rekening/{id}', [WebSettingsController::class, 'ubah_web_settings_rekening'])->name('websettings.ubah_web_settings_rekening');


        //========================= ADMIN AREA =============================================//    

});

require __DIR__ . '/auth.php';
