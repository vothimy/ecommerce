@extends('templates.public.master')
@section('main-content')
<!--start-breadcrumbs-->

<!--start-single-->
<div class="single contact">
	<div class="container">
		<div class="single-main">
			<div class="col-md-9 single-main-left">
				<div class="sngl-top">
					<div class="col-md-5 single-top-left">	
						<div class="flexslider">
							<ul class="slides">
								@foreach($arH as $arh)
								<li data-thumb="{{ $publicfiles }}/{{ $arh->name }}">
									<img src="{{ $publicfiles }}/{{ $arh->name }}" />
								</li>
								@endforeach
							</ul>
						</div>
						<!-- FlexSlider -->
						<script defer src="{{ $publicUrl }}/js/jquery.flexslider.js"></script>
						<link rel="stylesheet" href="{{ $publicUrl }}/css/flexslider.css" type="text/css" media="screen" />

						<script>
							$(window).load(function() {
								$('.flexslider').flexslider({
									animation: "slide",
									controlNav: "thumbnails"
								});
							});
						</script>
					</div>	
					<div class="col-md-7 single-top-right">
						<div class="details-left-info simpleCart_shelfItem">
							<h3>{{ $arDetail->tensp }}</h3>
							<div class="price_single">
								<!-- //<span class="reducedfrom">800.000đ</span> -->
								<span class="actual item_price">{{ number_format($arDetail->gia) }} VNĐ</span>
							</div>
							<h2 class="quick">Mô tả:</h2>
							<p class="quick_desc">{{ $arDetail->mota }}</p>
							<div class="quantity_box">
								<ul class="product-qty">
									<span>Kích cỡ:</span>
									<select id="bigcat">
										<option value="">--Chọn kích thước--</option>
										@foreach($arSL as $arsl)
											@if($arsl->soluong > 0)
											<option value="{{ $arsl->size }}">{{ $arsl->size }}</option>
											@endif
										@endforeach
									</select>
								</ul>
							</div>
							
							<div class="clearfix"> </div>
							<div class="single-but item_add">
								<a href="javascript:void(0)" title="Thêm sản phẩm vào giỏ hàng" id="{{ $arDetail->id }}" class="addcart">Thêm vào giỏ</a>
							</div>
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="latest products">

					<div class="product-one">
						@foreach($arDetail2 as $item)
						<div class="col-md-3 product-left"> 
							<div class="p-one simpleCart_shelfItem">
								<?php 
								$nameSlug = str_slug($item->tensp);
								?>
								<a href="{{ route('public.giay.chitiet',['slug'=>$nameSlug,'id'=>$item->id]) }}">
									@foreach($arHA as $arha)
									@if($item->id == $arha['id_sp'])
									<img src="{{ $publicfiles }}/{{ $arha->name }}" alt="" />
									@break
									@endif
									
									@endforeach
									<div class="mask">
										<span>Xem chi tiết</span>
									</div>
								</a>
								<h4>{{ $item->tensp }}</h4>
								<p><a class="item_add" href="#"><i></i> <span class=" item_price">{{ number_format($item->gia) }} VNĐ</span></a></p>
							</div>
						</div>
						@endforeach
						<div class="clearfix"> </div>
					</div>
				</div>
			</div>

			<!--end-single-->
			
			@stop 

