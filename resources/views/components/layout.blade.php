<!doctype html>
<html>
    <head>
        <title>{{ $title }} - Tridentu Web</title>
        <link rel="stylesheet" href="{{ asset('/css/bootstrap.min.css'); }}"/>
        <link rel="stylesheet" href="{{ asset('/css/adminlte.min.css'); }}"/>
        <link rel="stylesheet" href="{{ asset('/css/app.css'); }}"/>
        <link rel="stylesheet" href="{{ asset('/css/icheck-bootstrap.min.css'); }}"/>
        <link rel="stylesheet" href="{{ asset('/css/OverlayScrollbars.min.css'); }}"/>
        <link rel="shortcut icon" type="image/png" href="{{ asset('/img/tridentur.png') }}">

        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="msapplication-navbutton-color" content="#2E3440">
        <meta name="apple-mobile-web-app-status-bar-style" content="#2E3440">
        <meta http-equiv="X-UA-Compatible" content="IE=EDGE" />
        <link href="https://unpkg.com/dropzone@6.0.0-beta.1/dist/dropzone.css" rel="stylesheet" type="text/css" />
        {{ $extrahead }}
       
        @livewireStyles
    </head>
    <body class="hold-transition sidebar-mini layout-fixed">
        
        @foreach (['error', 'warning', 'success'] as $msg)
            @if(Session::has('laratrust-' . $msg))
            <div class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-autohide="false">
                    <div class="toast-header">
                        <div class="rounded mr-2"></div>
                        <strong class="mr-auto">New ACL Message ({{ $msg }})</strong>
                        <small>now</small>
                        <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="toast-body">
                        <p>{{ Session::get('laratrust-' . $msg) }}</p>
                    </div>
             </div>
            @endif
            @if (session()->has($msg))
            <div class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-autohide="false">
                    <div class="toast-header">
                        <div class="rounded mr-2"></div>
                        <strong class="mr-auto">New Message ({{ $msg }})</strong>
                        <small>now</small>
                        <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="toast-body">
                        <p>{{ session('message') }}</p>
                    </div>
             </div>
                <div class="alert alert-success">
                    
                </div>
            @endif
      @endforeach
      
        <div class="wrapper">
            <div class="preloader">

            </div>
            <div class="main-header navbar navbar-expand navbar-white navbar-light">
                
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                    </li>
                    @auth
                        <li class="nav-item">
                                <a class="nav-link" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">   
                                    Logout
