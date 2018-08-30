<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{$title}}</title>

    <!-- Global stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet"
          type="text/css">
    <link href="/admin/css/adminStyle.css" rel="stylesheet" type="text/css">
    <link href="/admin/css/main.css" rel="stylesheet" type="text/css">
    <!-- /global stylesheets -->

    <script src='https://www.google.com/recaptcha/api.js'></script>

</head>

<body class="login-container">

<!-- Page container -->
<div class="page-container">

    <!-- Page content -->
    <div class="page-content">

        <!-- Main content -->
        <div class="content-wrapper">

            <!-- Content area -->
            <div class="content">

                <!-- Simple login form -->
                <form action="/lomantine" method="post">
                    <div class="panel panel-body login-form">
                        <div class="text-center">
                            <h1>WebAdvancePro</h1>
                            <h5 class="content-group">
                                <small class="display-block">Введите логин и пароль</small>
                            </h5>
                        </div>

                        <div class="form-group has-feedback has-feedback-left">
                            <input type="text" class="form-control" name="login" placeholder="Логин"
                                   value="{{old('login')}}">
                            <div class="form-control-feedback">
                                <i class="icon-user text-muted"></i>
                            </div>
                            @if ($errors->has('login'))
                            <div class="alert alert-danger no-border mt-10">
                                {{$errors->first('login')}}
                            </div>
                            @endif
                        </div>

                        <div class="form-group has-feedback has-feedback-left">
                            <input type="password" class="form-control" name="password" placeholder="Пароль">
                            <div class="form-control-feedback">
                                <i class="icon-lock2 text-muted"></i>
                            </div>
                            @if ($errors->has('password'))
                            <div class="alert alert-danger no-border mt-10">
                                {{$errors->first('password')}}
                            </div>
                            @endif
                        </div>

                        <div class="form-group">
                            {!! NoCaptcha::display() !!}
                            @if ($errors->has('g-recaptcha-response'))
                            <div class="alert alert-danger no-border mt-10">
                                {{$errors->first('g-recaptcha-response')}}
                            </div>
                            @endif
                        </div>
                        {{ csrf_field() }}

                        <div class="form-group">
                            @if(session('status'))
                            <div class="alert alert-danger no-border mt-10">
                                {{session('status')}}
                            </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block">Вход
                                <i class="icon-circle-right2 position-right"></i>
                            </button>
                        </div>

                    </div>
                </form>
                <!-- /simple login form -->

                <div class="footer text-muted text-center">
                    &copy; 2018. Создание и разработка веб-приложений
                </div>


            </div>
            <!-- /content area -->

        </div>
        <!-- /main content -->

    </div>
    <!-- /page content -->

</div>
<!-- /page container -->

</body>
</html>
