<x-guest-layout>
    <style>
       body {
    background-color: #fff5f3;
    font-family: 'Inter', sans-serif;
    margin: 0;
    padding: 0;
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
}

.login-container {
    width: 120%;
    max-width: 1800px; /* kamu bisa ubah ke 850px atau 900px jika masih kurang */
    margin: 100 auto;
    background-color: #ffffff;
    border-radius: 16px;
    padding: 2.5rem 2rem;
    box-shadow: 0 10px 30px rgba(251, 88, 73, 0.1);
    animation: fadeIn 0.8s ease-in-out;
    box-sizing: border-box;
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

        .logo-space img {
            width: 100px;
            height: auto;
            display: block;
        }

        .login-title {
            font-size: 1.75rem;
            font-weight: 700;
            color: #fb5849;
            text-align: center;
            margin-bottom: 1.5rem;
        }

        .form-label {
            font-weight: 600;
            margin-bottom: 6px;
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

        .form-check {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 0.9rem;
            color: #555;
            margin: 10px 0 20px;
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
            display: block;
            margin-top: 1rem;
            font-size: 0.875rem;
            text-align: right;
            color: #666;
            text-decoration: none;
            transition: color 0.3s;
        }

        .link-small:hover {
            color: #fb5849;
        }

        .alert {
            margin-bottom: 1rem;
            padding: 10px 14px;
            background-color: #ecfdf5;
            color: #065f46;
            border-radius: 8px;
            font-size: 0.9rem;
        }

        .error-list {
            background-color: #fef2f2;
            color: #b91c1c;
            padding: 10px 14px;
            border-radius: 8px;
            margin-bottom: 1rem;
            font-size: 0.9rem;
        }

        .error-list ul {
            margin: 0;
            padding-left: 1.2rem;
        }
    </style>


    <div class="login-container">

        <!-- LOGO -->
       <div class="logo-space">
    <img src="{{ asset('assets/images/klassy-logo.png') }}" alt="Logo" width="100">
</div>

        <!-- TITLE -->
        <div class="login-title">Login ke Akun Anda</div>

        <!-- STATUS -->
        @if (session('status'))
            <div class="alert">
                {{ session('status') }}
            </div>
        @endif

        <!-- ERROR LIST -->
        @if ($errors->any())
            <div class="error-list">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- FORM -->
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="mb-4">
                <label for="email" class="form-label">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                       class="form-input" autocomplete="username">
            </div>

            <div class="mb-4">
                <label for="password" class="form-label">Password</label>
                <input id="password" type="password" name="password" required
                       class="form-input" autocomplete="current-password">
            </div>

            <div class="form-check">
                <input type="checkbox" id="remember_me" name="remember">
                <label for="remember_me">Remember me</label>
            </div>

            <button type="submit" class="btn-submit">Log in</button>

            @if (Route::has('password.request'))
                <a class="link-small" href="{{ route('password.request') }}">
                    Lupa password?
                </a>
            @endif
        </form>
    </div>
     </div>
</x-guest-layout>
