<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Pabustan Birthing Clinic</title>
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>

                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-9">

                            <div class="card-header">
                                <h3 class="text-center font-weight-light my-4">Account Login</h3>
                            </div>
                            <div class="card-body">
                                <form method="POST" action="{{ route('account.login.submit') }}">
                                    @csrf

                                    <div class="form-floating mb-3">
                                        <input class="form-control @error('username') is-invalid @enderror" id="inputUsername" type="text" name="username" value="{{ old('username') }}" placeholder="Username" />
                                        <label for="inputUsername">Username</label>
                                        @error('username')
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
                        <div class="text-muted">Copyright &copy; Your Website 2023</div>
                        <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="{{ Vite::asset('resources/js/scripts.js') }}"></script>
</body>

</html>
