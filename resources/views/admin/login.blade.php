@include('components.dashcss')

<body class="">
    <div class="wrapper">
        <section class="login-content overflow-hidden">
            <div class="row no-gutters align-items-center bg-image auth-screen" style="background-image: url('{{ asset('homepage/images/agricultural_technology.jpg') }}'); background-size: cover;">
                <div class="col-md-12 col-lg-12 align-self-center">
                    <div class="row justify-content-center">
                        <div class="col-md-3">
                            <div class="card auth-card  d-flex justify-content-center mb-0 " style=" background-color: rgba(255, 255, 255, 0.5); opacity: 0.9; backdrop-filter: blur(13px);">
                                <div class="card-header">
                                    <h3>{{ __('Admin Login') }}</h3>
                                </div>

                                <div class="card-body">
                                    <form method="POST" action="{{ route('admin.login.submit') }}">
                                        @csrf

                                        <div class="form-group row">
                                            <label for="email"
                                                class=" text-md-right">{{ __('E-Mail Address') }}</label>

                                            <div class="col-md-12">
                                                <input id="email" type="email"
                                                    class="form-control @error('email') is-invalid @enderror"
                                                    name="email" value="{{ old('email') }}" autocomplete="email">

                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="password"
                                                class=" text-md-right">{{ __('Password') }}</label>

                                            <div class="col-md-12">
                                                <input id="password" type="password"
                                                    class="form-control @error('password') is-invalid @enderror"
                                                    name="password" autocomplete="new-password">

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
                                            <div class="col-md-6">
                                                <button type="submit" class="btn btn-warning">
                                                    {{ __('Login') }}
                                                </button>
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
