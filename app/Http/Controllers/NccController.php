<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;


class NccController extends Controller
{
    //ADMIN
    public function index()
    {
        return view('AdminLogin');
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

    public function show_all_nccs()
    {
        
        $list_nccs = DB::table('nhacungcap')->get();
        $nccs = view('admin.AllNcc')
            ->with('list_nccs', $list_nccs);
        // return view('AdminLayout')->with('admin.all_category', $manager_category);
        return $nccs;
    }

    public function show_add_nccs()
    {
       
        $list_category = DB::table('sanpham')->limit(15)->get();
        $nccs = view('admin.AddNcc')

            ->with('list_category', $list_category);
        // return view('AdminLayout')->with('admin.all_category', $manager_category);
        return $nccs;
    }

    public function save_ncc(Request $request)
    {
        $this->AuthLogin();
        $data = array();
        $data['tennhacungcap'] = $request->tennhacungcap;
        $data['sodienthoai'] = $request->sodienthoai;
        $data['diachi'] = $request->diachi;
        $data['masanpham'] = $request->masanpham;
        if ($request->tennhacungcap){
            DB::table('nhacungcap')->insert($data);
            Session::put('message', 'Thêm nhà cung cấp thành công');
            return Redirect::to('show_nccs');
        }else{
            return Redirect::to('show_add_nccs');
        }


    }

    public function delete_ncc($nccid)
    {
        $this->AuthLogin();
        DB::table('nhacungcap')->where('manhacungcap', $nccid)->delete();
        Session::put('message', 'Xóa nhà cung cấp thành công');
        return Redirect::to('show_nccs');
    }
    public function edit_ncc($nccid)
    {
        $this->AuthLogin();
        $list_category = DB::table('sanpham')->limit(15)->get();
        $edit_ncc = DB::table('nhacungcap')->where('manhacungcap', $nccid)->get();
        $manager_ncc  = view('admin.EditNcc')->with('edit_ncc', $edit_ncc)->with('list_category', $list_category);
        return view('AdminLayout')->with('admin.EditNcc', $manager_ncc);
    }
    public function update_ncc(Request $request, $nccid)
    {
        $this->AuthLogin();
        $data = array();
        $data['manhacungcap'] = $nccid;
        $data['tennhacungcap'] = $request->tennhacungcap;
        $data['sodienthoai'] = $request->sodienthoai;
        $data['diachi'] = $request->diachi;
        $data['masanpham'] = $request->category;

        DB::table('nhacungcap')->where('manhacungcap', $nccid)->update($data);
            Session::put('message', 'Cập nhật nhà cung cấp thành công');
            return Redirect::to('show_nccs');
    }

   
}
