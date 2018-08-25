<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Gentelella Alela! | </title>
        <base href="{{url('')}}">
        <link href="assets/admin/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="assets/admin/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <link href="assets/admin/vendors/nprogress/nprogress.css" rel="stylesheet">
        <link href="assets/admin/vendors/animate.css/animate.min.css" rel="stylesheet">
        <link href="assets/admin/build/css/custom.min.css" rel="stylesheet">
    </head>
    <body class="login">
        <div>
            <a class="hiddenanchor" id="signup"></a>
            <a class="hiddenanchor" id="signin"></a>
            <div class="login_wrapper">
                <div class="animate form login_form">
                    <section class="login_content">
                        <form method="POST" action="{{route('postLoginAdmin')}}" role="form" class="form-horizontal">
                            @csrf
                            <h1>Login Form</h1>
                            <div>
                                <input name="txtUsername" type="text" class="form-control" placeholder="{{__('general.username')}}" required="" />
                            </div>
                            <div>
                                <input name="txtPassword" type="password" class="form-control" placeholder="{{__('general.password')}}" required="" />
                            </div>
                            <div>
                                <button type="submit" class="btn btn-default">{{__('general.logIn')}}</button>
                                <a class="reset_pass" href="#">{{__('general.lostYourPassword')}}</a>
                            </div>
                            <div class="clearfix"></div>
                            <div class="separator">
                                <div class="clearfix"></div>
                                <br />
                                <div>
                                    <h1><i class="fa fa-paw"></i> Gentelella Alela!</h1>
                                    <p>©2016 All Rights Reserved. Gentelella Alela! is a Bootstrap 3 template. Privacy and Terms</p>
                                </div>
                            </div>
                        </form>
                    </section>
                </div>
            </div>
        </div>
    </body>
</html>