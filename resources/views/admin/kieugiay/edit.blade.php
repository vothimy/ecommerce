@extends('templates.admin.master')
@section('main-content')

<div class="content">
	<div class="women_main">
		<!-- start content -->
		<div class="grids">
			<div class="progressbar-heading grids-heading">
				<h2>Sửa kiểu giày</h2>
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
							<form action="{{ route('admin.kieugiay.edit',['id'=>$arItem->id]) }}" method="POST">
							{{ csrf_field() }}
								<div class="form-group">
									<label for="exampleInputEmail1">Tên kiểu giày</label> 
									<input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Tên kiểu giày" value="{{$arItem->tenkieu}}"> 
								</div> 
								<div class="form-group"> 
				                    <label for="exampleInputPassword1">Thuộc loại giày :</label> 
				                    <select name="id_loai">
				                    	<option>--loại giày--</option>
				                    	@foreach($arCat as $arCat)
				                    		@if($arCat->id == $arItem->id_loai)
				                    		<option selected value="{{$arCat->id}}">{{ $arCat->tenloai }}</option>
				                    		@else
				                    		<option value="{{$arCat->id}}">{{ $arCat->tenloai }}</option>
				                    		@endif
				                    	@endforeach
				                    </select>
				                </div> 
								<button type="submit" class="btn btn-default">Cập nhật</button> 
							</form> 
						</div>
					</div>
				</div>
			</div>
			@stop