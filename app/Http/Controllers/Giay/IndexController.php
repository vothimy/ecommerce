<?php

namespace App\Http\Controllers\Giay;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Giay;
use App\Hinh;
use App\Kieugiay;


class IndexController extends Controller
{
    public function index(){
    	$arItems = Giay::orderBy('id','DESC')
		->paginate(16); 
        $arHA = Hinh::all();
    	return View('giay.index.index',['arItems'=>$arItems,'arHA'=>$arHA]);
    }
    public function search(Request $request){
        $name = $request->name;
        $arItems = Giay::where('mota','LIKE',"%$name%")->where('tensp','LIKE',"%$name%")
        ->get();
        $i = 0;
        foreach ($arItems as $item) {
            $i ++;
        }
        if($i == 0){
            $request->session()->flash('msg','không có kết quả tìm kiếm');
            return redirect()->route('public.index.index');
        }
        $arHA = Hinh::all();
        return View('giay.index.search',['arItems'=>$arItems,'arHA'=>$arHA,'i'=>$i]);
    }
    public function ajax(Request $request){
        $read = $request->opti;
        if($read == 2){
        	$arItems = Giay::orderBy('read','DESC')		
        	->paginate(16);
	        $arHA = Hinh::all();
	        // return view('public.index.index',['arItems'=>$arItems,'arHA'=>$arHA]);
	        return response()->json(['arItems' => $arItems, 'arHA' => $arHA]);
        }
        
    }
}
