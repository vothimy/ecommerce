@extends('templates.admin.master')
@section('main-content')

<div class="content">
	<div class="women_main">
		<!-- start content -->
		<div class="grids">
			<div class="progressbar-heading grids-heading">
				<h2>Các loại giày</h2>
			</div>
			<div class="panel panel-widget forms-panel">
				<div class="forms">
					<div class="form-grids widget-shadow" data-example-id="basic-forms"> 
						@if(Session::has('msg'))
						<div class="form-title" style="margin-bottom: 20px;">{{ Session::get('msg') }}</div>
						@endif
						<a href="{{ route('admin.loaigiay.create') }}" class="addtop"><img id="icon" src="{{ $adminUrl }}/images/Add.png"> Thêm</a>
						<div class="form-body">
							<table>
								<tr>
									<th>ID</th>
									<th style="width:40%">Tên loại</th>
									<th style="width:40%">Chức năng</th>
								</tr>
								@foreach($arItems as $arItem)
								<tr>
									<td>{{ $arItem->id }}</td>
									<td>{{ $arItem->tenloai }}</td>
									<td>
										<a href="{{ route('admin.loaigiay.edit',['id'=>$arItem->id]) }}">
										<img id="icon" src="{{ $adminUrl }}/images/Edit.png">
										Sửa</a> || 
										<img id="icon" src="{{ $adminUrl }}/images/Remove.png">
										<a href="{{ route('admin.loaigiay.destroy',['id'=>$arItem->id]) }}">Xóa
										</a>
									</td>
								</tr>
								@endforeach
							</table>
						</div>
					</div>
				</div>
			</div>
			@stop