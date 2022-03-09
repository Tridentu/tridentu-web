<!doctype html>
<html>
    <head>
        <title>{{ $title }} - Tridentu Web</title>
        <link rel="stylesheet" href="{{ asset('/css/bootstrap.min.css'); }}"/>
        <link rel="stylesheet" href="{{ asset('/css/adminlte.min.css'); }}"/>
        <link rel="stylesheet" href="{{ asset('/css/fontawesome.min.css'); }}"/>
        <link rel="stylesheet" href="{{ asset('/css/app.css'); }}"/>


    </head>
    <body>
        <div class="wrapper">
            <div class="main-header navbar navbar-expand navbar-white navbar-light">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                    </li>
                    {{ $navbar }}
                </ul>
            </div>
            <aside class="main-sidebar sidebar-dark-primary elevation-4">
               <a href="{{ route("welcome"); }}" class="brand-link">
                    <img src="{{ asset('/img/tridentur.png'); }}" alt="Tridentu-R Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                    <span class="brand-text font-weight-light">Tridentu Web</span>
                </a>
               <div class="sidebar">
                <div class="form-inline">
                        <div class="input-group" data-widget="sidebar-search">
                            <input class="form-control form-control-sidebar" type="search" placeholder="Search apps..." aria-label="Search apps...">
                            <div class="input-group-append">
                                <button class="btn btn-sidebar">
                                    <i class="fas fa-search fa-fw"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    {{ $sidebar }}
                </div>
            </aside>
            <div class="content-wrapper">
                {{ $slot }}
            </div>
        </div>
        <script src="{{ asset('/js/jquery.slim.min.js'); }}"></script>
        <script src="{{ asset('/js/bootstrap.bundle.min.js'); }}"></script>
        <script src="{{ asset('/js/adminlte.min.js'); }}"></script>
    </body>
</html>
