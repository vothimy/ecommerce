@extends('templates.admin.master')
@section('main-content')

<div class="content">
	<div class="women_main">
		<!-- start content -->
		<div class="grids">
			<div class="progressbar-heading grids-heading">
				<h2>Sửa User</h2>
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
							<form action="{{ route('admin.user.edit',['id'=>$arItem->id]) }}" method="POST">
							{{ csrf_field() }}
								<div class="form-group" style="width:400px">
									<label for="exampleInputEmail1">Username</label> 
									<input type="text" readonly="readonly" name="username" value="{{ $arItem->username }}" class="form-control" id="exampleInputEmail1" placeholder="Username"> 
								</div> 
								<div class="form-group" style="width:400px">
									<label for="exampleInputEmail1">Password</label> 
									<input type="password" name="password" class="form-control" id="exampleInputEmail1" placeholder="Password"> 
								</div> 
								<div class="form-group" style="width:400px">
									<label for="exampleInputEmail1">Fullname</label> 
									<input type="text" name="fullname" value="{{ $arItem->fullname }}" class="form-control" id="exampleInputEmail1" placeholder="Fullname"> 
								</div> 
								<button type="submit" class="btn btn-default">Cập nhật</button> 
							</form> 
						</div>
					</div>
				</div>
			</div>
			@stop