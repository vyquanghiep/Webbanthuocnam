<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;

use App\Binhluan;
class ProductController extends Controller
{
    //ADMIN
    public function index()
    {
        return view('AdminLogin');
    }
    public function producthot_home()
    {
        $cate_product = DB::table('danhmuc')->get(); 
        $all_product1 = DB::table('sanpham')->where('sanpham.maloai',1)->get();
        return view('pages.product.producthot')->with('all_product',$all_product1)->with('category',$cate_product);
    }

     public function productnew_home()
    {
        $cate_product = DB::table('danhmuc')->get(); 
        $all_product2 = DB::table('sanpham')->where('sanpham.maloai',2)->get();
        return view('pages.product.productnew')->with('all_product',$all_product2)->with('category',$cate_product);
    }
    public function productvip_home()
    {
        $cate_product = DB::table('danhmuc')->get(); 
        $all_product3 = DB::table('sanpham')->where('sanpham.maloai',3)->get();
        return view('pages.product.productvip')->with('all_product',$all_product3)->with('category',$cate_product);
    }
     public function AuthLogin(){
        $admin_id = Session::get('maquyen');
        echo $admin_id;
        // if($admin_id == 1){
        //     return Redirect::to('dashboard');
        // }else{
        //     return Redirect::to('admin')->send();
        // }
    }

    public function show_all_SPs()
    {
        
        $list_SPs = DB::table('sanpham')->get();
        $SPs = view('admin.AllSP')
            ->with('list_SPs', $list_SPs);
        // return view('AdminLayout')->with('admin.all_category', $manager_category);
        return $SPs;
    }

    public function show_add_SPs()
    {
       
        $list_category = DB::table('danhmuc')->limit(5)->get();
        $SPs = view('admin.AddSP')

            ->with('list_category', $list_category);
        // return view('AdminLayout')->with('admin.all_category', $manager_category);
        return $SPs;
    }

    public function save_product(Request $request)
    {
        $this->AuthLogin();
        $data = array();
        $data['tensanpham'] = $request->tensanpham;
        $data['anhurl'] = "null";
        $data['mota'] = $request->mota;
        $data['soluong'] = $request->soluong;
        $data['gia'] = $request->gia;
        $data['madanhmuc'] = $request->madanhmuc;
        $data['Maloai'] = 1;
        if ($request->tensanpham){
            DB::table('sanpham')->insert($data);
            Session::put('message', 'Thêm sản phẩm thành công');
            return Redirect::to('show_SPs');
        }else{
            return Redirect::to('show_add_SPs');
        }


    }
    public function save_product2(Request $request)
    {
        $this->AuthLogin();
        $data = array();
        $data['tensanpham'] = $request->tensanpham;
        $data['anhurl'] = "null";
        $data['mota'] = $request->mota;
        $data['soluong'] = $request->soluong;
        $data['gia'] = $request->gia;
        $data['madanhmuc'] = $request->madanhmuc;
        $data['Maloai'] = 1;
        $data['anhurl'] = "./public/uploads/product/$request->anhurl";
        if ($request->tensanpham){
            DB::table('sanpham')->insert($data);
            Session::put('message', 'Thêm sản phẩm thành công');
            return Redirect::to('show_SPs');
        }else{
            return Redirect::to('show_add_SPs');
        }


    }

    public function delete_SP($masanpham)
    {
        $this->AuthLogin();
        DB::table('sanpham')->where('masanpham', $masanpham)->delete();
        Session::put('message', 'Xóa sản phẩm thành công');
        return Redirect::to('show_SPs');
    }
    public function edit_SP($masanpham)
    {
        $this->AuthLogin();
        $list_category = DB::table('danhmuc')->limit(5)->get();
        $edit_SP = DB::table('sanpham')->where('masanpham', $masanpham)->get();
        $manager_SP  = view('admin.EditSP')->with('edit_SP', $edit_SP)->with('list_category', $list_category);
        return view('AdminLayout')->with('admin.EditSP', $manager_SP);
    }
    public function update_SP(Request $request, $masanpham)
    {
        $this->AuthLogin();
        $data = array();
        $data['tensanpham'] = $request->tensanpham;
        $data['mota'] = $request->mota;
        $data['soluong'] = $request->soluong;
        $data['gia'] = $request->gia;
        $data['madanhmuc'] = $request->category;
        $data['maloai'] = 1;

        DB::table('sanpham')->where('masanpham', $masanpham)->update($data);
            Session::put('message', 'Cập nhật sản phẩm thành công');
            return Redirect::to('show_SPs');
    }




    // User
    public function details_product($masanpham){
        $count_bl=Binhluan::where('masanpham', $masanpham)->count();
        $cate_product = DB::table('danhmuc')->get();
        $detai_product = DB::table('sanpham')
        ->where('masanpham','=',$masanpham)->get();
        $product_summary = DB::table('mota')->where('masanpham', $masanpham)->get();
        $product_summary2 = DB::table('anh')->where('masanpham', $masanpham)->get();
        return view('pages.product.show_details')->with('category',$cate_product)
            ->with('product_details',$detai_product)
            ->with('product_summary', $product_summary)
            ->with('product_summary2', $product_summary2)
            ->with('count_bl',  $count_bl);
      
    }
    public function details_product2($masanpham){
        $cate_product = DB::table('danhmuc')->get();
        $count_bl=Binhluan::where('masanpham', $masanpham)->count();
        $detai_product = DB::table('sanpham')
        ->where('masanpham','=',$masanpham)->get();
        $product_summary = DB::table('mota')->where('masanpham', $masanpham)->get();
        $product_summary2 = DB::table('anh')->where('masanpham', $masanpham)->get();
        return view('pages.product.show_details2')->with('category',$cate_product)
            ->with('product_details',$detai_product)
            ->with('product_summary', $product_summary)
            ->with('product_summary2', $product_summary2)
            ->with('count_bl',  $count_bl);
      
    }
}
