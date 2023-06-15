<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;

class PostController extends Controller
{
    //ADMIN
    public function index2(){
        $all_product2 = DB::table('sanpham')->where('sanpham.maloai',2)->get();
        $cate_product = DB::table('danhmuc')->get(); 
        $all_post = DB::table('baidang')->get();

        return view('pages.post.post')->with('all_post',$all_post)->with('category',$cate_product)->with('all_product',$all_product2);
        
    }
    public function index4(){
        $cate_product = DB::table('danhmuc')->get(); 
        return view('pages.lienhe')->with('category',$cate_product);
        
    }
    public function index3(){
        $cate_product = DB::table('danhmuc')->get(); 
        return view('pages.aboutus')->with('category',$cate_product);
        
    }


 
  

    // User
    public function details_post($bookid){
     
       
        $detai_post = DB::table('baidang')
        ->join('sanpham','sanpham.masanpham','=','baidang.masanpham')
        ->where('mabaidang','=',$bookid)->get();
        return view('pages.post.post_details')
            ->with('post_details',$detai_post);
            
           
    }
}
