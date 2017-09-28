
<!DOCTYPE HTML>
<html>
<head>
	<title>Trang quản lý</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Gretong Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
	Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
	<!-- Bootstrap Core CSS -->
	<link href="{{  $adminUrl }}/css/login.css" rel='stylesheet' type='text/css' />
	<link href="{{  $adminUrl }}/css/bootstrap.min.css" rel='stylesheet' type='text/css' />
	<!-- <script src="{{  $adminUrl }}/js/jquery-1.10.2.min.js"></script> -->
	<script src="{{  $adminUrl }}/js/jquery-3.1.1.min.js"></script>
	<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
	<!-- Custom CSS -->
	<link href="{{  $adminUrl }}/css/style.css" rel='stylesheet' type='text/css' />
	<!-- Graph CSS -->
	<link href="{{  $adminUrl }}/css/font-awesome.css" rel="stylesheet"> 
	<!-- jQuery -->
	<link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css'/>
	<link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
	<!-- lined-icons -->
	<link rel="stylesheet" href="{{  $adminUrl }}/css/icon-font.min.css" type='text/css' />
	<!-- //lined-icons -->
	<link rel='stylesheet prefetch' href='http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css'>

	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
	<script type="text/javascript">
            function xacNhanXoa(){
                var x = confirm('Bạn có chắc muốn xóa');
                if(x){
                    return true;
                }else{
                    return false;
                }
            }
        </script>
	
</head> 
<body>
	<div class="page-container">
		<!--/content-inner-->
		<div class="left-content">
			<div class="inner-content">
				<!-- header-starts -->
				<div class="header-section">
					<!-- top_bg -->
					<div class="top_bg">

						<div class="header_top">
							<div class="top_right">
								<ul>
									<li><a href="{{ route('auth.auth.logout') }}">Logout</a></li>
								</ul>
							</div>
							<div class="top_left">
								<?php 
									
									$arUser = Auth::user();
									if(isset($arUser)){
								?>
								<h2>Chào,{{ $arUser->fullname }}</h2>
								<?php } ?>
							</div>
							<div class="clearfix"> </div>
						</div>

					</div>
					<div class="clearfix"></div>
					<!-- /top_bg -->
				</div>
				<div class="header_bg">

					<!-- <div class="header">
						<div class="head-t">
							<!-- start header_right -->
							<!-- <div class="header_right">
								<div class="search">
									<form>
										<input type="text" value="" placeholder="search...">
										<input type="submit" value="">
									</form>
								</div>
								<div class="clearfix"> </div>
							</div>
							<div class="clearfix"> </div>
						</div>
					</div> -->
					
				</div>