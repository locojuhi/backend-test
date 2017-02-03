@extends('layouts.auth')
@section('heading')
@endsection
@section('content')

                    <form class="" role="form" method="POST" action="{{ url('/register') }}">
                        {{ csrf_field() }}

                        <div class="form-group has-feedback{{ $errors->has('first_name') ? ' has-error' : '' }}">
                            <input placeholder="First Name" id="first_name" type="text" class="form-control" name="first_name" value="{{ old('first_name') }}" required autofocus>
                            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                            @if ($errors->has('first_name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('first_name') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group has-feedback{{ $errors->has('last_name') ? ' has-error' : '' }}">
                            <input placeholder="Last Name" id="last_name" type="text" class="form-control" name="last_name" value="{{ old('last_name') }}" required >
                            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                            @if ($errors->has('last_name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('last_name') }}</strong>
                                </span>
                            @endif
                        </div>
                        
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

                        <div class="form-group has-feedback{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <input placeholder="Re-Password" id="password-confirm" type="password" class="form-control" name="password_confirmation" value="{{ old('repassword') }}" required >
                            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                            @if ($errors->has('password_confirmation'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                                </span>
                            @endif
                        </div>

                          <div class="row">
                            <div class="col-xs-4">
                              <button type="submit" class="btn btn-primary btn-block btn-flat">Sign Up</button>
                            </div>
                            <div class="col-xs-8"></div>
                          </div>
                        
                    </form>
                
@endsection
