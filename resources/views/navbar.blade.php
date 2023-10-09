<nav class="sb-topnav navbar navbar-expand border-bottom shadow" style="background-color: #e3f2fd;">
            <!-- Navbar Brand-->
            <img src="{{ asset('img/logo.png') }}" alt="Pabustan Birthing Clinic" width="50" height="50">
            <a class="navbar-brand ps-3" href="{{ route('index') }}">Pabustan Birthing Clinic</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                    <!-- <div class="input-group">
                        <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                        <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                    </div> -->
                </form>
                <!-- Navbar-->
                <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#!">Settings</a></li>
                            <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                            <li><hr class="dropdown-divider" /></li>
                            <li><a class="dropdown-item"  href="{{ route('login') }}">Logout</a></li>
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
                            <a  class="nav-link" href="{{ route('index') }}">
                                <div class="sb-nav-link-icon"><i class="fa fa-solid fa-gauge"></i>
                                Dashboard                     
                            </div>
                                
                            </a>
                            <!-- <div class="sb-sidenav-menu-heading">Interface</div> -->

                            <!-- <a href="{{ route('create') }}">Create</a>
                                <div class="sb-nav-link-icon"><i class=""></i></div>
                                Create
                            </a> -->
                            <a  class="nav-link" href="{{ route('create') }}">
                                <div class="sb-nav-link-icon"><i class="fa fa-solid fa-user-plus"></i>
                                New Patient Record
                                </div>
                            </a>
                           

                            <a  class="nav-link" href="{{ route('items.select_patient') }}">
                                <div class="sb-nav-link-icon"><i class="fa fa-solid fa-cash-register"></i>
                                Check out Bills
                                </div>
                            </a>
                            <div class="sb-sidenav-menu-heading">patients info</div>

                            <a  class="nav-link" href="{{ route('records') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i>
                                Patient Record
                                </div>
                            </a>

                            
                 
                            
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Clinic Record
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <!-- <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                        Authentication
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a> -->
                                    <a class="nav-link" href="{{ route('referral') }}">Patients</a>
                                    <a class="nav-link" href="{{ route('accounts') }}">Accounts</a>
                                    <a class="nav-link" href="{{ route('showAppointment') }}">Appointment</a>
                                    <!-- <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="login.html">Login</a>
                                            <a class="nav-link" href="register.html">Register</a>
                                            <a class="nav-link" href="password.html">Forgot Password</a>
                                        </nav>
                                    </div> -->
                                    <!-- <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                                        Error
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a> -->
                                    <!-- <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="401.html">401 Page</a>
                                            <a class="nav-link" href="404.html">404 Page</a>
                                            <a class="nav-link" href="500.html">500 Page</a>
                                        </nav>
                                    </div> -->
                                </nav>
                            </div>
                            <div class="sb-sidenav-menu-heading">Manage</div>
                          
                            <a class="nav-link"  href="{{ route('items.create') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Manage Billables
                            </a>
                            <a class="nav-link" href="{{ route('packages.create') }}">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-box-open"></i></div>
                                Manage Packages
                            </a>
                        </div>
                    </div>
                
                    
                </nav> 