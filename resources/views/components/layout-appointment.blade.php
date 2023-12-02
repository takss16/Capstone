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

<body class="sb-nav-fixed ">
    <nav class="sb-topnav navbar navbar-expand border-bottom shadow" style="background-color: #e3f2fd;">
        <!-- Navbar Brand-->
        <img src="{{ asset('img/logo.png') }}" alt="Pabustan Birthing Clinic" width="50" height="50">
        <a class="navbar-brand ps-3">Pabustan Birthing Clinic</a>
        <!-- Sidebar Toggle-->
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">

        </form>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li>
                        <form method="POST" action="{{ route('appointment.logout') }}">
                            @csrf
                            <button type="submit" class="dropdown-item">Logout</button>
                        </form>
                    </li>
                </ul>
            </li>
        </ul>

    </nav>
    <div class="mb-5">
        <h1>. .</h1>
    </div>

    {{ $slot }}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha384-KyZXEAg3QhqLMpG8r+J1l5d7I6aE5tLpPz3+4I4H/Bsk5Bd+6GVPVC4Fmz5zJ6tD" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="{{asset('js/scripts.js')}}"></script>
    <script src="{{asset('js/main.js')}}"></script>
</body>

</html>