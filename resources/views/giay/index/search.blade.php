@extends('templates.public.master')
@section('main-content')
<div class="product">
	<div class="container">
		<div class="product-main">
			<div class="col-md-9 p-left">
			<?php echo "Có " . $i .' kết quả tìm kiếm' ?>
				<div class="product-one">
					@foreach($arItems as $item)
					<div class="col-md-4 product-left single-left"> 
						<div class="p-one simpleCart_shelfItem">
						<?php 
	                        $nameSlug = str_slug($item->tensp);
	                    ?>
							<a href="{{ route('public.giay.chitiet',['slug'=>$nameSlug,'id'=>$item->id]) }}">
								@foreach($arHA as $arha)
	                                @if($item->id == $arha['id_sp'])
	                                <img src="{{ $publicfiles }}/{{ $arha->name }}" alt="{{ $item->tensp }}" />
	                                @break
	                                @endif
                           		 @endforeach
								<div class="mask mask1">
									<span>Quick View</span>
								</div>
							</a>
							<h4>{{ $item->tensp }}</h4>
							<p><a class="item_add" href="#"><i></i> <span class=" item_price">{{ $item->gia }}</span></a></p>
						</div>
					</div>
					@endforeach
					<div class="clearfix"> </div>
				</div>
			</div>
			@if(Session::has('msg'))
			<script type="text/javascript">alert('{{ Session::get("msg") }}');</script>
			@endif
			@stop