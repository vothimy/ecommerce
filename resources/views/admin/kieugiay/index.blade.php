@extends('templates.admin.master')
@section('main-content')

<div class="content">
	<div class="women_main">
		<!-- start content -->
		<div class="grids">
			<div class="progressbar-heading grids-heading">
				<h2>Các kiểu giày</h2>
			</div>
			<div class="panel panel-widget forms-panel">
				<div class="forms">
					<div class="form-grids widget-shadow" data-example-id="basic-forms"> 
						@if(Session::has('msg'))
					    <div class="form-title">{{ Session::get('msg') }}</div>
					    @endif
						<a href="{{ route('admin.kieugiay.create') }}" class="addtop"><img id="icon" src="{{ $adminUrl }}/images/Add.png"> Thêm</a>
						<div class="form-body">
							<table>
								<tr>
									<th style="width:10%">ID</th>
									<th style="width:40%">Tên kiểu</th>
									<th style="width:30%">Thuộc loại</th>
									<th style="width:40%">Chức năng</th>
								</tr>
								@foreach($arItems as $arItem)
								<tr>
									<td>{{ $arItem->id }}</td>
									<td>{{ $arItem->tenkieu }}</td>
									<td>{{ $arItem->tenloai }}</td>
									<td>
										<a href="{{ route('admin.kieugiay.edit',['id'=>$arItem->id]) }}">
										<img id="icon" src="{{ $adminUrl }}/images/Edit.png">
										Sửa</a> || 
										<a href="{{ route('admin.kieugiay.destroy',['id'=>$arItem->id]) }}">
										<img id="icon" src="{{ $adminUrl }}/images/Remove.png">
										Xóa</a>
									</td>
								</tr>
								@endforeach
							</table>
						</div>
						<ul class="pagination">
              				 {{ $arItems->links() }}
               			 </ul>
					</div>
				</div>
			</div>
			@stop