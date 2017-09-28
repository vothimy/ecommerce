@extends('templates.admin.master')
@section('main-content')

<div class="content">
	<div class="women_main">
		<!-- start content -->
		<div class="grids">
			<div class="progressbar-heading grids-heading">
				<h2>Các loại giầy</h2>
			</div>
			<div class="panel panel-widget forms-panel">
				<div class="forms">
					<div class="form-grids widget-shadow" data-example-id="basic-forms"> 
						<!-- <div class="form-title">
							<h4>Basic Form :</h4>
						</div> -->
							<div class="form-body">
              <form action="" method="POST">
                <div class="form-group">
                  <label for="exampleInputEmail1">Username</label> 
                  <input type="text" name="username" class="form-control" id="exampleInputEmail1" placeholder="Username"> 
                </div> 
                <div class="form-group"> 
                  <label for="exampleInputPassword1">Password</label> 
                  <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                </div> 
                <div class="form-group"> 
                  <label for="exampleInputFile">File input</label> 
                  <input type="file" id="exampleInputFile"> 
                </div> 
                <button type="submit" class="btn btn-default">Submit</button> 
              </form> 
            </div>
					</div>
				</div>
			</div>
		@stop