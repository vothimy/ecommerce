@extends('templates.admin.master')
@section('main-content')

<div class="content">
	<div class="women_main">
		<!-- start content -->
		<div class="grids">
			<div class="progressbar-heading grids-heading">
				<h2>Chỉnh sửa giày</h2>
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
							<form action="{{ route('admin.giay.edit',['id'=>$arItem->id]) }}" method="POST">
								{{ csrf_field() }}
								<div class="form-group" style="width:500px;">
									<table>
										<tr>
											<td style="border-bottom: none">
												<label for="exampleInputEmail1" >Tên giày</label> 
												<input type="text" name="name" value="{{ $arItem->tensp }}" class="form-control" id="exampleInputEmail1" placeholder="Tên giày"> 
											</td>
											<td style="border-bottom: none">
												<label for="exampleInputPassword1">Thuộc kiểu giày :</label> 
												<select style="height:35px;" name="id_kieu">
													@foreach($arCat as $arCat)
													@if($arItem->id_kieu == $arCat->id)
													<option selected value="{{ $arCat->id }}">{{ $arCat->tenkieu }}</option>
													@else
													<option>{{ $arCat->tenkieu }}</option>
													@endif
													@endforeach
												</select>
											</td>
										</tr>
									</table>
								</div> 
								<div class="form-group" style="width:800px">
									<table>
										<tr>
											<td style="border-bottom: none">
												<label for="exampleInputEmail1">Giá</label> 
												<input type="text" name="gia" value="{{ $arItem->gia }}" class="form-control" id="exampleInputEmail1" placeholder="Giá giày"> 
											</td>
											<td style="border-bottom: none">
												<label for="exampleInputFile">Chọn ảnh mới</label> 
												<input type="file" name="hinh[]" multiple id="exampleInputFile">
											</td>
											
										</td>
										@foreach($arHA as $item)
										@if($arItem->id == $item['id_sp'])
										<td style="border-bottom: none">
											<label for="exampleInputFile">Hình ảnh cũ:</label> 
											<img src="{{ $publicfiles }}/{{ $item['name'] }}" style="width:70px;height:70px;">
										</td>
										@break;
										@endif
										@endforeach
									</tr>
								</table>
							</div>
							<div class="form-group" style="width:600px">
								<table>

									<tr>
										@foreach($arSL as $itemSL)
										@if($itemSL->size == 37)
										<td style="border-bottom: none">
											<label for="exampleInputEmail1">Số lượng : Size 37</label> 
											<input type="text" name="sl37" class="form-control" id="exampleInputEmail1" placeholder="size 37" value="{{ $itemSL->soluong }} "> 
										</td>
										@elseif($itemSL->size == 38)
										<td style="border-bottom: none">
											<label for="exampleInputEmail1">Số lượng : Size 38</label> 
											<input type="text" name="sl38" class="form-control" id="exampleInputEmail1" placeholder="size 38" value="{{ $itemSL->soluong }} "> 
										</td>
										@elseif($itemSL->size == 39)
										<td style="border-bottom: none">
											<label for="exampleInputEmail1">Số lượng : Size 39</label> 
											<input type="text" name="sl39" class="form-control" id="exampleInputEmail1" placeholder="size 39" value="{{ $itemSL->soluong }} "> 
										</td>
										@elseif($itemSL->size == 40)
										<td style="border-bottom: none">
											<label for="exampleInputEmail1">Số lượng : Size 40</label> 
											<input type="text" name="sl40" class="form-control" id="exampleInputEmail1" placeholder="size 40" value="{{ $itemSL->soluong }} "> 
										</td>
										@elseif($itemSL->size == 41)
										<td style="border-bottom: none">
											<label for="exampleInputEmail1">Số lượng : Size 41</label> 
											<input type="text" name="sl41" class="form-control" id="exampleInputEmail1" placeholder="size 41" value="{{ $itemSL->soluong }} "> 
										</td>
										@endif
										@endforeach

									</tr>
								</table>
							</div> 
							<div class="form-group" style="width:500px">
								<label for="exampleInputEmail1">Mô tả</label>
								<textarea name="mota" class="form-control" id="exampleInputEmail1">{{ $arItem->mota }}</textarea>
							</div>
							<button type="submit" class="btn btn-default">Cập nhật</button>

						</form> 
					</div>
				</div>
			</div>
		</div>
		@stop