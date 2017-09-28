@extends('templates.admin.master')
@section('main-content')

<div class="content">
	<div class="women_main">
		<!-- start content -->
		<div class="grids">
			<div class="progressbar-heading grids-heading">
				<h2>Sửa thông tin đơn hàng</h2>
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
							<form action="" method="POST">
								<div class="form-group">
									<label for="exampleInputEmail1">Username</label> 
									<input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Tên đăng nhập"> 
								</div> 
								<div class="form-group">
									<label for="exampleInputEmail1">Fullname</label> 
									<input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Tên đầy đủ"> 
								</div>
								<div class="form-group">
									<label for="exampleInputEmail1">Password</label> 
									<input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Password"> 
								</div>
								<div class="form-group">
									<label for="exampleInputEmail1">Địa chỉ</label> 
									<input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Địa chỉ"> 
								</div>
								<div class="form-group">
									<label for="exampleInputEmail1">Sđt</label> 
									<input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Số điện thoại"> 
								</div>
								<div class="form-group">
									<label for="exampleInputEmail1">Email</label> 
									<input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Email"> 
								</div>
								<button type="submit" class="btn btn-default">Cập nhật</button> 
							</form> 
						</div>
					</div>
				</div>
			</div>
			@stop