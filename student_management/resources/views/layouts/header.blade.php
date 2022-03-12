<!DOCTYPE html>
<html lang="en">
    <!-- Mirrored from seantheme.com/hud/profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 21 Feb 2022 10:00:59 GMT -->
    <head>
        <meta charset="utf-8" />
        <title>HUD | Profile</title>
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta name="description" content="" />
        <meta name="author" content="" />

        <link href="{{ url('assets/css/vendor.min.css') }}" rel="stylesheet" />
        <link href="{{ url('assets/css/app.min.css') }}" rel="stylesheet" />
        <link href="{{ url('assets/plugins/tag-it/css/jquery.tagit.css') }}" rel="stylesheet" />
    </head>
    <body>
        <div id="app" class="app">
            <div id="header" class="app-header">
                <div class="desktop-toggler">
                    <button type="button" class="menu-toggler" data-toggle-class="app-sidebar-collapsed" data-dismiss-class="app-sidebar-toggled" data-toggle-target=".app">
                        <span class="bar"></span>
                        <span class="bar"></span>
                        <span class="bar"></span>
                    </button>
                </div>

                <div class="mobile-toggler">
                    <button type="button" class="menu-toggler" data-toggle-class="app-sidebar-mobile-toggled" data-toggle-target=".app">
                        <span class="bar"></span>
                        <span class="bar"></span>
                        <span class="bar"></span>
                    </button>
                </div>

                <div class="brand">
                    <a href="#" class="brand-logo">
                        <span class="brand-img">
                            <span class="brand-img-text text-theme">H</span>
                        </span>
                        <span class="brand-text">DataBase Admin</span>
                    </a>
                </div>

                <div class="menu">
                    
                    <div class="menu-item dropdown dropdown-mobile-full">
                        <a href="#" data-bs-toggle="dropdown" data-bs-display="static" class="menu-link">
                            <div class="menu-img online">
                                <img src="{{ Auth::user()->image }}" height="60px" />
                            </div>
                            <div class="menu-text d-sm-block d-none"><span class="__cf_email__">{{ Auth::user()->email; }}</span></div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end me-lg-3 fs-11px mt-1">
                            <a class="dropdown-item d-flex align-items-center" href="{{ url('Dashboard/UpdateStudent') }}/{{ Auth::user()->id }}">PROFILE <i class="bi bi-person-circle ms-auto text-theme fs-16px my-n1"></i></a>
                            <div class="dropdown-divider"></div>

                            {{-- <a class="dropdown-item d-flex align-items-center" href="#">LOGOUT <i class="bi bi-toggle-off ms-auto text-theme fs-16px my-n1"></i></a> --}}
                            <a href="{{ route('logout') }}"
                                onclick="event.preventDefault();       

                                document.getElementById('logout-form').submit();" class="dropdown-item d-flex align-items-center">
                                Logout <i class="bi bi-toggle-off ms-auto text-theme fs-16px my-n1"></i>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>

                        </div>
                    </div>
                </div>
                <a href="{{ route('logout') }}"
                    onclick="event.preventDefault();       

                    document.getElementById('logout-form').submit();" class="logout_opt">
                    Logout 
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>

                <form class="menu-search" method="POST" name="header_search_form">
                    <div class="menu-search-container">
                        <div class="menu-search-icon"><i class="bi bi-search"></i></div>
                        <div class="menu-search-input">
                            <input type="text" class="form-control form-control-lg" placeholder="Search menu..." />
                        </div>
                        <div class="menu-search-icon">
                            <a href="#" data-toggle-class="app-header-menu-search-toggled" data-toggle-target=".app"><i class="bi bi-x-lg"></i></a>
                        </div>
                    </div>
                </form>
            </div>

            @include('layouts.sidebar')

            <button class="app-sidebar-mobile-backdrop" data-toggle-target=".app" data-toggle-class="app-sidebar-mobile-toggled"></button>
            <div id="content" class="app-content">