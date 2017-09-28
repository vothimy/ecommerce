<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\LoaiRequest;
use App\Http\Controllers\Controller;
use App\Loaigiay;

class LoaiGiayController extends Controller
{
    public function index(){
    	$arItems = Loaigiay::orderBy('id','DESC')->paginate(getenv('ROW_COUNT'));
    	return view('admin.loaigiay.index',['arItems'=>$arItems]);
    }
    public function create(){
        return view('admin.loaigiay.create');
    }
    public function store(LoaiRequest $request){
        $arCats = Loaigiay::all();
       foreach($arCats as $arCats){
          if($arCats->tenloai == $request->name){
            $request->session()->flash('msg','Tên danh mục đã có');
            return redirect()->route('admin.loaigiay.index');
          }
       }
        $arItem = array(
            'tenloai' => trim($request->name),
        );
        if(Loaigiay::insert($arItem)){
            $request->session()->flash('msg','Thêm thành công');
            return redirect()->route('admin.loaigiay.index');
        }else{
            $request->session()->flash('msg','Có lỗi khi thêm');
            return redirect()->route('admin.loaigiay.index');
        }
    }
    public function edit($id){
    	$arItem = Loaigiay::find($id);
    	return view('admin.loaigiay.edit',['arItem'=>$arItem]);
    }
    public function update($id,LoaiRequest $request){
        $name = $request->name;
        $arItem = Loaigiay::find($id);
        $arItem->tenloai = $name;
        if($arItem->update()){
            $request->session()->flash('msg','Sửa thành công');
            return redirect()->route('admin.loaigiay.index');
        }else{
            $request->session()->flash('msg','Có lỗi khi sửa');
            return redirect()->route('admin.loaigiay.index');
        }
    }
    public function destroy($id, Request $request){
        $arItem = Loaigiay::find($id);
        
        if($arItem->delete()){
            $request->session()->flash('msg','Xóa thành công');
            return redirect()->route('admin.loaigiay.index');
        }else{
            $request->session()->flash('msg','Có lỗi khi xóa');
            return redirect()->route('admin.loaigiay.index');
        }
    } 
}
