
<!doctype html>
<html>
    <head>
        <title>Logon - Tridentu Web</title>
        <link rel="stylesheet" href="{{ asset('/css/bootstrap.min.css'); }}"/>
        <link rel="stylesheet" href="{{ asset('/css/adminlte.min.css'); }}"/>
        <link rel="stylesheet" href="{{ asset('/css/icheck-bootstrap.min.css'); }}"/>
        <link rel="stylesheet" href="{{ asset('/css/app.css'); }}"/>
        @livewireStyles
    </head>
    <body class="login-page">

        <div class="login-box">
        @if($errors->any())
        <div style="position: absolute; top: 0; right: 0;">

            @foreach ($errors->all() as $error)
                <div class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-autohide="false">
                    <div class="toast-header">
                        <div class="rounded mr-2"></div>
                        <strong class="mr-auto">Error Detected</strong>
                        <small>now</small>
                        <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="toast-body">
                        <p>{{ $error }}</p>
                    </div>
                </div>
            @endforeach
</div>
        @endif
            <div class="card card-outline">
                <div class="card-header text-center">
                    <a class="h1" href="{{ route('welcome'); }}">
                        <b>Tridentu</b>Web
                    </a>
                </div>
                <div class="card-body">
                    <p class="login-box-msg">Login to Tridentu Web</p>
                    <form action="{{ url('/tridentu-web/login') }}" method="post" class="row mb-3">
                        <div class="input-group mb-3">
                            <input type="text" name="email" placeholder="Username" class="form-control">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <i class="fas fa-user">

                                    </i>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" name="password" placeholder="Password" class="form-control">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <i class="fas fa-lock">

                                    </i>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-8">
                               <div class="icheck-primary">
                                   <input id="remember" name="remember" type="checkbox">
                                   <label for="remember">
                                        Remember Me
                                   </label>
                               </div>
                            </div>
                            <div class="col-4">
                                <button type="submit" class="btn btn-primary btn-block">Login</button>
                            </div>
                        </div>
                        {{ csrf_field() }}
                    </form>
                        <div class="row mb-3">
                            <div class="col-12">
                                <a href="{{ url('/tridentu-web/register'); }}" class="btn btn-danger btn-block">Create an Account</a>
                            <div>
                        </div>
                </div>
            </div>
        </div>
        <script src="{{ asset('/js/jquery.slim.min.js'); }}"></script>
        <script src="{{ asset('/js/bootstrap.bundle.min.js'); }}"></script>
        <script src="{{ asset('/js/adminlte.min.js'); }}"></script>
        <script src="{{ asset('/js/fontawesome.min.js'); }}"></script>
        @livewireScripts
    </body>
</html>
