@extends('layouts.auth')
@section('heading')
@endsection
@include('alerts.messages')
@include('alerts.alert')
@section('content')
@php
    $fb = new Facebook\Facebook([
        'app_id' => '575081076016752',
        'app_secret' => '476da864f1c179bb7c784fa0c082753b'
    ]);
    $helper = $fb->getRedirectLoginHelper();
    $permissions = ['email', 'user_likes']; // optional
    $loginUrl = $helper->getLoginUrl("http://{{url('/')}}login-callback.php", $permissions);
@endphp
                    <form class="" role="form" method="POST" action="{{ url('/login') }}">
                        {{ csrf_field() }}

                        
                        
                        <div class="form-group has-feedback{{ $errors->has('email') ? ' has-error' : '' }}">
                            <input placeholder="E-Mail Address" id="email" type="text" class="form-control" name="email" value="{{ old('email') }}" required >
                            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group has-feedback{{ $errors->has('password') ? ' has-error' : '' }}">
                            <input placeholder="Password" id="password" type="password" class="form-control" name="password" value="{{ old('password') }}" required >
                            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>

                        

                          <div class="row">
                            <div class="col-xs-4">
                              <button type="submit" class="btn btn-primary btn-block btn-flat">Sign in</button>
                            </div>
                            <div class="col-xs-8"></div>
                          </div>
                        
                    </form>
                
@endsection
