<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> @yield('title')</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap -->
    <link rel="stylesheet" type="text/css" href="{{URL::asset('css/bootstrap.min.css')}}"></link>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" type="text/css" href="{{URL::asset('css/AdminLTE.min.css')}}"></link>
    <!-- AdminLTE Skins-->
    <link rel="stylesheet" type="text/css" href="{{URL::asset('css/skins/skin-red.min.css')}}"></link>
    <script type="text/javascript" src="{{URL::asset('js/jquery-3.1.1.min.js')}}"></script>
    <script type="text/javascript" src="{{URL::asset('js/jquery.validate.js')}}"></script>
    <script type="text/javascript" src="{{URL::asset('js/additional-methods.js')}}"></script>
</head>

<body class="skin-red sidebar-mini" style="height: auto;">
    <div class="wrapper" style="height: auto;">

    <!-- Main Header -->
    <header class="main-header">

        <!-- Logo -->
        <a href="index2.html" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>B</b>T</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>Backend</b> Test</span>
        </a>

        <!-- Header Navbar -->
        <nav class="navbar navbar-static-top" role="navigation">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>
            <!-- Navbar Right Menu -->
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    @php
                        $userFullName = ucwords(Auth::user()->first_name.' '.Auth::user()->last_name);
                    @endphp
                    <!-- User Account Menu -->
                    <li class="dropdown user user-menu">
                        <!-- Menu Toggle Button -->
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <!-- The user image in the navbar-->
                            <img src="http://placehold.it/140x100" class="user-image" alt="User Image">
                            <!-- hidden-xs hides the username on small devices so only the image appears. -->
                            <span class="hidden-xs">{{$userFullName}}</span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- The user image in the menu -->
                            <li class="user-header">
                                <img src="http://placehold.it/140x100" class="img-circle" alt="User Image">

                                <p>
                                    {{$userFullName}}
                                    <small>Role</small>
                                </p>
                            </li>

                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-right">
                                    <form id="logout-form" action="{{ url('/logout') }}" method="POST">
                                        {{ csrf_field() }}
                                        <button type="submit" class="btn btn-default btn-flat">Sign out</button>
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">

        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel">
                <div class="pull-left image">
                    @yield('user-picture')
                </div>
            </div>
            <!-- Sidebar Menu -->
            <ul class="sidebar-menu">
                <li class="header">OPTIONS MENU</li>
                @yield('opciones')
                <!-- Optionally, you can add icons to the links -->
                <li class="active">
                    <a href="/dashboard">
                        <i class="fa fa-link"></i> 
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="/users">
                        <i class="fa fa-link"></i> 
                        <span>Users</span>
                    </a>
                </li>
            </ul>
            <!-- /.sidebar-menu -->
        </section>
        <!-- /.sidebar -->
    </aside>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" style="min-height: 483px;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                @yield('page-header')
                <small>@yield('page-description')</small>
            </h1>
            <ol class="breadcrumb">
                @yield('bread-crumbs')
                <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
                <li class="active">Here</li>
            </ol>
        </section>
        <div class="row">
            <!-- Main content -->
            <section class="content">

                <div class='col-xs-12'>
                    @include('alerts.messages')
                    @include('alerts.alert')
                    @yield('content') 
                </div> 
            </section>
        </div>
    </div>
    <!-- Main Footer -->
    <footer class="main-footer">
        <!-- To the right -->
        <div class="pull-right hidden-xs">
            Danny Torres
        </div>
        <!-- Default to the left -->
        <strong>Copyright © 2017 <a href="http://clickdelivery.com/">Clickdelivery</a>.</strong> All rights reserved.
    </footer>
</div>

<script type="text/javascript" src="{{URL::asset('js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('js/app.min.js')}}"></script>
<script type="text/javascript">
  $('#customerform').validate({
    rules: {
        first_name: {
            required: true,
            minlength: 2,
            maxlength: 50,
            lettersonly: true
        },
        last_name: {
          required: true,
          minlength: 2,
          maxlength: 50, 
         lettersonly: true
        },
        email: {
          required: true,
          minlength: 10,
          maxlength: 150,
          email: true

        },
        password: {
          required: true
        },
        repassword:{
          required: true,
          equalTo: "#password"
        }
      }
  });
  //on Delete Rows Confirmation Script
  function DeleteConfirmation(){
    var confirmation = confirm("Are you sure you want to delete?");
    if (confirmation)
      return true;
    else
      return false;
  }
</script>
</body>