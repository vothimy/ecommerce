
@include('templates.public.header')

<div class="ckeckout">
	<div class="container">
		<div class="ckeckout-top">
			<div class=" cart-items heading">
				<h3>Giỏ hàng của bạn (<span id="countCart">{{ Cart::count(0) }}</span> sản phẩm)</h3>
				<div class="in-check" >
					<ul class="unit">
						<li class="active"><span>SẢN PHẨM</span></li>
						<li><span>GIÁ</span></li>
						<li><span>SỐ LƯỢNG</span></li>
						<li><span>SIZE</span></li>
						<li><span>THÀNH TIỀN</span></li>
						<li><span>XÓA</span></li>
						<div class="clearfix"> </div>
					</ul>
					<form action="" method="POST">
						{{ csrf_field() }}
						@foreach($content as $item)
						<ul class="cart-header2 cart-header3 sp{{ $item->rowId }}">
							<li class="ring-in active">
								<?php 
								$nameSlug = str_slug($item->name);
								?>
								<a href="{{ route('public.giay.chitiet',['slug'=>$nameSlug,'id'=>$item->id]) }}">
									<img src="{{ $publicfiles }}/{{ $item->options->img }}"  class="img-responsive" title="Bạn có muốn chọn lại size" alt="">
									<span class="cart-name">
										{{ $item->name }}
									</span>
								</a>
							</li>
							<li><span style=" margin-top: 55px;">{{ number_format($item->price) }} đ</span></li>
							<li>
								<input type="number" name="" value="{{ $item->qty }}" min="1" id="qty{{ $item->rowId }}">
								<span>
									<a href="javascript:void(0)">
										<img src="{{ $publicUrl }}/images/synchronization-arrows.png" class="updatecart icon-del" id="{{ $item->rowId }}">
									</a>
								</span>
							</li>
							<li>
								<span  style=" margin-top: 55px;">{{ $item->options->size }}</span>
								
							</li>
							<li >
								<span  style=" margin-top: 55px;" id="tien{{ $item->rowId }}">{{ number_format($item->price*$item->qty) }} đ</span>
							</li>
							<li>
								<span  style=" margin-top: 55px; margin-left: 37px;">
									<a href="javascript:void(0)">
										<img src="{{ $publicUrl }}/images/recyclebin.png" class="delete icon" id="{{ $item->rowId }}">
									</a>
								</span>
							</li>
							<div class="clearfix"> </div>
						</ul>

						@endforeach
						<ul class="cart-header2" style="list-style: none;background: #e5e5e5;font-family: arial !important">
							<li style="float: left; width: 200px !important;    margin-top: 10px;    margin-right: 236px;" >
								<a href="javascript:void(0)" class="del-all" >
									<img src="{{ $publicUrl }}/images/recyclebin.png" class="delete icon"/>Xóa tất cả các sản phẩm
								</a>
							</li>
							<li style="font-size: 28px;width: 300px !important;float: left;">Tổng tiền : <p style="float: right;" id="totalCart">{{ Cart::total(0) }} đ</p style="float: right;"></li>
							<div class="clearfix"> </div>
						</ul>
					</form>
				</div>
			</div>  
		</div>
	</div>
</div>
<!--start-ckeckout-->

<div class="ttmh">
	<a href="{{ route('public.index.index') }}" id="ttmh">Tiếp tục mua hàng</a>
	<?php 
	if(Auth::user() == ''){
		?>
		<button class="btn btn-primary" id="ttmh1" data-toggle="modal" data-target="#myModal">
			Đặt hàng
		</button>
		<?php 
	}else{
		if(Cart::count() != 0){
		?>
		<a href="{{ route('public.giay.ordercustomer') }}" id="ttmh1" >Đặt hàng</a>
		<?php	
		}else{
		?>
		<a href="" id="ttmh1" >Đặt hàng</a>
		<?php }} ?>
	@if(Cart::count() != 0)
	<!-- Modal -->
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
					<h4 class="modal-title" id="myModalLabel">ĐĂNG NHẬP</h4>
				</div>
				<div class="modal-body">
					<form action="{{ route('public.giay.loginmember') }}" method="POST">
						{{ csrf_field() }}
						<div class="form-group">
							<input type="text" name="username" required class="form-control" id="exampleInputEmail1" value="" placeholder="Username">
						</div>
						<div class="form-group">
							<input type="password" name="password" required class="form-control" id="exampleInputPassword1" value="" placeholder="Mật khẩu">
						</div>
						<button type="submit" class="btn btn-default">ĐĂNG NHẬP</button>
						<a href="{{ route('public.giay.ordercustomer') }}" title="Điền thông tin" class="btn btn-default" id="btn-default1">ĐẶT HÀNG KHÔNG CẦN ĐĂNG KÍ TÀI KHOẢN
						</a>
					</form>
				</div>
			</div>
		</div>
	</div>
	@else
	<script type="text/javascript">alert('Giỏ hàng đang rỗng');</script>
	@endif
</div>

<!-- end điền thông tiền -->
</div>
<hr>
<div class="product">
	<div class="container">
		<div class="product-main">
			<div class="col-md-12 p-left">
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
									<span>Xem chi tiết</span>
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
			{{ $arItems->links() }}
			@if(Session::has('msg'))
			<script type="text/javascript">alert('{{ Session::get("msg") }}');</script>
			@endif
			@include('templates.public.footer')  
			
