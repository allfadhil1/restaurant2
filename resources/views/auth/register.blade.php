<x-guest-layout>
    <style>
        body {
            background-color: #fff5f3;
            font-family: 'Inter', sans-serif;
            margin: 0;
            padding: 0;
        }

        .register-container {
            max-width: 850px;
            margin: 4rem auto;
            background-color: #ffffff;
            border-radius: 16px;
            padding: 2.5rem 2rem;
            box-shadow: 0 10px 30px rgba(251, 88, 73, 0.1);
            animation: fadeIn 0.8s ease-in-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .logo-space {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 10px 0;
            margin-bottom: 1.5rem;
        }

        .register-title {
            font-size: 1.75rem;
            font-weight: 700;
            color: #fb5849;
            text-align: center;
            margin-bottom: 1.5rem;
        }

        .form-label {
            font-weight: 600;
            color: #333;
        }

        .form-input {
            width: 100%;
            padding: 10px 14px;
            border: 2px solid #e2e8f0;
            border-radius: 10px;
            outline: none;
            font-size: 1rem;
            transition: 0.3s;
        }

        .form-input:focus {
            border-color: #fb5849;
            box-shadow: 0 0 0 3px rgba(251, 88, 73, 0.2);
        }

        .btn-submit {
            background-color: #fb5849;
            border: none;
            color: white;
            width: 100%;
            padding: 12px;
            border-radius: 10px;
            font-weight: 600;
            font-size: 1rem;
            cursor: pointer;
            transition: 0.3s;
        }

        .btn-submit:hover {
            background-color: #e14a3d;
        }

        .link-small {
            display: inline-block;
            margin-top: 1rem;
            font-size: 0.875rem;
            color: #666;
            text-decoration: none;
            transition: color 0.3s;
        }

        .link-small:hover {
            color: #fb5849;
        }
    </style>

    <div class="register-container">

        <div class="logo-space">
            <img src="{{ asset('assets/images/klassy-logo.png') }}" alt="Logo" width="100">
        </div>

        <div class="register-title">Buat Akun Baru</div>

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="mb-4">
                <x-label for="name" value="Nama Lengkap" class="form-label" />
                <x-input id="name" class="form-input mt-1" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="mb-4">
                <x-label for="email" value="Email" class="form-label" />
                <x-input id="email" class="form-input mt-1" type="email" name="email" :value="old('email')" required autocomplete="username" />
            </div>

            <div class="mb-4">
                <x-label for="password" value="Password" class="form-label" />
                <x-input id="password" class="form-input mt-1" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mb-4">
                <x-label for="password_confirmation" value="Konfirmasi Password" class="form-label" />
                <x-input id="password_confirmation" class="form-input mt-1" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mb-4">
                    <x-label for="terms">
                        <div class="flex items-center">
                            <x-checkbox name="terms" id="terms" required />
                            <div class="ml-2">
                                {!! __('Saya menyetujui :terms_of_service dan :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Syarat Layanan').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Kebijakan Privasi').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-label>
                </div>
            @endif

            <div class="flex items-center justify-between mt-6">
                <a class="link-small" href="{{ route('login') }}">
                    Sudah punya akun?
                </a>

                <button type="submit" class="btn-submit w-40">
                    Daftar
                </button>
            </div>
        </form>
    </div>
</x-guest-layout>
