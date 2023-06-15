<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;

class TypeSPController extends Controller
{   
    public function auth_login_admin() {
            $admin_id = Session::get('user')->maquyen; 
            if($admin_id == 1){ 
                return Redirect::to('dashboard'); 
            }else{ 
                return Redirect::to('admin')->send(); 
            } 
        } 

    public function show_all_Type() {
        $this->auth_login_admin();
        $listNXB = DB::table('loaisanpham')->get();
        return view('admin.AllType')->with('list_nxb', $listNXB);
    }

    public function show_form_add_Type() {
        $this->auth_login_admin();
        return view('admin.AddType');
    }

    public function show_form_edit_Type($id) {
        $this->auth_login_admin();
        $nxb = DB::table('loaisanpham')->where('maloai', $id)->get();
        $manager_nxb = view('admin.EditType')
                            ->with('loaisanpham', $nxb);
        return $manager_nxb;
    }

    public function update_Type(Request $request) {
        $this->auth_login_admin();
        if($request->nxb_id) {
            $nxb = array();
            $nxb['loaisanpham'] = trim($request->nxb_name);
            DB::table('loaisanpham')
                ->where('maloai', $request->nxb_id)
                ->update($nxb);
            Session::put('message', 'Update loại sản phẩm thành công');
            return Redirect::to('all_nxb');
        }
    }

    public function add_Type(Request $request) {
        $this->auth_login_admin();
        $nxbName = $request->nxb_name;
        if($nxbName) {
            $dataNxb = array();
            $dataNxb['loaisanpham'] = $nxbName;
            DB::table('loaisanpham')->insert($dataNxb);
            Session::put('message', 'Đã thêm nxb thành công');
            return Redirect::to('all_nxb');
        }
        return view('admin.add_nxb');
    }

    public function delete_Type($id) {
        $this->auth_login_admin();
        DB::table('loaisanpham')->where('maloai', $id)->delete();
        Session::put('message', 'Đã thêm nxb thành công');
        return Redirect::to('all_nxb');
    }

}

