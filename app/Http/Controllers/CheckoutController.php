<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Http\Requests;
use App\User;
use Exception;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Foundation\Console\Presets\React;

session_start();

class CheckoutController extends Controller
{
    public function payment(Request $request){
        //insert order
      
            //insert order
            $data_order = array();
            $data_order['manguoidung'] = Session::get('user')->manguoidung;
            $data_order['nguoinhan'] = $request->name;
            $data_order['sodienthoai'] = $request->phone;
            $data_order['diachi'] = $request->address;
            $data_order['tongtien'] = Cart::subtotal()." d";
            $data_order['matrangthaidonhang'] = 0;
            $orderid = Db::table('donhang')->insertGetId($data_order);
            
          
            //insert order details
    
            $data = array();
            $content = Cart::content();
            foreach($content as $v_content){
                $data['madonhang'] = $orderid;
                $data['masanpham'] = $v_content->id;
                $data['tongtien'] = $v_content->price;
                $data['soluongdat'] = $v_content->qty;
                Db::table('chitietdonhang')->insert($data);
                $product_id = $v_content->id;
                $kho = DB::table('sanpham')
                ->where('masanpham','=',$product_id)->get();
                $data2 = array();
                foreach($kho as $cc){
                $soluongcon = $cc->soluong - $v_content->qty;
                    $data2['tensanpham'] =  $cc->tensanpham;
                    $data2['mota'] = $cc->mota;
                    $data2['soluong']=$soluongcon;
                    $data2['gia'] = $cc->gia;
                    $data2['madanhmuc'] = $cc->madanhmuc;
                    $data2['maloai'] = $cc->maloai;
                    DB::table('sanpham')->where('masanpham', $product_id)->update($data2);
                    Session::put('message', 'cập nhật số lượng thành công');
               
                }
    
            }
            Cart::destroy();
            return view('pages.cart.checkout_complete');
    

        

    


        

     

    }
}
