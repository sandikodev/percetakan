<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Spatie\Permission\Traits\HasRoles;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    use HasRoles;

    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        // dd( $request->user()->nomor_whatsapp);
        // CEK APAKAH NOMOR WA BERAWALAN 62 ATAU TIDAK, JIKA TIDAK MAKA TOLAK
         $get2digitawal = substr($request->nomor_whatsapp, 0, 2);

         if($get2digitawal == '62'){

            $request->user()->fill($request->validated());

            if ($request->user()->isDirty('email')) {
                $request->user()->email_verified_at = null;
            }
    
            $request->user()->save();
            notify()->success('Berhasil, profil telah diubah! ⚡️');
    
            return Redirect::route('profile.edit')->with('status', 'profile-updated');

         }else{
            notify()->error('Nomor whatsapp harus berawalan "62"');
            return Redirect::route('profile.edit');
         }
        // CEK APAKAH NOMOR WA BERAWALAN 62 ATAU TIDAK, JIKA TIDAK MAKA TOLAK

    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
