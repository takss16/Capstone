<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Pabustan Birthing Clinic</title>
    <link href="{{asset('css/styles.css')}}" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="">
    <nav class="sb-topnav navbar navbar-expand border-bottom shadow" style="background-color: #e3f2fd;">
        <!-- Navbar Brand-->
        <img src="{{ asset('img/logo.png') }}" alt="Pabustan Birthing Clinic" width="50" height="50">
        <a class="navbar-brand ps-3" href="{{ route('contact-display') }}">Pabustan Birthing Clinic</a>
    </nav>
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>

                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-9">

                            <div class="card-header">
                                <h3 class="text-center font-weight-light my-4">Admin Login</h3>
                            </div>
                            <div class="card-body">
                                <form method="POST" action="{{ route('admin.login.check') }}">
                                    @csrf

                                    <div class="form-floating mb-3">
                                        <input class="form-control @error('email') is-invalid @enderror" id="inputEmail" type="email" name="email" value="{{ old('email') }}" placeholder="name@example.com" />
                                        <label for="inputEmail">Email</label>
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input class="form-control @error('password') is-invalid @enderror" id="inputPassword" type="password" name="password" placeholder="Password" />
                                        <label for="inputPassword">Password</label>
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-check mb-3">
                                        <input class="form-check-input" id="inputRememberPassword" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="inputRememberPassword">Remember Password</label>
                                    </div>
                                    <a href="{{ route('password.forgot') }}" class="btn btn-link">
                                        {{ __('Forgot your password?') }}
                                    </a>

                                    <div class="d-flex align-items-center justify-content-between mt-4 mb-0">

                                        <button type="submit" class="btn btn-primary">Login</button>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </main>
        </div>
        <div id="layoutAuthentication_footer">
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Pabustan Birthing Clinic 2023</div>
                        <div>
                            <a >Develope by</a>
                           
                            <a > Manugue et al</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="{{Vite::asset('resources/js/scripts.js')}}"></script>
</body>

</html>