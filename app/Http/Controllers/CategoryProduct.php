<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;

class CategoryProduct extends Controller
{
    // BEGIN ADMIN
    public function auth_login_admin() {
            $admin_id = Session::get('user')->maquyen; 
            if($admin_id == 1){ 
                return Redirect::to('dashboard'); 
            }else{ 
                return Redirect::to('admin')->send(); 
            } 
        } 

    public function show_all_category() {
        $this->auth_login_admin();
        $list_category = DB::table('danhmuc')->get();
        return view('admin.AllCategoryProduct')
                            ->with('list_category', $list_category);
        // return view('AdminLayout')->with('admin.all_category', $manager_category);
       
    }

    public function show_form_add_category() {
        $this->auth_login_admin();
        return view('admin.AddCategoryProduct');
    }

    public function show_form_edit_category($id) {
        $this->auth_login_admin();
        $category = DB::table('danhmuc')->where('madanhmuc', $id)->get();
        $manager_category = view('admin.EditCategory')
                            ->with('danhmuc', $category);
        return $manager_category;
    }

    public function add_category(Request $request) {
        $this->auth_login_admin();
        if($request->category_name) {
            $category = array();
            $category['danhmuc'] = trim($request->category_name);
            DB::table('danhmuc')->insert($category);
            Session::put('message', 'Đã thêm thành công');
            return Redirect::to('all_category');
        }
        return Redirect::to('add_category');
    }

    public function delete_category($id) {
        $this->auth_login_admin();
        DB::table('danhmuc')->where('madanhmuc', $id)->delete();
        Session::put('message','Xóa danh mục thành công'); 
        return Redirect::to('all_category');
    }

    public function update_category(Request $request) {
        $this->auth_login_admin();
        if($request->category_id) {
            $category = array();
            $category['danhmuc'] = trim($request->category_name);
            // $category['parentId'] = trim($request->category_pid);
            DB::table('danhmuc')
                ->where('madanhmuc', $request->category_id)
                ->update($category);
            Session::put('message', 'Update danh mục thành công');
            return Redirect::to('all_category');
        }
    }

    // END ADMIN

    //user
    public  function show_category_home($madanhmuc){
        
        $cate_product = DB::table('danhmuc')->get(); 
      
        $category_by_id = DB::table('sanpham')->join('danhmuc','sanpham.madanhmuc','=','danhmuc.madanhmuc')
        ->where('sanpham.madanhmuc',$madanhmuc)->get();
        $category_by_id   = DB::table('sanpham')->join('danhmuc','sanpham.madanhmuc','=','danhmuc.madanhmuc')
        ->where('sanpham.madanhmuc',$madanhmuc)->get();
        
        $category_name = DB::table('danhmuc')->where('danhmuc.madanhmuc',$madanhmuc)->limit(1)->get();
        return view('pages.category.show_category')->with('danhmuc',$cate_product)
        ->with('category_by_id',$category_by_id)->with('category_name',$category_name);
    }
    
}
