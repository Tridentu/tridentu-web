
<!doctype html>
<html>
    <head>
        <title>Logon - Tridentu Web</title>
        <link rel="stylesheet" href="{{ asset('/css/bootstrap.min.css'); }}"/>
        <link rel="stylesheet" href="{{ asset('/css/adminlte.min.css'); }}"/>
        <link rel="stylesheet" href="{{ asset('/css/fontawesome.min.css'); }}"/>
        <link rel="stylesheet" href="{{ asset('/css/icheck-bootstrap.min.css'); }}"/>

        <link rel="stylesheet" href="{{ asset('/css/app.css'); }}"/>
    </head>
    <body class="login-page">
        <div class="login-box">
            <div class="card card-outline">
                <div class="card-header text-center">
                    <a class="h1" href="{{ route('welcome'); }}">
                        <b>Tridentu</b>Web
                    </a>
                </div>
                <div class="card-body">
                    <p class="login-box-msg">Login to Tridentu Web</p>
                    <form action="{{ url('/login') }}" method="post" class="row mb-3">
                        <div class="input-group mb-3">
                            <input type="text" name="username" placeholder="Username" class="form-control">
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
                                <a href="{{ url('/register'); }}" class="btn btn-danger btn-block">Create an Account</a>
                            <div>
                        </div>
                </div>
            </div>
        </div>
        <script src="{{ asset('/js/jquery.slim.min.js'); }}"></script>
        <script src="{{ asset('/js/bootstrap.bundle.min.js'); }}"></script>
        <script src="{{ asset('/js/adminlte.min.js'); }}"></script>
    </body>
</html>
