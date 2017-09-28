<?php 

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Http\Requests\UserEditRequest;
use Illuminate\Support\Facades\Auth;
use App\User;

class UserController extends Controller
{
	public function index(){
		$arItems = User::all();
		return view('admin.user.index',['arItems' => $arItems]);
	}
	public function create(){
		return view('admin.user.create');
	}
	public function store(UserRequest $request){
		$arItem = array(
			'username' => trim($request->username),
			'password' => bcrypt(trim($request->password)),
			'fullname' => $request->fullname,
			'email' => $request->email,
			'address' => $request->address,
			'pq' => 1
			);
		if(User::insert($arItem)){
			$request->session()->flash('msg','Thêm thành công');
			return redirect()->route('public.giay.index');
		}else{
			$request->session()->flash('msg','Có lỗi khi thêm');
			return redirect()->route('admin.user.index');
		}
	}
	public function destroy($id, Request $request){
		$arItem = User::find($id);
		if($arItem->id == 1){
			$request->session()->flash('msg','Bạn không thể xóa admin');
			return redirect()->route('admin.user.index');
		}
		if($arItem->delete()){
			$request->session()->flash('msg','Xóa thành công');
			return redirect()->route('admin.user.index');
		}else{
			$request->session()->flash('msg','Có lỗi khi xóa');
			return redirect()->route('admin.user.index');
		}
		
	}
	public function edit($id){
		$arItem = User::find($id);
		return view('admin.user.edit',['arItem' =>$arItem]);
	}
	public function update($id,UserEditRequest $request){
		$arItem = User::find($id);
		$arUser = Auth::user();
		if($arItem->username != $arUser->username && $arUser->username != 'admin'){
			$request->session()->flash('msg','Bạn không thể sửa thông tin của người khác');
			return redirect()->route('admin.user.index');
		}
		$password = $request->password;
		$fullname = $request->fullname;
		$arItem->fullname = $fullname;
		if($password != ''){
			$password = bcrypt(trim($request->password));
			$arItem->password = $password;
		}
		if($arItem->update()){
			$request->session()->flash('msg','Sửa thành công');
			return redirect()->route('admin.user.index');
		}else{
			$request->session()->flash('msg','Có lỗi khi sửa');
			return redirect()->route('admin.user.index');
		}
	}
}
