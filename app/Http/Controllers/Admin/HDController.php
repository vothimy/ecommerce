<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\DH;
use App\CTDH;

class HDController extends Controller
{
    public function index(){
    	$arItems = DB::table('donhang')
    	->join('users','donhang.id_kh','users.id')
		->select('donhang.*','users.fullname as fullname')
		//->orderBy('id','DESC')
		->paginate(getenv('ROW_COUNT')); 
        $arCT = DB::table('ctdonhang')
        ->join('sanpham','ctdonhang.id_sp','sanpham.id')
        ->select('ctdonhang.*','sanpham.tensp as tensp')
        ->get(); 
    	return view('admin.dh.index',['arItems'=>$arItems,'arCT'=>$arCT]);
    }
    //  public function detail($id_dh){
    //     $arItems = DH::find($id_dh);
    //     $arCT = DB::table('ctdonhang')
    //     ->join('sanpham','ctdonhang.id_sp','sanpham.id')
    //     ->select('ctdonhang.*','sanpham.tensp as tensp')
    //     ->where('id_dh','=',$id_dh)
    //     ->get(); 
    //     return view('admin.dh.index',['arItems'=>$arItems,'arCT'=>$arCT]);
    // }
    public function destroy($id,Request $request){
        $arItem = DH::find($id);
        $arCT = CTDH::where('id_dh','=',$id)->get();
        foreach ($arCT as $arct) {
            $arct->delete();
        }
        if($arItem->delete()){
            $request->session()->flash('msg','Xóa thành công');
            return redirect()->route('admin.dh.index');
        }else{
            $request->session()->flash('msg','Có lỗi khi xóa');
            return redirect()->route('admin.dh.index');
        }
    }
    public function ajax1(Request $request){
    	$id = $request->aid;
    	$arItem = DH::find($id);
    	if($arItem->TTGH == 0){
    		$arItem->TTGH = 1;
    	}else{
    		$arItem->TTGH = 0;
    	}
    	$arItem->update();
    	return response()->json($arItem);
    }
    public function ajax2(Request $request){
        $id = $request->aid;
        $arItem = DH::find($id);
        if($arItem->TTTT == 0){
            $arItem->TTTT = 1;
        }else{
            $arItem->TTTT = 0;
        }
        $arItem->update();
        return response()->json($arItem);
    }
}
