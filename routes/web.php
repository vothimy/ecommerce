<?php
Route::pattern('slug','(.*)');
Route::pattern('id','[0-9]*');
//group public
Route::group(['namespace'=>'Giay'],
	function(){
	Route::get('/', [
		'uses' => 'IndexController@index',
		'as'   => 'public.index.index'
	]);
	Route::get('{slug}-{id}.html', [
		'uses' => 'GiayController@chitiet',
		'as'   => 'public.giay.chitiet'
	]);
	Route::get('danh-muc/{slug}-{id}', [
		'uses' => 'GiayController@danhmuc',
		'as'   => 'public.giay.danhmuc'
	]);
	//thêm sp vào giỏ hàng
	Route::get('addCart', [
		'uses' => 'GiayController@addCart',
		'as'   => 'public.giay.addCart'
	]);
	//show giỏ hàng
	Route::get('cart', [
		'uses' => 'GiayController@giohang',
		'as'   => 'public.giay.giohang'
	]); 
	//update sl
	Route::get('update', [
		'uses' => 'GiayController@update',
		'as'   => 'public.giay.update'
	]);
	//xóa sp
	Route::get('xoa', [
		'uses' => 'GiayController@xoa',
		'as'   => 'public.giay.xoa'
	]);
	//xóa cả giỏ
	Route::get('delall', [
		'uses' => 'GiayController@delall',
		'as'   => 'public.giay.delall'
	]);
	//form điền of kh
	Route::get('ordercustomer', [
		'uses' => 'GiayController@getordercustomer',
		'as'   => 'public.giay.ordercustomer'
	]);
	Route::post('ordercustomer', [
		'uses' => 'GiayController@postordercustomer',
		'as'   => 'public.giay.ordercustomer'
	]);
	//loginmember
	Route::post('loginmember', [
		'uses' => 'GiayController@loginmember',
		'as'   => 'public.giay.loginmember'
	]);
	
	Route::post('register', [
		'uses' => 'GiayController@register',
		'as'   => 'public.giay.register'
	]);
	
	Route::post('login-member', [
		'uses' => 'GiayController@dangnhap',
		'as'   => 'public.giay.dangnhap'
	]);
	Route::get('logout-member', [
		'uses' => 'GiayController@logout',
		'as'   => 'public.giay.logout'
	]);
	Route::get('order/{id}', [
		'uses' => 'GiayController@order',
		'as'   => 'public.giay.order'
	]);
	Route::get('cancel/{id}', [
		'uses' => 'GiayController@cancel',
		'as'   => 'public.giay.cancel'
	]);
	Route::post('ajax', [
		'uses' => 'GiayController@ajax',
		'as'   => 'public.index.ajax'
	]);
	// Route::get('ajax1', [
	// 	'uses' => 'IndexController@ajax',
	// 	'as'   => 'public.index.ajax'
	// ]);
	// Route::get('ajax', [
	// 	'uses' => 'Giay\GiayController@ajax',
	// 	'as'   => 'public.giay.ajax'
	// ]);
});


