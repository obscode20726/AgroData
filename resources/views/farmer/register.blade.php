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
                        <div class="col-md-6"> <!-- Set the width to 50% for the password input and strength meter -->
                            <div class="card auth-card d-flex justify-content-center mb-0" style="background-color: rgba(255, 255, 255, 0.5); opacity: 0.9; backdrop-filter: blur(13px);">
                                <div class="card-header">
                                    <h3>{{ __('Register as a Farmer') }}</h3>
                                    <p class="mt-4">Fill In your account details</p>
                                </div>

                                <div class="card-body">
                                    <form method="POST" action="{{ route('farmer.register.submit') }}">
                                        @csrf

                                        <div class="form-group row">
                                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                            <div class="col-md-6">
                                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="name" autofocus>
                                                @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                                            <div class="col-md-6">
                                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email">
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Phone') }}</label>

                                            <div class="col-md-6">
                                                <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" autocomplete="phone">
                                                @error('phone')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>

                                            <div class="col-md-6">
                                                <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" autocomplete="address">
                                                @error('address')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                            <div class="col-md-6"> <!-- Set the width to 50% for the password input and strength meter -->
                                                <div class="input-group align-items-center"> <!-- Add the class "align-items-center" here -->
                                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text toggle-password"><i class="far fa-eye"></i></span>
                                                    </div>
                                                </div>
                                                <div class="password-strength-meter mt-2">
                                                    <div class="progress">
                                                        <div class="progress-bar" role="progressbar" style="width: 0;"></div>
                                                    </div>
                                                    <small class="form-text password-strength-label">Weak</small>
                                                </div>
                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                            <div class="col-md-6">
                                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password">
                                            </div>
                                        </div>

                                        <div class="form-group row mb-0">
                                            <div class="col-md-6 offset-md-4">
                                                <button type="submit" class="btn btn-warning">
                                                    {{ __('Register') }}
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

    <!-- JavaScript to toggle password visibility and calculate password strength -->
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

            function updatePasswordStrengthIndicator(strengthPercentage) {
                const progressbar = document.querySelector(".password-strength-meter .progress-bar");
                const strengthLabel = document.querySelector(".password-strength-label");

                // Update the progress bar and strength label
                progressbar.style.width = strengthPercentage + "%";

                if (strengthPercentage >= 70) {
                    progressbar.classList.remove("bg-warning");
                    progressbar.classList.add("bg-success");
                    strengthLabel.innerText = "Strong";
                    strengthLabel.classList.remove("text-warning");
                    strengthLabel.classList.add("text-success");
                } else if (strengthPercentage >= 40) {
                    progressbar.classList.remove("bg-success");
                    progressbar.classList.add("bg-warning");
                    strengthLabel.innerText = "Medium";
                    strengthLabel.classList.remove("text-success");
                    strengthLabel.classList.add("text-warning");
                } else {
                    progressbar.classList.remove("bg-warning", "bg-success");
                    strengthLabel.innerText = "Weak";
                    strengthLabel.classList.remove("text-warning", "text-success");
                }
            }

            function calculatePasswordStrength(password) {
                // Implement your password strength calculation logic here
                // You can use regex, character count, etc. to evaluate the strength
                // and return a value between 0 and 100 representing the strength percentage
                // For example, you can count the number of characters or complexity of characters in the password.
                // The current implementation is a simple example and may not be suitable for production use.

                // Sample implementation (just for demonstration purposes)
                const minLength = 8;
                const maxLength = 20;
                const uppercaseRegex = /[A-Z]/;
                const lowercaseRegex = /[a-z]/;
                const digitRegex = /[0-9]/;
                const symbolRegex = /[^A-Za-z0-9]/;

                let strengthPercentage = 0;
                let score = 0;
                const length = password.length;

                if (length >= minLength && length <= maxLength) {
                    score += 20;
                }

                if (uppercaseRegex.test(password)) {
                    score += 20;
                }

                if (lowercaseRegex.test(password)) {
                    score += 20;
                }

                if (digitRegex.test(password)) {
                    score += 20;
                }

                if (symbolRegex.test(password)) {
                    score += 20;
                }

                strengthPercentage = Math.round((score / 100) * 100);

                return strengthPercentage;
            }

            passwordInput.addEventListener("input", function() {
                const password = this.value;
                const strengthPercentage = calculatePasswordStrength(password);
                updatePasswordStrengthIndicator(strengthPercentage);
            });
        });
    </script>
</body>

