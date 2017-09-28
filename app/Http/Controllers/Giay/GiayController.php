<?php

namespace App\Http\Controllers\Giay;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\DKRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Cart;
use App\Giay;
use App\Hinh;
use App\CTGiay;
use App\DH;
use App\CTDH;
use App\HTTT;
use App\User;
use App\Kieugiay;

class GiayController extends Controller
{

    public function chitiet($slug,$id){
        $arDetail = Giay::find($id); 
        $arH = Hinh::where('id_sp','=',$id)->get();
        $arSL = CTGiay::where('masp','=',$id)->get();
        $arHA = Hinh::all();
        $title = $arDetail->tensp;
        $read1 = $arDetail->read1;
        $arDetail->read1 = $read1 + 1;
        $arDetail->update();
        $arDetail2 = Giay::where('id' , '<>' , $id)->orderBy('id','DESC')->LIMIT(8)->get();
        return View('giay.giay.chitiet',['arDetail' => $arDetail,'arDetail2'=>$arDetail2,'title'=>$title,'arH'=>$arH,'arSL'=>$arSL,'arHA'=>$arHA]);
    }
    public function danhmuc($slug,$id){
        $arItems = Giay::where('id_kieu' , '=' , $id)->paginate(3);
        $arHA = Hinh::all();
        $arKieu = Kieugiay::find($id);
        $title = $arKieu->tenkieu;
        return View('giay.giay.danhmuc',['arItems' => $arItems,'arHA' => $arHA  ,'title'=>$title]);
    }
 //thêm sp vào giỏ   
public function addCart(Request $request){
    $id = $request->id;
    $size = $request->size;
    $product_buy = DB::table('sanpham')
    ->where('id','=',$id)->first();
    $arHA = Hinh::where('id_sp','=',$id)->get();
    $cart = Cart::add(array('id'=>$id,'name'=>$product_buy->tensp,'qty'=>1,'price'=>$product_buy->gia,'options'=>array('img'=>$arHA[0]->name,'size'=>$size)));
    return response()->json(['qty' => Cart::count()]);
}
//show giỏ hàng
public function giohang(){
    $arItems = Giay::orderBy('id','DESC')
    ->paginate(16);
    $arHA = Hinh::all();
    $content = Cart::content();
    return view('giay.giay.giohang',['content'=>$content,'arItems'=>$arItems,'arHA'=>$arHA]);
}
//đăng kí thành viên

public function register(Request $request){
    $arUser = User::all();
    foreach ($arUser as $aruser) {
        if($aruser->username == $request->username){
            // $request->session()->flash('msg','Xóa thành công');
            return redirect()->back()->with($request->session()->flash('msg','Tên username đã sử dụng!'));
        }
    }
    $arItem = array(
        'username' => trim($request->username),
        'password' => bcrypt(trim($request->password1)),
        'fullname' => $request->fullname,
        'email' => $request->email,
        'address' => $request->address,
        'phone' => $request->phone,
        'pq' => 2
        );
    if(User::insert($arItem)){
        
        if (Auth::attempt(['username' => $request->username, 'password' => $request->password1,'pq' => 2])) {
            return redirect()->back()->with($request->session()->flash('msg','Đăng kí thành công!'));
        }
    }else{
       return redirect()->back()->with($request->session()->flash('msg','Đăng kí không thành công!'));
    }

}
//xóa 1 sp
public function xoa(Request $request){
    if($request->ajax()){
        $id = $request->id;
        $cart = Cart::remove($id);
        return response()->json(['total' => Cart::total(0),'qty' => Cart::count()]);
    }    
}
//xóa cả giỏ
public function delall(){
    Cart::destroy();
    return response()->json(['total' => Cart::total(0),'qty' => Cart::count()]);
}
//cập nhật số lượng
public function update(Request $request){
    if($request->ajax()){
        $id = $request->id;
        $qty = $request->qty;
        $cart = Cart::update($id,$qty);
        return response()->json(['total' => Cart::total(0),'subtotal' => $cart->subtotal(0),'qty' => Cart::count()]);
    }
}
//loginmember
public function loginmember(Request $request){
    $username = trim($request->username);
    $password = trim($request->password);

    if (Auth::attempt(['username' => $username, 'password' => $password,'pq' => 2])) {
        return redirect()->route('public.giay.ordercustomer');
    }else{//đn sai
        return redirect()->back()->with($request->session()->flash('msg','Đăng nhập sai!'));
    } 
}
//input form khách không có tài khoản
public function getordercustomer(){
    $arHTTT = HTTT::all();
    return view('giay.giay.ordercustomer',['arHTTT' => $arHTTT]);
}
public function postordercustomer(Request $request){
    
    if(Auth::check()){
        $arUser = Auth::user();
        $arItems = array(
            'id_kh' => $arUser->id,
            'tenkh' => $request->fullname,
            'noigiao' => $request->address,
            'email' => $request->email,
            'ghichu' => $request->notes,
            'hinhthuc' => $request->httt,
            'phone' => $request->phone,
            'TTTT' => 0,
            'TTGH' => 0
        );
    }else{
        $arItems = array(
            'id_kh' => 0,
            'tenkh' => $request->fullname,
            'noigiao' => $request->address,
            'email' => $request->email,
            'ghichu' => $request->notes,
            'hinhthuc' => $request->httt,
            'phone' => $request->phone,
            'TTTT' => 0,
            'TTGH' => 0
        );
    }
    DH::insert($arItems);
    $did = DH::select('id')->orderBy('id','desc')->take(1)->get();//chính là nó
    $madh = $did[0]['id'];
    $content=Cart::content();
    foreach ($content as $value) {
        $arCart=array(
            'id_dh'=>$madh,
            'id_sp'=>$value->id,
            'soluong'=>$value->qty,
            'gia'=>$value->price,
            'size'=>$value->options->size
        );
        CTDH::insert($arCart);
        //trừ số lượng
        $id = $value->id;
        $ctgiay = CTGiay::where('masp','=',$id)->where('size','=',$value->options->size)->get(); //lấy sp trong chi tiết
        $id = $ctgiay[0]->id;//lấy id trong record đó
        $arCT = CTGiay::find($id);// để update
        $sl = $ctgiay[0]->soluong;//gán sl
        $sl =  $sl - $value->qty;//trừ số lượng trong bảng chi tiết
        $arCT->soluong = $sl;//gán vào mảng
        $arCT->update();//update
        $arSP = Giay::find($value->id);//lấy record trong bảng sp

        $arSP->soluong = $arSP->soluong - $value->qty;
        $arSP->update();//update
    }
    return redirect()->route('public.giay.order',['id'=>$madh]);
}
//hóa đơn
public function order($id){
    $arItems = DH::find($id);
    $arTT = CTDH::where('id_dh','=',$id)->get();
    $tt = 0;
    foreach ($arTT as $artt) {
        $tt = $tt + $artt->gia;
    }
    Cart::destroy();
    return view('giay.giay.order',['arItems'=>$arItems,'tt'=>$tt]);
}
public function cancel($id,Request $request){
    $arItems = DH::find($id);
    $arCT = CTDH::where('id_dh','=',$id)->get();
    foreach ($arCT as $arct) {
        $arct->delete();
    }
    if($arItems->delete()){
        return redirect()->route('public.index.index')->with($request->session()->flash('msg','Hủy thành công!'));
   }
   // return redirect()->route('public.index.index')->with($request->session()->flash('msg','Hủy thành công!'));
}
//đăng nhập

public function dangnhap(Request $request){

    $username = trim($request->username);
    $password = trim($request->password);

    if (Auth::attempt(['username' => $username, 'password' => $password,'pq' => 2])) {
        return redirect()->back()->with($request->session()->flash('msg','Đăng nhập thành công!'));
    }else{//đn sai
        return redirect()->back()->with($request->session()->flash('msg','Đăng nhập sai!'));
    } 
}
//đăng xuất 
public function logout(){
    Auth::logout();
    return redirect()->route('public.index.index');
}

}