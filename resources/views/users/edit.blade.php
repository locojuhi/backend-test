@extends('layouts.backoffice')
	@section('page-header')
	    Update User
	@endsection
	@section('content')
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
								<input type="password" class="form-control" id="re-password" placeholder="Re-Password" name="password_confirmation">
							</div>
						</div>
						@if(Auth::user()->role_id == 1)
							<div class="form-group">
								<label for="role" class="col-sm-2 control-label">Role</label>
								<div class="col-sm-10">
									<select name="role" id="role" class="form-control" onchange="hidePermision()">
										@foreach ($roles as $role)
											<option value="{{ $role->id }}" @if ($role->id == $data->role->id) selected="selected" @endif> 
												{{ $role->name }}
											</option>
										@endforeach
									</select>
								</div>
							</div>
						@endif
						<div class="form-group" id="permission" style="display:none" >
							<label for="role" class="col-sm-2 control-label">Read Users Info</label>
							<div class="col-sm-10">
								<select  class="form-control" name="permission"  >
									<option value="0">No</option>
									<option value="1">Yes</option>
								</select>
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
			function hidePermision(){
				var role = document.getElementById('role')
				var roleId = role.options[role.selectedIndex].value;
					if(roleId != 3){
						document.getElementById('permission').setAttribute("style", "display:true")
					}else{
						document.getElementById('permission').setAttribute("style", "display:none")
					}
			}
		</script>
@endsection
