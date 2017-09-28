@extends('templates.admin.master')
@section('main-content')

<div class="content">
	<div class="women_main">
		<!-- start content -->
		<div class="grids">
			<div class="progressbar-heading grids-heading">
				<h2>Danh sách users</h2>
			</div>
			<div class="panel panel-widget forms-panel">
				<div class="forms">
					<div class="form-grids widget-shadow" data-example-id="basic-forms"> 
						@if(Session::has('msg'))
					    <div class="form-title">{{ Session::get('msg') }}</div>
					    @endif
						<a href="{{ route('admin.user.create') }}" class="addtop"><img id="icon" src="{{ $adminUrl }}/images/Add.png"> Thêm</a>
						<div class="form-body">
							<table>
								<tr>
									<th style="width:10%">ID</th>
									<th style="width:20%">Username</th>
									<th style="width:30%">Fullname</th>
									<th style="width:20%">Role</th>
									<th style="width:30%">Chức năng</th>
								</tr>
								@foreach($arItems as $arItem)
								<tr>
									<td>{{ $arItem->id }}</td>
									<td>{{ $arItem->username }}</td>
									<td>{{ $arItem->fullname }}</td>
									@if($arItem->pq == 1)
									<td>User</td>
									@else 
									<td>Thành viên</td>
									@endif
									<td>
										<a href="{{ route('admin.user.edit',['id'=>$arItem->id]) }}">
										<img id="icon" src="{{ $adminUrl }}/images/Edit.png">
										Sửa	</a> || 
										<a href="{{ route('admin.user.destroy',['id'=>$arItem->id]) }}" onclick="return xacNhanXoa()">
										<img id="icon" src="{{ $adminUrl }}/images/Remove.png">Xóa
										</a></td>
								</tr>
								@endforeach
							</table>
						</div>
					</div>
				</div>
			</div>
			@stop