@include('components.dashcss')
<head>
    <!-- Other head elements -->

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
</head>
<body class="">
    <div class="wrapper">
        <section class="login-content overflow-hidden">
            <div class="row no-gutters align-items-center bg-primary auth-screen" style="background-image: url('{{ asset('homepage/images/login_farmer_img.jpg') }}'); background-size: cover;">
                <div class="col-md-12 col-lg-12 align-self-center">
                    <div class="row justify-content-center">
                        <div class="col-md-4">
                            <div class="card auth-card  d-flex justify-content-center mb-0" style="background-color: rgba(255, 255, 255, 0.5); opacity: 0.9; backdrop-filter: blur(13px);">
                                <div class="card-header">
                                    <h3>{{ __('Farmer Login') }}</h3>
                                </div>

                                <div class="card-body">
                                    <form method="POST" action="{{ route('farmer.login.submit') }}">
                                        @csrf

                                        <div class="form-group row">
                                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                                            <div class="col-md-12">
                                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email">
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
                                            <div class="col-md-12">
                                                <div class="input-group">
                                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text toggle-password"><i class="far fa-eye"></i></span>
                                                    </div>
                                                </div>
                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-6 offset-md-4">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="remember">
                                                        {{ __('Remember Me') }}
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-0">
                                            <div class="col-md-6 offset-md-4">
                                                <button type="submit" class="btn btn-primary">
                                                    {{ __('Login') }}
                                                </button>
                                                <a href="{{ route('farmer.passwords.reset') }}" class="btn btn-link">
                                                    {{ __('Forgot Your Password?') }}
                                                </a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    @include('components.dashjs')
    <!-- JavaScript to toggle password visibility -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const passwordInput = document.getElementById("password");
            const togglePassword = document.querySelector(".toggle-password");

            togglePassword.addEventListener("click", function() {
                const type = passwordInput.getAttribute("type") === "password" ? "text" : "password";
                passwordInput.setAttribute("type", type);

                // Change the eye icon based on the password visibility
                if (type === "password") {
                    togglePassword.innerHTML = '<i class="far fa-eye"></i>';
                } else {
                    togglePassword.innerHTML = '<i class="far fa-eye-slash"></i>';
                }
            });
        });
    </script>
</body>
