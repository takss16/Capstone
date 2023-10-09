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
        <div class="d-flex justify-content-center align-items-center min-vh-100">
            <div class="col-10 col-md-6 col-lg-4">
                <div class="card shadow-lg">
                    <div class="card-header text-center">
                        <img src="{{ asset('assets/img/logo.png') }}" alt="Logo" width="70" height="70">
                        <h5 class="font-weight-light my-4">Email Verification</h5>
                    </div>
                    @if (session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif
                    <div class="card-body text-center">
                        <p>Please enter the verification code we sent to your email.</p>

                        <form method="POST" action="{{ route('verify.post') }}">
                            @csrf
                            <div class="form-group col-9 mx-auto">
                                <label for="otp">Verification Code</label>
                                <input id="otp" type="text" class="form-control passcode-input" name="otp" required>
                            </div>
                            <div class="mb-5">
                                <button type="submit" class="btn btn-primary" id="verify-button" disabled>Verify</button>
                            </div>
                        </form>
                        <div id="otp-timer">
                            <p>Time remaining: <span id="countdown">30s</span></p>
                          
                        </div>
                        <form method="POST" action="{{ route('resend-otp') }}">
                        @csrf
                        <button type="submit" id="resend-otp" disabled>Resend OTP</button>
                    </form>
                    </div>
                </div>
            </div>
        </div>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="{{ asset('js/scripts.js') }}" defer></script>
</body>

</html>