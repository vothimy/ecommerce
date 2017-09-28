//cập nhật đơn hàng
$(document).ready(function(){
	$(".updatecart").click(function(){
		var rowid = $(this).attr('id');
		var qty = $('#qty'+rowid).val();
		alert('Số lượng sản phẩm bạn mua là '+qty);
		// var size = $('#size').val();
		// alert(size);
		// var urlcart = 'cart';
		$.ajax({
			url:'update',
			type:'get',
			data:{'id':rowid,'qty':qty},
			success:function(data){
				console.log(data);
				$('#tien'+rowid).text(data.subtotal +' đ');
				$('#totalCart').text(data.total +' đ');
				$("#qtyCart").text(data.qty);
				$("#countCart").text(data.qty);
				// location.reload();
			}
		});
	});
});
//xóa đơn hàng
$(document).ready(function(){
	$(".delete").click(function(){
		var rowid = $(this).attr('id');
		var del = confirm('Bạn có muốn xóa sản phẩm này không?');
		if(del){
			$.ajax({
				url:'xoa',
				type:'get',
				data:{'id':rowid},
				success:function(data){
					$('.sp'+rowid).remove();
					console.log(data);
					$('#totalCart').text(data.total+' đ');
					$("#qtyCart").text(data.qty);
					$("#countCart").text(data.qty );
				}
			});
		}else{
			return false;
		}
		
	});
});
//xóa tất cả giỏ hàng
$(document).ready(function(){
	$(".del-all").click(function(){
		var rowid = $(this).attr('id');
		var delall = confirm('Bạn có muốn xóa giỏ hàng này không?');
		if(delall){
			$.ajax({
				url:'delall',
				type:'get',
				data:{},
				success:function(data){
					$('.cart-header3').remove();
					console.log(data);
					$('#totalCart').text(data.total+' đ');
					$("#qtyCart").text(data.qty);
					$("#countCart").text(data.qty );
				}
			});
		}else{
			return false;
		}
		
	});
});
//thêm sản phẩm vào giỏ

$(document).ready(function(){
	$(".addcart").click(function(){
		var id = $(this).attr('id');
		var size = $("#bigcat").val();
		var addcart = confirm('Bạn có muốn thêm vào giỏ hàng sản phẩm này không?');
		if(addcart){
			$.ajax({
				url:'addCart',
				type:'get',
				data:{'id':id, 'size':size},
				success:function(data){
					console.log(data);
					$("#qtyCart").text(data.qty);
					alert('Thêm thành công!');
				}
			});
		}else{
			return false;
		}
		
	});
});

//kiểm tra sl sp có trong kho
$(document).ready(function(){
	$(".check-qty").click(function(){
		var id = $(this).attr('id');
		var size = $("#bigcat").val();
		var addcart = confirm('Bạn có muốn thêm vào giỏ hàng sản phẩm này không?');
		if(addcart){
			$.ajax({
				url:'addCart',
				type:'get',
				data:{'id':id, 'size':size},
				success:function(data){
					alert('Thêm thành công!');
					console.log(data);
					$("#qtyCart").text(data.qty);
				}
			});
		}else{
			return false;
		}
		
	});
});