<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\KieuRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Kieugiay;
use App\Loaigiay;

class KieuGiayController extends Controller
{
    public function index(){
    	$arItems = DB::table('kieugiay')
		->join('loaisp', 'kieugiay.id_loai', '=', 'loaisp.id')
		->select('kieugiay.*', 'loaisp.tenloai as tenloai')
		->orderBy('id','DESC')
		->paginate(getenv('ROW_COUNT'));
		$arCat = Loaigiay::all();
    	return view('admin.kieugiay.index',['arItems'=>$arItems]);
    }
    public function create(){
    	$arCat = Loaigiay::all();
        return view('admin.kieugiay.create',['arCat'=>$arCat]);
    }
    public function store(KieuRequest $request){
        $arCats = Kieugiay::all();
       
        $arItem = array(
            'tenkieu' => trim($request->name),
            'id_loai' => trim($request->id_loai),
        );
        if(Kieugiay::insert($arItem)){
            $request->session()->flash('msg','Thêm thành công');
            return redirect()->route('admin.kieugiay.index');
        }else{
            $request->session()->flash('msg','Có lỗi khi thêm');
            return redirect()->route('admin.kieugiay.index');
        }
    }
    public function edit($id){
    	$arItem = Kieugiay::find($id);
    	$arCat = Loaigiay::all();
    	return view('admin.kieugiay.edit',['arItem'=>$arItem,'arCat'=>$arCat]);
    }
    public function update($id,KieuRequest $request){
        $name = $request->name;
        $id_loai = $request->id_loai;
        $arItem = Kieugiay::find($id);
        $arItem->tenkieu = $name;
        $arItem->id_loai = $id_loai;
        if($arItem->update()){
            $request->session()->flash('msg','Sửa thành công');
            return redirect()->route('admin.kieugiay.index');
        }else{
            $request->session()->flash('msg','Có lỗi khi sửa');
            return redirect()->route('admin.kieugiay.index');
        }
    }
     public function destroy($id, Request $request){
        $arItem = Kieugiay::find($id);
        
        if($arItem->delete()){
            $request->session()->flash('msg','Xóa thành công');
            return redirect()->route('admin.kieugiay.index');
        }else{
            $request->session()->flash('msg','Có lỗi khi xóa');
            return redirect()->route('admin.kieugiay.index');
        }
    } 
}
