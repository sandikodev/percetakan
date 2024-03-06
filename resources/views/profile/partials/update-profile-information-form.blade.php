<section>
    <header>
        <h1 class="text-lg font-medium text-gray-900">
            {{ __('Profile Information') }}
        </h1>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update your account's profile information.") }}
        </p>
    </header>
    <br>
    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

    <div class="row">

     <div class="col-12">
        <div>
            <x-input-label for="name" :value="__('Nama lengkap')" />
            <x-text-input id="name" name="name" type="text" class="form-control" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>
        <br>
        <div>
            <x-input-label for="nomor_whatsapp" :value="__('Nomor Whatsapp')" />
            <font color="green">
                <span><small>*nomor harus berawalan 62 ( contoh : 6289671222233 )</small></span>
            </font>
            <x-text-input id="nomor_whatsapp" name="nomor_whatsapp" type="number" class="form-control" :value="old('nomor_whatsapp', $user->nomor_whatsapp)" required autofocus autocomplete="nomor_whatsapp" />
            <x-input-error class="mt-2" :messages="$errors->get('nomor_whatsapp')" />
        </div>
        <br>
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="form-control" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification" class="btn btn-primary me-sm-3 me-1 waves-effect waves-light " style="background-color: #7367f0;">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>
        <br>
        <div>
            <x-input-label for="id_telegram" :value="__('ID Telegram')" />
            <x-text-input id="id_telegram" name="id_telegram" type="text" class="form-control" :value="old('id_telegram', $user->id_telegram)" required autofocus autocomplete="id_telegram" />
            <x-input-error class="mt-2" :messages="$errors->get('id_telegram')" />
        </div>
     </div>

    </div>


        <br>
        <div class="flex items-center gap-4">
            <center>
            <x-primary-button class="btn btn-primary waves-effect waves-light " style="background-color: #7367f0;">{{ __('Save') }}</x-primary-button>
            </center>
            @if (session('status') === 'profile-updated')
              
            @endif
        </div>
    </form>
</section>
