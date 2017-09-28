@extends('templates.admin.master')
@section('main-content')

<div class="content">
	<div class="women_main">
		<!-- start content -->
		<div class="grids">
			<div class="progressbar-heading grids-heading">
				<h2>Phương thức thanh toán</h2>
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
							<form action="{{ route('admin.pttt.create') }}" method="POST">
							{{ csrf_field() }}
								<div class="form-group">
									<label for="exampleInputEmail1">Tên PTTT</label> 
									<input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Tên phương thức"> 
								</div> 
								<button type="submit" class="btn btn-default">Thêm</button> 
							</form> 
						</div>
					</div>
				</div>
			</div>
			@stop