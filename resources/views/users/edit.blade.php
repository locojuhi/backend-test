@extends('layouts.backoffice')
@section('page-header')
    Update User
@endsection
@section('content')
@include('alerts.alert')
<div class="box box-info">
		<div class="box-header with-border">
			<h3 class="box-title"></h3>
		</div>
		 @foreach ($information as $data)
		{!! Form::model($information, ['route' => ['users.update', $data->id], 'method' => 'PUT']) !!}
			
			<div class="box-body">
				<div class="form-group">
					<label for="first_name" class="col-sm-2 control-label">First Name</label>
					<div class="col-sm-10">
						 {!!Form::text('first_name', old('first_name', $data->first_name),['class' => 'form-control'])!!}
					</div>
				</div>

				<div class="form-group">
					<label for="last_name" class="col-sm-2 control-label">Last Name</label>
					<div class="col-sm-10">
						{!!Form::text('last_name', old('last_name', $data->last_name),['class' => 'form-control'])!!}
					</div>
				</div>

				<div class="form-group">
					<label for="email" class="col-sm-2 control-label">Email</label>
					<div class="col-sm-10">
						{!!Form::text('email', old('email', $data->email),['class' => 'form-control'])!!}
					</div>
				</div>


				<div class="form-group">
					<label for="password" class="col-sm-2 control-label">Password</label>
					<div class="col-sm-10">
						<input type="password" class="form-control" id="password" placeholder="password" name="password">
					</div>
				</div>
				<div class="form-group">
					<label for="re-password" class="col-sm-2 control-label">Re-Password</label>
					<div class="col-sm-10">
						<input type="password" class="form-control" id="re-password" placeholder="Re-Password" name="repassword">
					</div>
				</div>
				<p class="help-block">Leave password field blank if you dont want to change the password.</p>
			</div>
			<div class="box-footer">
				<button type="submit" class="btn btn-info pull-right">Update</button>
			</div>
		{!! Form::close() !!}
		@endforeach
	</div>
	<script type="text/javascript">
	$('form').each(function() {  // attach to all form elements on page
        $(this).validate({       // initialize plugin on each form
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
		        },
		        repassword:{
		          equalTo: "#password"
		        }
		      }
		        });
		    });
</script>
@endsection
