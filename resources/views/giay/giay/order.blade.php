
@include('templates.public.header')
@if($arItems->hinhthuc == 'Phương thức thanh toán tại nhà')
<a href="{{ route('public.index.index') }}">Quay về trang chủ</a>
@endif
	<div class="wrapper-order">
		<div class="ckeckout">
			<div class="container">
				<div class="ckeckout-top">
					<h4>THÔNG TIN ĐƠN HÀNG VỪA ĐẶT</h4>
					<div class="info">
						<p><b>ID hóa đơn</b> : {{ $arItems->id }}</p>
						<p><b>Tên khách hàng</b> : {{ $arItems->tenkh }}</p>
						<p><b>Địa chỉ</b> : {{ $arItems->noigiao }}</p>
						<p><b>Ngày đặt hàng</b> : {{ $arItems->created_at }}</p>
						<p><b>Email</b> : {{ $arItems->email }}</p>
						<p><b>Số điện thoại</b> : 0{{ $arItems->phone }}</p>
						<p><b>Hình thức thanh toán</b> : {{ $arItems->hinhthuc }}</p>
						<p><b style="font-size: 20px;">Tổng cộng</b> : <b>{{ number_format($tt) }} VNĐ</b></p>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div style="text-align: center">
		<a href="{{route('public.giay.cancel',['id'=>$arItems->id])}}" style="margin-right:200px;font-size: 30px;">Hủy đơn hàng</a>
		<?php 
		if($arItems->hinhthuc == 'Ngân lượng'){
	?>
	<a target="_blank" href="https://www.nganluong.vn/button_payment.php?receiver=thimyvo18@gmail.com&product_name={{$arItems->id}}&price={{$tt}}&return_url=http://giayvtm.vn:8070/thanhcong/&comments={{$arItems->ghichu}}"><img src="https://www.nganluong.vn/css/newhome/img/button/safe-pay-2.png" 	border="0" /></a>
	<?php 
	}elseif($arItems->hinhthuc == 'Bảo kim'){
	?>
	<a target="_blank" href="https://www.baokim.vn/payment/product/version11?business=thimyvo18%40gmail.com&id=&order_description=000&product_name=giay&product_price={{$tt}}&product_quantity=1&total_amount={{$tt}}&url_cancel=&url_detail=&url_success="><img src="http://www.baokim.vn/developers/uploads/baokim_btn/thanhtoan-l.png" alt="Thanh toán an toàn với Bảo Kim !" border="0" title="Thanh toán trực tuyến an toàn dùng tài khoản Ngân hàng (VietcomBank, TechcomBank, Đông Á, VietinBank, Quân Đội, VIB, SHB,... và thẻ Quốc tế (Visa, Master Card...) qua Cổng thanh toán trực tuyến BảoKim.vn" ></a>	
	<?php 
		}
	?>
	</div>
@include('templates.public.footer')  
			
