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
use Symfony\Component\Console\Output\Output;
Use App\Http\Controllers\alert;
session_start();

class ProfileController extends Controller
{
    public function show_profile(){
        $userid = Session::get('user')->manguoidung;
        $ordered = DB::table('donhang')->where('manguoidung',$userid)->orderBy('madonhang', 'DESC')->get(); 
        $cate_product = DB::table('danhmuc')->get();
        $sub_cate = DB::table('danhmuc')->get();
        $in4_user = DB::table('nguoidung')->where('manguoidung','=',Session::get('user')->manguoidung)->get();
        
        return view('pages.profile.profile')->with('ordered',$ordered)->with('category',$cate_product)->with('sub_cate',$sub_cate)
        ->with('in4_user',$in4_user);
    }
    public function show_profile2(){
   
       
        $in4_user = DB::table('nguoidung')->where('manguoidung','=',Session::get('user')->manguoidung)->get();
        
        return view('admin.AdminProfile')->with('in4_user',$in4_user);
    }

    public function show_details_ordered($orderid){
        $userid = Session::get('user')->manguoidung;
        $ordered = DB::table('donhang')->where('manguoidung',$userid)->get(); 
        $cate_product = DB::table('danhmuc')->get();
        $sub_cate = DB::table('danhmuc')->get();
        // $orderdetail = DB::table('ordersdetails')->where('orderid',$orderid)->get();
        $in4_user = DB::table('nguoidung')->where('manguoidung','=',Session::get('user')->manguoidung)->get();
        $orderdetail = DB::table('chitietdonhang')->join('sanpham','chitietdonhang.masanpham','=','sanpham.masanpham')->where(
            'Madonhang',$orderid)->get();

        return view('pages.profile.profile')->with('ordered',$ordered)->with('details',$orderdetail)
        ->with('in4_user',$in4_user)->with('category',$cate_product)->with('sub_cate',$sub_cate);;
    }
    public function load_comment(Request $request){
        $product_id = $request->product_id;
        $comment = DB::table('binhluan')->where('masanpham','000'. $product_id)->get();
        $output = '';
        foreach($comment as $key => $comm){
            $output .= '<div class="row style_comment" >
            <div class="col-md-3">
                
                <img width="50%" src="'.url('public/frontend/images/edit-profile-removebg-preview.png').'" 
               
                style="margin:5px;">
            </div> 
            <div class="col-md-9" style="margin-left:-50px ;margin-top:10px;">
            
            <p style="color:red;font-size: 18px;">
                  <b>  @'.$comm->ten.' </b>
            </p> </br>
            <p style="margin-top:-38px;font-size: 13px;color:gray">
                    Thời gian: '.$comm->thoigian.'
            </p> 
            <p>
            '.$comm->noidung.'
            </p>  
            </div>
        </div> <p></p>';
        }
        echo  $output;
    }
    public function send_comment(Request $request){
   
        $data = array();
        $data['manguoidung'] = '000'.$request->nd_id;
        $data['masanpham'] = '000'.$request->product_id;
        $data['ten'] = $request->comment_name;
        $data['gmail'] = $request->comment_email;
        $data['noidung'] = $request->comment_content;
       

        Db::table('binhluan')->insert($data);
        
    }

    public function update_profile(Request $request){
            $hoten = $request->hoten;
            $phone = $request->phone;
            $address = $request->address;

            DB::update('update nguoidung set hoten = ?,sodienthoai=?,diachi=? where manguoidung = ?',
            [$hoten,$phone,$address,Session::get('user')->manguoidung]);
            
                             
            return Redirect::to('/show-profile');
    }
    public function update_profile2(Request $request){
        $hoten = $request->hoten;
        $phone = $request->phone;
        $address = $request->address;

        DB::update('update nguoidung set hoten = ?,sodienthoai=?,diachi=? where manguoidung = ?',
        [$hoten,$phone,$address,Session::get('user')->manguoidung]);              
        return Redirect::to('/show-profile2');
}
}
