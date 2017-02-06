@extends('layouts.backoffice')
    @foreach($information as $user)
        @section('page-header')
            User Details
        @endsection
        @section('content')
            <div class="box box-widget widget-user">
                <div class="widget-user-header bg-aqua-active">
                    <h3 class="widget-user-username">
                        {{ucwords($user->first_name.' '.$user->last_name) }}
                        <div class="pull-right">
                            {!! Form::open(['route' => ['users.destroy', $user->id], 'method' => 'DELETE', 'onsubmit' => 'return DeleteConfirmation()']) !!}
                                <div class="btn-group">
                                    <a href="{{action('UserController@edit', ['id' => $user->id])}}" class="btn btn-success btn-sm">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        <i class="fa fa-remove"></i>
                                    </button>
                                </div>
                            {!! Form::close() !!}
                        </div>
                    </h3>
                    <h5 class="widget-user-desc">{{ucfirst($user->email)}}</h5>

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
                        </div>
                        <div class="col-sm-4 border-right">
                            <div class="description-block">
                                <h5 class="description-header">{{$user->updated_at}}</h5>
                                <span class="description-text">Updated At</span>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="description-block">
                                <h5 class="description-header">350000000</h5>
                                <span class="description-text">Phone Number</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endsection
    @endforeach