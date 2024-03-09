<?php

namespace App\Providers;

// use App\Models\email_setting;
use App\Models\Midtrans_setting;
use Illuminate\Support\ServiceProvider;
use Carbon\Carbon;
use Config;
use Illuminate\Support\Facades\Config as FacadesConfig;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // config(['app.locale' => 'id']);
        // Carbon::setLocale('id');

     
        //     $mailsetting = email_setting::first();
        //     if($mailsetting){
        //         $data = [
        //             'driver'            => $mailsetting->mail_transport,
        //             'host'              => $mailsetting->mail_host,
        //             'port'              => $mailsetting->mail_port,
        //             'encryption'        => $mailsetting->mail_encryption,
        //             'username'          => $mailsetting->mail_username,
        //             'password'          => $mailsetting->mail_password,
        //             'from'              => [
        //                 'address'=>$mailsetting->mail_from,
        //                 'name'   => config('app.name'),
        //             ]
        //         ];
        //         FacadesConfig::set('mail',$data);
        //     }

    }
}
