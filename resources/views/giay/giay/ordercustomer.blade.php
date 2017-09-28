@include('templates.public.header')
<!--start-breadcrumbs-->

<!--start-single-->
<div class="single1 contact">
	<div class="container">
		<div class="single-main">
			<div class="col-md-9">
				<div class="row">
					<div class="col-md-3 single-main-left">
						<h5>
							<img src="{{ $publicUrl }}/images/address.png" title="Địa chỉ giao hàng" class="title-address">
							 Địa chỉ giao hàng
						</h5>
					</div>
					<?php 
						$fullname = '';
						$phone = '';
						$email = '';
						$address = '';
						if(Auth::user() != ''){
							$user = Auth::user();
							$fullname = $user->fullname;
							$phone = $user->phone;
							$email = $user->email;
							$address = $user->address;
						}
					?>
					<div class="col-md-9 single-main-left">
							<form action="{{ route('public.giay.ordercustomer') }}" method="POST">
								{{ csrf_field() }}
								<div class="group1">
									<input type="text" name="fullname" value="{{ $fullname }}" placeholder="Họ và tên" class="inputName" required>
									<input type="text" name="phone" value="{{ $phone }}" placeholder="Nhập số điện thoại" class="inputSdt" required>
									<input type="text" name="email" value="{{ $email }}" placeholder="Nhập Email" class="inputEmail" required>
								</div>
								<div class="group2">
									<input type="text" name="address" value="{{ $address }}" placeholder="Nhập địa chỉ" class="inputAddress" required>
								</div>
								<div class="group3">
									<input type="text" name="notes" placeholder="Ghi chú đơn hàng" class="inputNote">
								</div>
							
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 single-main-left2"> 
						<div class="panel panel-default">
						  <div class="panel-heading">Hình thức thanh toán</div>
						  <div class="panel-body">
						  	@foreach($arHTTT as $arhttt)
						    <input type="radio" name="httt" value="{{ $arhttt->name }}" checked><span>&nbsp;{{ $arhttt->name }}</span>
						    @endforeach
						  </div>
						</div>
					</div>
					
					<div class="row">
						<div class="col-md-12 single-main-left3"> 
							<b>LƯU Ý: </b>
							<p>Kiểm tra đơn hàng, Phí giao dịch, Ưu đãi giảm giá của bạn trước khi nhấn hoàn tất.</p>	
						</div>
					</div>

				</div>
			</div>
			<div class="col-md-3 single-right">
				<ul class="product-categories">
					<div class="panel panel-default">
					  <div class="panel-heading">SỐ TIỀN THANH TOÁN</div>
					  <div class="panel-body">
					    <p>
					    	<span class="order-left"><img src="{{ $publicUrl }}/images/order-history.png">&nbsp;Đơn giá</span>
					    	<span class="order-right">{{ Cart::total(0) }} đ</span>
					    </p>
					    <p>
					    	<span class="order-left"><img src="{{ $publicUrl }}/images/advantage_sale-128.png">&nbsp;Mã giảm giá</span>
					    	<span class="order-right">0đ</span>
					    </p>
					    <p>
					    	<span class="order-left"><img src="{{ $publicUrl }}/images/meanicons_7-128.png">&nbsp;Phí vận chuyển</span>
					    	<span class="order-right">0đ</span>
					    </p>
					    <div class=" panel-heading panel-heading1">Tổng cộng: <b style="font-size: 20px;">{{ Cart::total(0) }} đ</b></div>
					  </div>
					</div>
						<input  type="submit" id="submit" name="submit" value="HOÀN TẤT" />
					</form>
				</ul>
      </div>
        <!--end-single-->
@if(Session::has('msg'))
<script type="text/javascript">alert('{{ Session::get("msg") }}');</script>
@endif
@include('templates.public.footer')