//admin
Route::group(['namespace'=>'Admin','prefix' => 'admincp','middleware' => 'auth'],
	function(){
	Route::get('', [
		'uses' => 'IndexController@index',
		'as'   => 'admin.index.index'
	]);
	//cat group, chỗ nớ mod đâu vô dc, hiểu hông, ai biết, em làm chơ a biết mô, 
	Route::group(['prefix' => 'loaigiay','middleware' => 'role:3'],
		function(){
		//index
		Route::get('',[
			'uses' => 'LoaiGiayController@index',
			'as' => 'admin.loaigiay.index'
		]);
		Route::get('add',[
			'uses' => 'LoaiGiayController@create',
			'as' => 'admin.loaigiay.create'
		]);
		Route::post('add',[
			'uses' => 'LoaiGiayController@store',
			'as' => 'admin.loaigiay.store'
		]);

		//del
		Route::get('del/{id}',[
			'uses' => 'LoaiGiayController@destroy',
			'as' => 'admin.loaigiay.destroy'
		]);
		//edit
		Route::get('edit/{id}',[
			'uses' => 'LoaiGiayController@edit',
			'as' => 'admin.loaigiay.edit'
		]);
		Route::post('edit/{id}',[
			'uses' => 'LoaiGiayController@update',
			'as' => 'admin.loaigiay.edit'
		]);
	});
	//kieugiay
	Route::group(['prefix' => 'kieugiay','middleware' => 'role:3|1'],
		function(){
		//index
		Route::get('',[
			'uses' => 'KieuGiayController@index',
			'as' => 'admin.kieugiay.index'
		]);
		Route::get('add',[
			'uses' => 'KieuGiayController@create',
			'as' => 'admin.kieugiay.create'
		]);
		Route::post('add',[
			'uses' => 'KieuGiayController@store',
			'as' => 'admin.kieugiay.store'
		]);

		//del
		Route::get('del/{id}',[
			'uses' => 'KieuGiayController@destroy',
			'as' => 'admin.kieugiay.destroy'
		]);
		//edit
		Route::get('edit/{id}',[
			'uses' => 'KieuGiayController@edit',
			'as' => 'admin.kieugiay.edit'
		]);
		Route::post('edit/{id}',[
			'uses' => 'KieuGiayController@update',
			'as' => 'admin.kieugiay.update'
		]);
	});

	//group giay
	Route::group(['prefix' => 'giay','middleware' => 'role:3|1'],
		function(){
		//index
		Route::get('',[
			'uses' => 'GiayController@index',
			'as' => 'admin.giay.index'
		]);
		Route::get('add',[
			'uses' => 'GiayController@create',
			'as' => 'admin.giay.create'
		]);
		Route::post('add',[
			'uses' => 'GiayController@store',
			'as' => 'admin.giay.store'
		]);

		//del
		Route::get('del/{id}',[
			'uses' => 'GiayController@destroy',
			'as' => 'admin.giay.destroy'
		]);
		//edit
		Route::get('edit/{id}',[
			'uses' => 'GiayController@edit',
			'as' => 'admin.giay.edit'
		]);
		Route::post('edit/{id}',[
			'uses' => 'GiayController@update',
			'as' => 'admin.giay.update'
		]);
	});
	//group user
	Route::group(['prefix'=>'users','middleware' => 'role:3|1'],
		function(){
		//index
		Route::get('',[
			'uses' => 'UserController@index',
			'as' => 'admin.user.index'
		]); 
		//add
		Route::get('add',[
			'uses' => 'UserController@create',
			'as' => 'admin.user.create'
		]);
		Route::post('add',[
			'uses' => 'UserController@store',
			'as' => 'admin.user.store'
		]);

		//del
		Route::get('del/{id}',[
			'uses' => 'UserController@destroy',
			'as' => 'admin.user.destroy'
		]);
		//edit
		Route::get('edit/{id}',[
			'uses' => 'UserController@edit',
			'as' => 'admin.user.edit'
		]);
		Route::post('edit/{id}',[
			'uses' => 'UserController@update',
			'as' => 'admin.user.edit'
		]);
		
	});
	//  dh group
	Route::group(['prefix'=>'donhang','middleware' => 'role:3|1'],
		function(){
		//index
		Route::get('',[
			'uses' => 'HDController@index',
			'as' => 'admin.dh.index'
		]);
		Route::get('detail/{$id}',[
			'uses' => 'HDController@detail',
			'as' => 'admin.dh.detail'
		]);
		//add
		Route::get('add',[
			'uses' => 'HDController@create',
			'as' => 'admin.dh.create'
		]);
		Route::post('add',[
			'uses' => 'HDController@store',
			'as' => 'admin.dh.store'
		]);

		//del
		Route::get('del/{id}',[
			'uses' => 'HDController@destroy',
			'as' => 'admin.dh.destroy'
		]);
		//edit
		
		Route::get('ajax1',[
			'uses' => 'HDController@ajax1',
			'as' => 'admin.dh.ajax1'
		]);
		Route::get('ajax2',[
			'uses' => 'HDController@ajax2',
			'as' => 'admin.dh.ajax2'
		]);
		
	});
	//pttt
	Route::group(['prefix'=>'phuong-thuc-thanh-toan','middleware' => 'role:3|1'],
		function(){
		//index
		Route::get('',[
			'uses' => 'HTTTController@index',
			'as' => 'admin.pttt.index'
		]); 
		//add
		Route::get('add',[
			'uses' => 'HTTTController@create',
			'as' => 'admin.pttt.create'
		]);
		Route::post('add',[
			'uses' => 'HTTTController@store',
			'as' => 'admin.pttt.store'
		]);

		//del
		Route::get('del/{id}',[
			'uses' => 'HTTTController@destroy',
			'as' => 'admin.pttt.destroy'
		]);
		//edit
		Route::get('edit/{id}',[
			'uses' => 'HTTTController@edit',
			'as' => 'admin.pttt.edit'
		]);
		Route::post('edit/{id}',[
			'uses' => 'HTTTController@update',
			'as' => 'admin.pttt.edit'
		]);
		
	});
	

});

Route::group(['namespace'=>'Auth'],
	function(){
		Route::get('login', [
			'uses' => 'AuthController@getLogin',
			'as'   => 'auth.auth.login'
		]);
		Route::post('login', [
			'uses' => 'AuthController@postLogin',
			'as'   => 'auth.auth.login'
		]);
		Route::get('logout', [
			'uses' => 'AuthController@logout',
			'as'   => 'auth.auth.logout'
		]);

});
Route::post('search', [
	'uses' => 'Giay\IndexController@search',
	'as'   => 'public.index.search'
]);
Route::get('noaccess',function(){
	return "Bạn không có quyền truy cập trang này";
});