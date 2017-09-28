@extends('templates.admin.master')
@section('main-content')

<div class="content">
	<div class="women_main">
		<!-- start content -->
		<div class="grids">
			<div class="progressbar-heading grids-heading">
				<h2>Thêm User</h2>
			</div>
			@if (count($errors) > 0)
			  <div class="alert alert-danger">
			    <ul>
			      @foreach ($errors->all() as $error)
			      <li>{{ $error }}</li>
			      @endforeach
			    </ul>
			  </div>
			@endif
			<div class="panel panel-widget forms-panel">
				<div class="forms">
					<div class="form-grids widget-shadow" data-example-id="basic-forms"> 
						
						<div class="form-body">
							<form action="{{ route('admin.user.create') }}" method="POST">
							{{ csrf_field() }}
								<div class="form-group" style="width:400px">
									<label for="exampleInputEmail1">Username</label> 
									<input type="text" name="username" class="form-control" id="exampleInputEmail1" placeholder="Username"> 
								</div> 
								<div class="form-group" style="width:400px">
									<label for="exampleInputEmail1">Password</label> 
									<input type="text" name="password" class="form-control" id="exampleInputEmail1" placeholder="Password"> 
								</div> 
								<div class="form-group" style="width:400px">
									<label for="exampleInputEmail1">Fullname</label> 
									<input type="text" name="fullname" class="form-control" id="exampleInputEmail1" placeholder="Fullname"> 
								</div> 
								<div class="form-group" style="width:400px">
									<label for="exampleInputEmail1">Email</label> 
									<input type="text" name="email" class="form-control" id="exampleInputEmail1" placeholder="Email"> 
								</div> 
								<div class="form-group" style="width:400px">
									<label for="exampleInputEmail1">Address</label> 
									<input type="text" name="address" class="form-control" id="exampleInputEmail1" placeholder="Address"> 
								</div> 
								<button type="submit" class="btn btn-default">Thêm</button> 
							</form> 
						</div>
					</div>
				</div>
			</div>
			@stop