<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Profile</title>
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


<body class="hold-transition lockscreen">
<!-- Automatic element centering -->
<div class="lockscreen-wrapper">
  <!-- User name -->
  <div class="lockscreen-name"></div>

  <!-- START LOCK SCREEN ITEM -->
  <div class="lockscreen-item">
    
    <div class="box box-widget widget-user">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-aqua-active">
              <h3 class="widget-user-username">
                {{ucwords($user->first_name.' '.$user->last_name) }}
                <div class="pull-right">
                      <div class="btn-group">
                          <a href="{{action('UserController@editprofile', ['id' => $user->id])}}" class="btn btn-success btn-sm">
                              <i class="fa fa-pencil"></i>
                          </a>
                      </div>
                </div>
              </h3>
              <h5 class="widget-user-desc"></h5>
                
            </div>
            <div class="widget-user-image">
              <img class="img-circle" src="../dist/img/user1-128x128.jpg" alt="User Avatar">
            </div>
            <div class="box-footer">
              <div class="row">
                <div class="col-sm-4 border-right">
                  <div class="description-block">
                    <h5 class="description-header">{{$user->created_at}}</h5>
                    <span class="description-text">Created At</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-4 border-right">
                  <div class="description-block">
                    <h5 class="description-header">{{$user->updated_at}}</h5>
                    <span class="description-text">Updated At</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-4">
                  <div class="description-block">
                    <h5 class="description-header">350000000</h5>
                    <span class="description-text">Phone Number</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
              </div>
              <div class="row">
                <div class="col-sm-4">
                  <h5>{{ucfirst($user->email)}}</h5>
                </div>
              </div>
              <!-- /.row -->
            </div>
          </div>
  </div>
</div>
<!-- /.center -->

<!-- jQuery 2.2.3 -->
<script src="{{URL::asset('js/jquery-3.1.1.min.js')}}"></script>
<!-- Bootstrap 3.3.6 -->
<script src="{{URL::asset('js/bootstrap.min.js')}}"></script>


</body>