<div class="box box-info">
		<div class="box-header with-border">
			<h3 class="box-title"></h3>
		</div>
		<form id='userform' class="form-horizontal" method="POST" action="{{action('UserController@store')}}">
			{{ csrf_field() }}
			<div class="box-body">
				<div class="form-group">
					<label for="first_name" class="col-sm-2 control-label">First Name</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="first_name" placeholder="First Name" name="first_name">
					</div>
				</div>

				<div class="form-group">
					<label for="last_name" class="col-sm-2 control-label">Last Name</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="last_name" placeholder="Last Name" name="last_name">
					</div>
				</div>

				<div class="form-group">
					<label for="email" class="col-sm-2 control-label">Email</label>
					<div class="col-sm-10">
						<input type="email" class="form-control" id="email" placeholder="Email" name="email">
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
				
			</div>
			<div class="box-footer">
				<button type="submit" class="btn btn-info pull-right">Create</button>
			</div>
		</form>
	</div>