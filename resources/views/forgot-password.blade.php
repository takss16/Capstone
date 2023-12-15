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
        <a class="navbar-brand ps-3" href="{{ route('admin.login') }}">Pabustan Birthing Clinic</a>
</nav>
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
            @if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-9">
                            <div class="card">
                                <div class="card-body">
                                <div class="card-header text-center">
        <img src="{{ asset('assets/img/logo.png') }}" alt="Logo" width="70" height="70">
        <h5 class="font-weight-light my-4">Pabustan Birthing Clinic</h5>
    </div>

                                    <div class="mb-4 text-sm text-gray-600">
                                        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a temporary password that you can use to log in.') }}
                                    </div>

                                    @if (session('status'))
                                    <div class="mb-4 alert alert-success">
                                        {{ session('status') }}
                                    </div>
                                    @endif

                                    <form method="POST" action="{{ route('password.forgot.submit') }}">
                                        @csrf

                                        <!-- Email Address -->
                                        <div class="mb-3">
                                            <label for="email" class="form-label">{{ __('Email') }}</label>
                                            <input id="email" class="form-control" type="email" name="email" value="{{ old('email') }}" required autofocus>
                                        </div>

                                        <div class="d-grid gap-2">
                                            <button type="submit" class="btn btn-primary">
                                                {{ __('Send Temporary Password') }}
                                            </button>
                                        </div>
                                    </form>
                                </div>
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
    <script src="{{Vite::asset('resources/js/scripts.js')}}"></script>
</body>

</html>