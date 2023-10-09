<x-layout-appointment>
    <main class="mw-100 col-11 mt-5">
        <div class="d-flex justify-content-center mt-3">
            <div class="col-8 ">
                <div class="card shadow-lg ">
                    <div class="container  col-md-12">
                        <div class="text-center mt-3">
                            <h3>Let's Create Account</h3>
                        </div>
                        <div class="row mt-3">
                            <div class="col-12">
                                <form method="POST" action="{{ route('register') }}">
                                    @csrf

                                    <div class="form-group">
                                        <label for="first_name">{{ __('First Name') }}</label>
                                        <input id="first_name" type="text" class="form-control" name="first_name" value="{{ old('first_name') }}" required autofocus>
                                    </div>

                                    <div class="form-group">
                                        <label for="last_name">{{ __('Last Name') }}</label>
                                        <input id="last_name" type="text" class="form-control" name="last_name" value="{{ old('last_name') }}" required>
                                    </div>


                                    <div class="form-group">
                                        <label for="email">{{ __('E-Mail Address') }}</label>
                                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="password">{{ __('Password') }}</label>
                                        <input id="password" type="password" class="form-control" name="password" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="password-confirm">{{ __('Confirm Password') }}</label>
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                    </div>

                                    <div id="password-error" style="color: red;"></div>

                                    @push('scripts')
                                    <script>
                                        var passwordInput = document.getElementById('password');
                                        var passwordConfirmInput = document.getElementById('password-confirm');
                                        var passwordError = document.getElementById('password-error');

                                        function validatePassword() {
                                            if (passwordInput.value !== passwordConfirmInput.value) {
                                                passwordError.textContent = 'Passwords do not match';
                                            } else {
                                                passwordError.textContent = '';
                                            }
                                        }

                                        passwordConfirmInput.addEventListener('input', validatePassword);
                                    </script>
                                    @endpush



                                    <div class="mb-5">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Register') }}
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</x-layout-appointment>
