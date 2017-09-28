<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\GiayRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Giay;
use App\CTGiay;
use App\Hinh;
use App\Kieugiay;


class GiayController extends Controller
{
    public function index(){
    	$arItems = DB::table('sanpham')
		->join('kieugiay', 'kieugiay.id', '=', 'sanpham.id_kieu')
		->select('sanpham.*', 'kieugiay.tenkieu as tenkieu')
		->orderBy('id','DESC')
		->paginate(getenv('ROW_COUNT'));
        $arHA = Hinh::all();
		$arCat = Kieugiay::all();
    	return view('admin.giay.index',['arItems'=>$arItems,'arCat'=>$arCat, 'arHA' => $arHA]);
    }
     public function create(){
        $arCat = Kieugiay::all();
    	return view('admin.giay.create',['arCat'=>$arCat]);
    }
     public function store(GiayRequest $request){
        $arSP = array(
            'tensp' => trim($request->name),
            'mota' => trim($request->mota),
            'soluong' => $request->sl37 + $request->sl38 + $request->sl39 + $request->sl40 + $request->sl41,
            'gia' => trim($request->gia),
            'id_kieu' => $request->id_kieu
        );

        if(Giay::insert($arSP)){
            $id = Giay::select('id')->orderBy('id','desc')->take(1)->get();
            if($request->sl37 != 0){
                $arCTSP = array(
                    'masp' => $id[0]['id'],
                    'size' => 37,
                    'soluong' => $request->sl37
                );
                CTGiay::insert($arCTSP);
            }
            if($request->sl38 != 0){
                $arCTSP = array(
                    'masp' => $id[0]['id'],
                    'size' => 38,
                    'soluong' => $request->sl38
                );
                CTGiay::insert($arCTSP);
            }
            if($request->sl39 != 0){
                $arCTSP = array(
                    'masp' => $id[0]['id'],
                    'size' => 39,
                    'soluong' => $request->sl39
                );
                CTGiay::insert($arCTSP);
            }
            if($request->sl40 != 0){
                $arCTSP = array(
                    'masp' => $id[0]['id'],
                    'size' => 40,
                    'soluong' => $request->sl40
                );
                CTGiay::insert($arCTSP);
            }
            if($request->sl41 != 0){
                $arCTSP = array(
                    'masp' => $id[0]['id'],
                    'size' => 41,
                    'soluong' => $request->sl41
                );
                CTGiay::insert($arCTSP);
            }
            
            if($request->hinh[0] != ''){
                foreach($request->hinh as $item){
                    $path = $item->store('files');
                    $nameanh = explode("/", $path);
                    $nameanh = end($nameanh);
                    $arHinh = array(
                        'id_sp' => $id[0]['id'],
                        'name' => $nameanh,
                    );
                    Hinh::insert($arHinh);
                }
            }
            $request->session()->flash('msg','Thêm thành công');
            return redirect()->route('admin.giay.index');
        }else{
            $request->session()->flash('msg','Có lỗi khi thêm');
            return redirect()->route('admin.giay.index');
        }
    }
    public function edit($id){
        $arItem = Giay::find($id);
        $arCat = Kieugiay::all();
        $arSL = CTGiay::where('masp','=',$id)->get();
        $arHA = Hinh::all();
        return view('admin.giay.edit',['arItem' =>$arItem,'arCat'=>$arCat,'arSL'=>$arSL,'arHA'=>$arHA]);
    }
    public function update($id,GiayRequest $request){
        $arItem = Giay::find($id);
        $arItem->tensp = $request->name;
        $arItem->id_kieu = $request->id_kieu;
        $arItem->gia = $request->gia;
        $arItem->mota = $request->mota;

        if($request->hinh[0] != ''){
            $arHA = Hinh::where('id_sp','=',$id)->get();
            foreach($arHA as $item){
                if($item->name != ''){
                    Storage::delete('files/' . $item->name);
                }
                $arHA->delete();
            }
            foreach($request->hinh as $item){
                $path = $item->store('files');
                $nameanh = explode("/", $path);
                $nameanh = end($nameanh);
                $arHinh = array(
                    'id_sp' => $id,
                    'name' => $nameanh,
                );
                Hinh::insert($arHinh);
            }
        }
        
        if($arItem->update()){
            $request->session()->flash('msg','Sửa thành công');
            return redirect()->route('admin.giay.index');
        }else{
            $request->session()->flash('msg','Có lỗi khi sửa');
            return redirect()->route('admin.giay.index');
        }
    }
    public function destroy($id, Request $request){
        $arItem = Giay::find($id);
        $arH = Hinh::where('id_sp', '=' , $id)->get();
          foreach($arH as $arH){
            $picture = $arH->name;
            if($picture != ''){
                Storage::delete('files/' . $picture);
            }
            $arH->delete();
          }
          $arCTG = CTGiay::where('masp', '=' , $id)->get();
          foreach($arCTG as $arCTG){
            $arCTG->delete();
          }
        if($arItem->delete()){
            $request->session()->flash('msg','Xóa thành công');
            return redirect()->route('admin.giay.index');
        }else{
            $request->session()->flash('msg','Có lỗi khi xóa');
            return redirect()->route('admin.giay.index');
        }
    } 
}
