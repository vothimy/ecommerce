
<!DOCTYPE html>
<html>
<head>
	<title>
		<?php 
		if(isset($title)){
			echo $title;
		}else{
			echo "Shop bán giày online";
		}
		?>
	</title>
	<link href="{{  $adminUrl }}/css/login.css" rel='stylesheet' type='text/css' />
	<link href="{{ $publicUrl }}/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="{{ $publicUrl }}/js/jquery-1.11.0.min.js"></script>
	<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
	<!-- Custom Theme files -->
	<!--theme-style-->
	<link href="{{ $publicUrl }}/css/style.css" rel="stylesheet" type="text/css" media="all" />	
	<!--//theme-style-->
	<link rel='stylesheet prefetch' href='http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css'>

	<link href="{{ $publicUrl }}/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Free Style Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
	Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
	<link rel="Shortcut Icon" href="{{$publicUrl}}/images/NewIcon.ico" type="image/x-icon" />  

	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
	<!--fonts-->
	<link href='http://fonts.googleapis.com/css?family=Alegreya+Sans+SC:100,300,400,500,700,800,900,100italic,300italic,400italic,500italic,700italic,800italic,900italic' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css'>
	<!--//fonts-->
	<!-- <script type="text/javascript" src="{{ $publicUrl }}/js/jquery-latest.js"></script> -->

	<script type="text/javascript" src="{{ $publicUrl }}/js/move-top.js"></script>
	<script type="text/javascript" src="{{ $publicUrl }}/js/easing.js"></script>
	<script type="text/javascript">
		jQuery(document).ready(function($) {
			$(".scroll").click(function(event){		
				event.preventDefault();
				$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
			});
		});
	</script>	
	<!-- start menu -->
	<script src="{{ $publicUrl }}/js/simpleCart.min.js"> </script>
	<link href="{{ $publicUrl }}/css/memenu.css" rel="stylesheet" type="text/css" media="all" />
	<script type="text/javascript" src="{{ $publicUrl }}/js/memenu.js"></script>
	<script type="text/javascript" src="{{ $publicUrl }}/js/myscript.js"></script>
	<script>$(document).ready(function(){$(".memenu").memenu();});</script>				
</head>

<body> 
	<!--top-header-->
	<div class="top-header">
		<div class="container">
			<div class="top-header-main">
				<div class="col-md-4 top-header-left">
					<div class="search-bar">
						<form action="{{ route('public.index.search') }}" method="POST">
						{{csrf_field()}}
						<input type="text" name="name" value="" placeholder="Tìm kiếm...">
						<input type="submit" value="">
						</form>
					</div>
				</div>
				<div class="col-md-4 top-header-middle">
					<a href="/"><img src="{{ $publicUrl }}/images/logo-4.png" alt="" /></a>
				</div>
				<div class="col-md-4 top-header-right">
					<div class="cart box_1">
						<a href="{{ route('public.giay.giohang') }}">
							<h3> <div class="total">
								(<span id="qtyCart">{{ Cart::count() }}</span> sản phẩm)</div>
								<img src="{{ $publicUrl }}/images/cart-1.png" alt="" />
							</a>
							<!-- <p><a href="" class="simpleCart_empty" >
								@if(Cart::count() == 0)
								<?php echo "Giỏ hàng rỗng" ?>
								@endif
							</a></p> -->
							<div class="clearfix"> </div>
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
		
		<!--bottom-header-->
		<div class="header-bottom">
			<div class="container">
				<div class="top-nav">
					<ul class="memenu skyblue">
						<li  class="grid"><a href="/" class="abc"><i class="fa fa-home"></i>&nbsp;Trang chủ</a></li>
						<li class="grid"><a href="/" class="abc">Giới thiệu</a></li>
						<li class="grid"><a href="/" class="abc">Giày nữ</a></li>
						<li class="grid"><a href="/" class="abc">Giày nam</a></li>
						<?php 
						$user = Auth::user();
						if(!isset($user)){
							?>
							<li class="grid">
								<a href="" id="register" class="abc" data-toggle="modal" data-target="#myModalRegester">
								Đăng kí
								</a>
							</li>
							<!-- Modal -->
							
							<div class="modal fade" id="myModalRegester" tabindex="-1" role="dialog" aria-labelledby="myModalRegester" aria-hidden="true">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
											<h4 class="modal-title" id="myModalRegester">ĐĂNG KÍ</h4>
										</div>
										<div class="modal-body">
											<form action="{{ route('public.giay.register') }}" method="POST">
												{{ csrf_field() }}
												<div class="form-group">
													<input type="text" name="username" required class="form-control" id="exampleInputpass1" value="" placeholder="Username" style=" margin-bottom: 10px;width:255px !important;float: left;margin-right:20px;">
													<input type="text" name="fullname" required class="form-control" id="exampleInputpass1" value="" placeholder="Fullname" style="margin-bottom: 10px;width:255px !important;float: left;margin-right:20px;">
												</div>
												<div class="form-group">
													<input type="password" name="password1" required class="form-control" id="exampleInputpass1" value="" placeholder="Mật khẩu" style="width:255px !important;float: left;margin-right:20px;">
													<input type="text" name="phone"  class="form-control" id="exampleInputpass2" value="" placeholder="Số điện thoại" style="width:255px !important">
												</div>
												<div class="form-group">
													<input type="text" name="email" required class="form-control" id="exampleInputPassword1" value="" placeholder="Nhập Email">
												</div>
												<div class="form-group">
													<input type="text" name="address" required class="form-control" id="exampleInputPassword1" value="" placeholder="Nhập Địa chỉ">
												</div>
												<button type="submit" class="btn btn-default">ĐĂNG KÍ</button>
											</form>
										</div>
									</div>
								</div>
							</div> 
							<li class="grid">
								<a href="" id="register" class="abc" data-toggle="modal" data-target="#myModalLogin"><i class="fa fa-user"></i>
								Đăng nhập
								</a>
							</li>
							<div class="modal fade" id="myModalLogin" tabindex="-1" role="dialog" aria-labelledby="myModalLogin" aria-hidden="true">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
											<h4 class="modal-title" id="myModalLogin">ĐĂNG NHẬP</h4>
										</div>
										<div class="modal-body">
											<form action="{{ route('public.giay.dangnhap') }}" method="POST">
												{{ csrf_field() }}
												<div class="form-group">
													<input type="text" name="username" required class="form-control" id="exampleInputEmail1" value="" placeholder="Username">
												</div>
												<div class="form-group">
													<input type="password" name="password" required class="form-control" id="exampleInputPassword1" value="" placeholder="Mật khẩu">
												</div>
												<button type="submit" class="btn btn-default">ĐĂNG NHẬP</button>
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>
						<?php 
						} 
						?>
						<?php 
						$user = Auth::user();
						if(isset($user)){
							$username = $user->username;
							$fullname = $user->fullname;
							?>
							<li style="float: right;padding: 5px 30px 5px 30px;">
								<a href="">{{ $fullname }}</a>|<a href="{{ route('public.giay.logout') }}"style="float: right;" style="float: right;padding: 0px 30px 5px 30px;">Thoát</a>
							</li>
							<?php } ?>
						</ul>
					</div>
					<div class="clearfix"> </div>
				</div>
			</div>

			<!--bottom-header-->
    <!-- <script>
		$('.skyblue li').each(function(){
				if(window.location.href.indexOf($(this).find('a:first').attr('href'))>-1)
				{
					$(this).addClass('active').siblings().removeClass('active');
				}
			});
		</script> -->