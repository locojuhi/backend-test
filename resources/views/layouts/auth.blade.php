<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title')</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="{{URL::asset('css/bootstrap.min.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{URL::asset('css/AdminLTE.min.css')}}">
</head>

<body class="hold-transition login-page">
    <script src="{{URL::asset('js/jquery-3.1.1.min.js')}}"></script>
    <div class="login-box">
        <div class="login-logo">
        <a href="/">Backend Test</a>
        </div>
        <!-- /.login-logo -->
        <div class="login-box-body">
            <h4>@yield('heading')</h4>
            @include('alerts.messages')
            @include('alerts.alert')
            @yield('content')
        <div class="social-auth-links text-center">
          
        </div>
    </div>
</div>
<script src="{{URL::asset('js/bootstrap.min.js')}}"></script>
</body>