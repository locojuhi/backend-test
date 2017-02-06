@extends('layouts.backoffice')
@section('page-header')
    Users
@endsection
@section('content')
    <div class="box">
        <div class="box-header">
            <div class="pull-right">
                <a href="{{action('UserController@create')}}" class="btn btn-success btn-sm"><i class="fa fa-plus"></i></a>
            </div>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-sm-12">
                    <table id="userTable" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="userTable_info">
                        <tr role="row">
                            <th>Full Name</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                            <th>Action</th>
                        </tr>
                        @foreach($users as $user)
                            <tr role="row">
                                <td>{{ucwords($user->first_name.' '.$user->last_name)}}</td>
                                <td>{{$user->created_at}}</td>
                                <td>{{$user->updated_at}}</td>
                                <td>
                                    {!! Form::open(['route' => ['users.destroy', $user->id], 'method' => 'DELETE', 'onsubmit' => 'return DeleteConfirmation()']) !!}
                                        <div class="btn-group">
                                            
                                            <a href="{{action('UserController@show', ['id' => $user->id])}}" class="btn btn-primary btn-sm">
                                                <i class="fa fa-eye"></i>
                                            </a>

                                            <a href="{{action('UserController@edit', ['id' => $user->id])}}" class="btn btn-info btn-sm">
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                <i class="fa fa-remove"></i>
                                            </button>
                                            

                                        </div>
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                    </table>
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection