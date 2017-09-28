@extends('templates.admin.master')
@section('main-content')

<div class="content">
	<div class="women_main">
		<!-- start content -->
		<div class="grids">
			<div class="progressbar-heading grids-heading">
				<h2>Danh sách đơn hàng</h2>
			</div>
			<div class="panel panel-widget forms-panel">
				<div class="forms">
					<div class="form-grids widget-shadow" data-example-id="basic-forms"> 
						@if(Session::has('msg'))
						<div class="form-title">{{ Session::get('msg') }}</div>
						@endif
						
						<div class="form-body">
							<table style="font-size: 14px;">
								<tr>
									<th style="width:2%" >IDĐH</th>
									<th style="width:10%">Tên KH</th>
									<th style="width:20%">Địa chỉ</th>
									
									<th style="width:8%">Ngày đặt</th>
									<th style="width:8%">TT Gửi hàng</th>
									<th style="width:8%">TT Thanh toán</th>
									<th style="width:8%">Chi tiết</th>
									<th style="width:8%">Xóa</th>
								</tr>
								@foreach($arItems as $arItem)
								<tr>
									<td>{{ $arItem->id }}</td>
									<td>{{ $arItem->fullname }}</td>
									<td>{{ $arItem->noigiao }}</td>
									
									<?php 
									$date = explode(' ', $arItem->created_at)
									?>
									<td>{{ $date[0] }}</td>
									<td >
										<div onclick="changeGH({{ $arItem->id }})">
											@if($arItem->TTGH == 1)	
											<input type="checkbox" checked="checked">
											@else
											<input type="checkbox">
											@endif
										</div>
									</td>
									<td >
										<div onclick="changeTT({{ $arItem->id }})">
											@if($arItem->TTTT == 1)	
											<input type="checkbox" checked="checked">
											@else
											<input type="checkbox">
											@endif
										</div>
									</td>
									<td>
										<a href="{{route('admin.dh.detail',['id_dh'=>$arItem->id])}}" class="btn btn-primary" data-toggle="modal" data-target="#HienHInh">Xem</a>
										<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="HienHInh">
											<div class="modal-dialog modal-lg">
												<div class="modal-content">
													<h4 class="modal-title" id="myModalLabel">Chi tiết đơn hàng(Mã HĐ: {{ $arItem->id }} - Tên KH: {{ $arItem->fullname }} )</h4>
													<?php 
													$tt = 0;
													?>
													<table>
														<tr>
															<th style="width:10%">IDCT</th>
															<th style="width:30%">Mã SP</th>
															<th>Số lượng</th>
															<th>Giá (VNĐ)</th>
															<th>Tổng tiền</th>
														</tr>
														@foreach($arCT as $item)
														
														<tr>
															<td >{{ $item->id }}</td>
															<td>{{ $item->tensp }}</td>
															<td>{{ $item->soluong }}</td>
															<td>{{ number_format($item->gia) }} đ</td>
															<?php 
															$tongtien = number_format($item->soluong*$item->gia);
															$tt += $item->soluong*$item->gia; 
															?>
															<td>{{ $tongtien }} đ</td>
														</tr>

														@endforeach
														<tr>
															<td colspan="3">
															</td>
															<td colspan="2">
																<b>Thành tiền:</b> {{ number_format($tt) }} VNĐ
															</td>
														</tr>
													</table>

												</div>
											</div>
										</div>
									</td>
									<td>
										<a href="{{ route('admin.dh.destroy',['id'=>$arItem->id]) }}" onclick="return xacNhanXoa()">
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

			<script type="text/javascript">
				function changeGH(id_dh){
					$.ajax({
						url: '{{ route("admin.dh.ajax1") }}',  
						type: 'get',
						cache: false,
						data: {
							aid : id_dh
						},
						success: function(result){
							if(result.TTGH == 1){
								alert('thành công');
							}else{
								alert('hủy');
							}						
						}
					});     
				}
			</script>
			<script type="text/javascript">
				function changeTT(id_dh){
					$.ajax({
						url: '{{ route("admin.dh.ajax2") }}',  
						type: 'get',
						cache: false,
						data: {
							aid : id_dh
						},
						success: function(result){
							if(result.TTTT == 1){
								alert('thành công');
							}else{
								alert('hủy');
							}						
						}
					});     
				}
			</script>
			@stop