</a>
                            <form method="POST" id="logout-form" action="{{ route('logout') }}">@csrf
                            </form>
                        </li>
                    @endauth
                   
                    {{ $navbar }}
                </ul>
                <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                            <i class="fas fa-search"></i>
                        </a>
                        <div class="navbar-search-block">
                            <form class="form-inline" id="search-bar" action="{{ route('search:users'); }}" method="get">
                                <div class="input-group input-group-sm">
                                    <input class="form-control form-control-navbar"  type="search" name="query" placeholder="Search Tridentu Web" aria-label="Search Tridentu Web">
                                    
                                    <div class="input-group-append">
                                        
                                        <button class="btn btn-navbar" type="submit">
                                            <i class="fas fa-search"></i>
                                        </button>
                                        <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </li>
                    <?php
                        if(Auth::user()) {
                                    $count = Auth::user()->unreadMessagesCount(); 
                                    $messages = Auth::user()->allUnreadMessages();
                        }
                    ?>
                     @if(Auth::user())
                    <li class="nav-item dropdown">
                        <a class="nav-link" data-toggle="dropdown" href="#">
                            <i class="far fa-comments"></i>
                            
                            @if($count > 0)
                                <span class="badge badge-danger navbar-badge">{{ $count }}</span>
                            @endif
                        </a>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        @if($count > 0)
                            @foreach($messages as $message)
                                <a href="#" class="dropdown-item">
                                     <div class="media">
                                        <img src="{{ Avatar::create($message->user()->name)->toBase64() }}" alt="User Avatar" class="img-size-50 img-circle mr-3">
                                        <div class="media-body">
                                            <h3 class="dropdown-item-title">
                                                {{ $message->user()->name }}
                                                <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                                            </h3>
                                            <p class="text-sm">{{ $meesage->body }}</p>
                                            <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> $message->created_at->diffForHumans()</p>
                                        </div>
                                    </div>
                                </a>
                                <div class="dropdown-divider"></div>
                            @endforeach

                        @endif
                        <a href="{{ route('messages:inbox'); }}" class="dropdown-item dropdown-footer">See All Messages</a>

                        </div>
                    </li>
                    @endif
                    <li class="nav-item">
                         <a class="nav-link" data-widget="control-sidebar" href="#"><i class="fas fa-th-large"></i></a>
                    </li>
                </ul>
            </div>
            <aside class="main-sidebar sidebar-dark-primary elevation-4">
               <a href="{{ route('welcome'); }}" class="brand-link">
                    <img src="{{ asset('/img/tridentur.png'); }}" alt="Tridentu-R Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                    <span class="brand-text font-weight-light">Tridentu Web</span>
                </a>
               <div class="sidebar">
                   @auth
                        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                            <div class="image">
                                <img src="{{ Avatar::create(Auth::user()->name)->toBase64() }}"  class="img-circle elevation-2" alt="User Image" >
                            </div>
                            <div class="info">
                                <a href="{{ route('users:profile'); }}" class="d-block">{{ Auth::user()->name }}</a>
                            </div>
                        </div>
                @endauth
                    <form class="form-inline">
                        <div class="input-group" data-widget="sidebar-search">
                            <input class="form-control form-control-sidebar" type="search" placeholder="Search apps..." aria-label="Search apps...">
                            <div class="input-group-append">
                                <button class="btn btn-sidebar">
                                    <i class="fas fa-search fa-fw"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                    <nav class="mt-2">
                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                            @auth   
                                <li class="nav-item menu-open">
                                    
                                    <a href="#" class="nav-link active">
                                        <i class="nav-icon fas fa-tachometer-alt"></i>
                                        <p>Editors<i class="right fas fa-angle-left"></i></p>
                                    </a>
                                    <ul class="nav nav-treeview">

                                    </ul>
                                </li>
                                <li class="nav-item menu-open">
                                    
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon fas fa-exclamation-circle"></i>
                                        <p>Important Places<i class="right fas fa-angle-left"></i></p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="{{ route('dash:health') }}" class="nav-link">
                                              <i class="nav-icon fas fa-heartbeat"></i>
                                              <p>Health Check</p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            @endauth
                            <li class="nav-item menu-open">
                                    
                                    <a href="#" class="nav-link active">
                                        <i class="nav-icon fas fa-rocket"></i>
                                        <p>Apps<i class="right fas fa-angle-left"></i></p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        @foreach(AppList::getApps() as $app)
                                            <li class="nav-item">
                                                <a href="{{ url('/tridentu-web/apps/' . $app->id) }}" class="nav-link">
                                                <i class="nav-icon fas fa-rocket"></i>
                                                <p>{{ $app->getInternal('title'); }}</p>
                                                </a>
                                            </li>
                                        @endforeach
                                        <li class="nav-item">
                                            <a href="{{ route('tenantmeta:create') }}" class="nav-link">
                                              <i class="nav-icon fas fa-plus"></i>
                                              <p>Create new App</p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            {{ $sidebar }}
                            
                        </ul>
                    </nav>
                </div>
            </aside>
            <div class="content-wrapper">
                <div class="content-header">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-sm-6">
                                    <h1 class="m-0">{{ $title }}</h1>
                                </div>
                                <div class="col-sm-6">
                                    {{ Breadcrumbs::render() }}
                                </div>
                            </div>
                        </div>
                </div>
                {{ $slot }}
            </div>
            <aside class="control-sidebar control-sidebar-dark">
                <div class="p-3">
                    <h3>Search Options</h3>
                    <form class="px-4 py-3">
                         <div class="form-group">
                                <label for="searchType">Search in...</label>
                                <select class="custom-select" id="searchType">
                                 <option selected>Users</option>
                                 <option>Groups</option>
                                 <option>Roles</option>

                                </select>
                        </div> 
                    </form> 
                </div>
            </aside>
            <footer class="main-footer">

            </footer>
        </div>
        <script src="{{ asset('/js/jquery.min.js'); }}"></script>
        <script src="{{ asset('/js/bootstrap.bundle.min.js'); }}"></script>
        <script src="{{ asset('/js/adminlte.min.js'); }}"></script>
        <script src="{{ asset('/js/fontawesome.min.js'); }}"></script>
        <script src="{{ asset('/js/jquery.overlayScrollbars.min.js'); }}"></script>
        <script src="{{ asset('/js/jquery-ui.min.js'); }}"></script>
        <script src="https://unpkg.com/dropzone@6.0.0-beta.1/dist/dropzone-min.js"></script>

        <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

      
        @livewireScripts
        <script type="text/javascript">
            $(function(){
                $("#searchType").change(function(val){
                    var searchType = $(this).children("option:selected").val();
                    switch(searchType){
                        case "Users":
                            $("#search-bar").attr("action", "{{ route('search:users'); }}");
                            break;
                        case "Roles":
                            $("#search-bar").attr("action", "{{ route('search:roles'); }}");
                            break;
                        case "Groups":
                            $("#search-bar").attr("action", "{{ route('search:groups'); }}");
                            break;
                    }
                });
            });
        </script>
        {{ $extrascript }}
    </body>
</html>
