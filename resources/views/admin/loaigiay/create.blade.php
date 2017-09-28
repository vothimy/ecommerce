@extends('templates.admin.master')
@section('main-content')

<div class="content">
	<div class="women_main">
		<!-- start content -->
		<div class="grids">
			<div class="progressbar-heading grids-heading">
				<h2>Thêm loại giày</h2>
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
							<form action="{{ route('admin.loaigiay.create') }}" method="POST">
							{{ csrf_field() }}
								<div class="form-group">
									<label for="exampleInputEmail1">Tên loại giày</label> 
									<input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Tên loại giày"> 
								</div> 
								<button type="submit" class="btn btn-default">Thêm</button> 
							</form> 
						</div>
					</div>
				</div>
			</div>
			@stop