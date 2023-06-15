<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Http\Requests;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Foundation\Console\Presets\React;
use Illuminate\Support\Facades\Redirect;
use App\User;
use App\Product;
session_start();
use Exception;





class CartController extends Controller
{
    public function save_cart(Request $request){
        //$cate_product = DB::table('categories')->get(); 
        //$all_product = DB::table('books')->get();
        
        $productid = $request->product_id_hidden;
        $qty = $request->qty;

        $product_info  = DB::table('sanpham')->where('masanpham',$productid)->first();
        $data['masanpham'] = $product_info ->masanpham;
        $data['tensanpham'] = $product_info ->tensanpham;
        $data['gia'] = $product_info ->gia;
        $data['options']['image'] = $product_info ->anhurl;
        $data['soluong'] = $qty;
        Cart::add($data);

        return Redirect::to('/show-cart');
    }
    public function show_cart(){
        $cate_product = DB::table('danhmuc')->get();
        $sub_cate = DB::table('danhmuc')->get();
        return view('pages.cart.show_cart')->with('danhmuc',$cate_product)->with('sub_cate',$sub_cate);
    }
    public function delete_to_cart($rowId){
        Cart::update($rowId,0);
        return Redirect::to('/show-cart');
    }

    public function update_cart_quantity(Request $request){
        $rowId = $request->rowid;
        $qty = $request->cart_quantity;

        
        Cart::update($rowId,$qty);
          
        return Redirect::to('/show-cart');
        
    }

    
    public function login_cart(Request $request) {
        $email = $request -> email;
        $password = $request -> password;
        if(Auth::attempt(['email'=>$email, 'password'=>$password])) {
            Session::put('user', Auth::user());
        } 
        return Redirect::to('/show-cart'); 
    }
    public function signin_cart(Request $request) {
        try {
            User::create([
                'hoten' => $request -> hoten,
                'email' => $request -> email,
                'sodienthoai' => $request -> sodienthoai,
                'password' =>bcrypt($request -> password) 
                ]);
        } catch(Exception $e) {

        }   
        if(Auth::attempt(['email'=>$request -> email, 'password'=>$request -> password])) {
            Session::put('user', Auth::user());
        }  
        return Redirect::to('/show-cart'); 
    }
}
