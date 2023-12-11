<nav class="sb-topnav navbar navbar-expand border-bottom shadow" style="background-color: #e3f2fd;">
            <!-- Navbar Brand-->
            <img src="{{ asset('img/logo.png') }}" alt="Pabustan Birthing Clinic" width="50" height="50">
            <a class="navbar-brand ps-3" href="{{ route('admin.index') }}">Pabustan Birthing Clinic</a>
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
              <!-- Existing code for the dropdown menu -->
                <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="{{ route('admin.changePassForm') }}">Account Settings</a></li>
                            @auth
                                @if (auth()->user()->user_level == 'ADMIN')
                                <li><a class="dropdown-item" href="{{ route('admin.activity-logs') }}">Activity Logs</a></li>
                            <!-- Add a new list item for the monthly report -->
                            <li><a class="dropdown-item" href="{{ route('admin.monthly-report') }}">Reports</a></li>
                                @endif
                            @endauth

                            <li><hr class="dropdown-divider" /></li>
                            <li>
                                <form method="POST" action="{{ route('admin.admin.logout') }}">
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
                            <a  class="nav-link" href="{{ route('admin.index') }}">
                                <div class="sb-nav-link-icon"><i class="fa fa-solid fa-gauge"></i>
                                Dashboard                     
                            </div>                               
                            </a>
                            <a  class="nav-link" href="{{ route('admin.showAppointment') }}">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-calendar-check"></i>
                                Online Registrations
                                </div>
                            </a>   
                          
                            <a  class="nav-link" href="{{ route('admin.create') }}">
                                <div class="sb-nav-link-icon"><i class="fa fa-solid fa-user-plus"></i>
                                 Patient Records
                                </div>
                            </a>
                           

                            <a  class="nav-link" href="{{ route('admin.items.select_patient') }}">
                                <div class="sb-nav-link-icon"><i class="fa fa-solid fa-cash-register"></i>
                                Patient Check Out
                                </div>
                            </a>
                            <div class="sb-sidenav-menu-heading">others</div>

                       
                             <a  class="nav-link" href="{{ route('admin.referral') }}">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-rectangle-list"></i>
                                Referral Forms
                                </div>
                            </a>
                             <a  class="nav-link" href="{{ route('admin.accounts') }}">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-user"></i>
                                Patient Accounts
                                </div>
                            </a>
                                                                                                       
                            <div class="sb-sidenav-menu-heading">Manage</div>
                            <a class="nav-link" href="{{ route('admin.packages.create') }}">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-box-open"></i></div>
                                Manage Packages
                            </a>
                            <a class="nav-link"  href="{{ route('admin.items.create') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Manage Billables
                            </a>
                            
                            @auth
                                @if (auth()->user()->user_level == 'ADMIN')
                                    <a class="nav-link" href="{{ route('admin.contact-infos') }}">
                                        <div class="sb-nav-link-icon"><i class="fa-solid fa-id-badge"></i></div>
                                        Manage Web Info
                                    </a>
                                    <a class="nav-link" href="{{ route('admin.Users') }}">
                                        <div class="sb-nav-link-icon"><i class="fa-solid fa-people-group"></i></div>
                                        Manage Users
                                    </a>
                                @endif
                            @endauth




                        </div>
                    </div>
                
                    
                </nav> 