<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\HTRequest;
use App\Http\Controllers\Controller;
// use Illuminate\Support\Facades\DB;
use App\HTTT;

class HTTTController extends Controller
{
    public function index(){
    	$arItems = HTTT::all();
    	return view('admin.pttt.index',['arItems'=>$arItems]);
    }
    public function create(){
    	$arCat = HTTT::all();
        return view('admin.pttt.create',['arCat'=>$arCat]);
    }
    public function store(HTRequest $request){
        $arCats = HTTT::all();
       
        $arItem = array(
            'name' => trim($request->name),
        );
        if(HTTT::insert($arItem)){
            $request->session()->flash('msg','Thêm thành công');
            return redirect()->route('admin.pttt.index');
        }else{
            $request->session()->flash('msg','Có lỗi khi thêm');
            return redirect()->route('admin.pttt.index');
        }
    }
    public function edit($id){
    	$arItem = HTTT::find($id);
    	return view('admin.pttt.edit',['arItem'=>$arItem]);
    }
    public function update($id,HTRequest $request){
        $name = $request->name;
        $arItem = HTTT::find($id);
        $arItem->name = $name;
        if($arItem->update()){
            $request->session()->flash('msg','Sửa thành công');
            return redirect()->route('admin.pttt.index');
        }else{
            $request->session()->flash('msg','Có lỗi khi sửa');
            return redirect()->route('admin.pttt.index');
        }
    }
     public function destroy($id, Request $request){
        $arItem = HTTT::find($id);
        
        if($arItem->delete()){
            $request->session()->flash('msg','Xóa thành công');
            return redirect()->route('admin.pttt.index');
        }else{
            $request->session()->flash('msg','Có lỗi khi xóa');
            return redirect()->route('admin.pttt.index');
        }
    } 
}
