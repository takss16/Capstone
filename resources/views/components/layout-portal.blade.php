<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Pabustan Birthing Clinic-</title>

    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <link href="{{asset('css/styles.css') }}" rel="stylesheet">
    <link href="{{asset ('img/logo.png')}}" rel="icon">
    @stack('styles')

</head>
<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand border-bottom shadow" style="background-color: #e3f2fd;">
        <!-- Navbar Brand-->
        <img src="{{ asset('img/logo.png') }}" alt="Pabustan Birthing Clinic" width="50" height="50">
        <a class="navbar-brand ps-3" href="{{ route('account.patient.dashboard') }}">Pabustan Birthing Clinic</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
        </form>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="{{ route('account.changePasswordForm') }}">Account Settings</a></li>
                    <li>
                                <form method="POST" action="{{ route('account.logout') }}">
                                    @csrf
                                    <button type="submit" class="dropdown-item">Logout</button>
                                </form>
                            </li>
                </ul>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion border-bottom shadow " id="sidenavAccordion" style="background-color: #e3f2fd;">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Core</div>
                        <a class="nav-link" href="{{ route('account.patient.dashboard') }}">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-house"></i>
                                Home
                            </div>
                        </a>
                        </a>
                        <a class="nav-link" href="{{ route('account.patient.viewMedicine') }}">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-pills"></i>
                                Medicine
                            </div>
                        </a>
                        <a class="nav-link" href="{{ route('account.patient.reminders') }}">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-bell"></i>
                                Reminders
                            </div>
                        </a>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            {{ $slot }}
            </main>
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
    <script src="{{asset('js/main.js') }}"></script>
    <script src="{{asset('js/scripts.js')}}"></script>
    <script src="{{ asset('js/datatables-simple-demo.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="scripts.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
    @stack('scripts')

    <!-- <script src="js/datatables-simple-demo.js"></script> -->
</body>

</html>