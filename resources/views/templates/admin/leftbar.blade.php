<div class="sidebar-menu">
	<header class="logo1">
		<a href="/"  style="color:#fff;font-size: 30px;padding-left: 30px;">ADMINCP</a> 
	</header>
	<div style="border-top:1px ridge rgba(255, 255, 255, 0.15)"></div>
	<div class="menu">
		<ul id="menu" >
			<li><a href="{{ route('admin.loaigiay.index') }}"><i class="fa fa-tachometer"></i> <span>Quản lý loại giày</span></a></li>
			<li id="menu-academico" ><a href="{{ route('admin.kieugiay.index') }}"><i class="fa fa-table"></i> <span> Quản lý kiểu giày</span></span></a>
				
			</li>
			<li id="menu-academico" ><a href="{{ route('admin.giay.index') }}"><i class="fa fa-file-text-o"></i> <span>Quản lý giày</span></a></li>
			<li><a href="{{ route('admin.user.index') }}"><i class="lnr lnr-pencil"></i> <span>Quản lý user</span></a></li>
			<li><a href="{{ route('admin.dh.index') }}"><i class="lnr lnr-book"></i> <span>Quản lý đơn hàng</span></a></li>
			<li><a href="{{ route('admin.pttt.index') }}"><i class="fa fa-file-text-o"></i> <span>Phương thức thanh toán</span></a></li>
			<!-- <li><a href="#"><i class="lnr lnr-envelope"></i> <span>Quản lý khách hàng</span></a></li>
			<li><a href="#"><i class="lnr lnr-chart-bars"></i> <span>Quản lý khách hàng</span></a></li> -->
		</ul>
	</div>
</div>
<div class="clearfix"></div>		
</div>