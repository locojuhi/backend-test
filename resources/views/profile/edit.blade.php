@extends('layouts.edit-profile')

@include('alerts.messages')
@include('alerts.alert')
@section('content')
<div class="box box-info">
		<div class="box-header with-border">
			<h3 class="box-title"></h3>
		</div>
		 @foreach ($information as $data)
		{!! Form::model($information, ['route' => ['users.update', $data->id], 'method' => 'PUT']) !!}
			
			<div class="box-body">
				<div class="form-group">
					<div class="col-sm-10">
						 {!!Form::text('first_name', old('first_name', $data->first_name),['class' => 'form-control'])!!}
					</div>
				</div>

				<div class="form-group">
					<div class="col-sm-10">
						{!!Form::text('last_name', old('last_name', $data->last_name),['class' => 'form-control'])!!}
					</div>
				</div>

				<div class="form-group">
					<div class="col-sm-10">
						{!!Form::text('email', old('email', $data->email),['class' => 'form-control'])!!}
					</div>
				</div>


				<div class="form-group">
					<div class="col-sm-10">
						<input type="password" class="form-control" id="password" placeholder="password" name="password">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-10">
						<input type="password" class="form-control" id="repassword" placeholder="Re-Password" name="password_confirmation">
					</div>
				</div>
				
				
			</div>
			<div class="row">
			<div class="col-md-1">
			</div>
			<div class="col-md-11">
				<p class="help-block">Leave password field blank if you dont want to change the password.</p>
			</div>
					
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
@endsection()

