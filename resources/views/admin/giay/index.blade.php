@extends('templates.admin.master')
@section('main-content')

<div class="content">
	<div class="women_main">
		<!-- start content -->
		<div class="grids">
			<div class="progressbar-heading grids-heading">
				<h2>Danh sách giày</h2>
			</div>
			<div class="panel panel-widget forms-panel">
				<div class="forms">
					<div class="form-grids widget-shadow" data-example-id="basic-forms"> 
						@if(Session::has('msg'))
					    <div class="form-title">{{ Session::get('msg') }}</div>
					    @endif
						<a href="{{ route('admin.giay.create') }}" class="addtop">
							<img id="icon" src="{{ $adminUrl }}/images/Add.png">
							 Thêm
						 </a>
						<div class="form-body">
							<table>
								<tr>
									<th style="width:5%">ID</th>
									<th style="width:25%">Tên giày</th>
									<th style="width:15%">Giá (VNĐ) </th>
									<th style="width:5%">Số lượng </th>
									<th style="width:10%">Hình ảnh </th>
									<th style="width:20%">Thuộc kiểu</th>
									<th style="width:30%; text-align: center" >Chức năng</th>
								</tr>
								@foreach($arItems as $arItem)
								<tr>
									<td>{{ $arItem->id }}</td>
									<td>{{ $arItem->tensp }}</td>
									<td>{{ number_format($arItem->gia) }}</td>
									<td>{{ $arItem->soluong }}</td>
									 @foreach($arHA as $item)
								 		@if($arItem->id == $item['id_sp'])
								 				<td><img src="{{ $publicfiles }}/{{ $item['name'] }}" style="width:70px;height:70px;"></td>
								 				@break;
								 		@endif
									 @endforeach
									
									<td>{{ $arItem->tenkieu }}</td>
									<td>
										<a href="{{ route('admin.giay.edit',['id'=>$arItem->id]) }}">
											<img id="icon" src="{{ $adminUrl }}/images/Edit.png">
											 Sửa
										</a> || 
										<a href="{{ route('admin.giay.destroy',['id'=>$arItem->id]) }}">
											<img id="icon" src="{{ $adminUrl }}/images/Remove.png">

										 Xóa
										</a>
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