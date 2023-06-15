<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Http\Requests;
use App\User;
use Illuminate\Support\Facades\Redirect;
session_start();

class UsersController extends Controller
{   
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
    public function show_all_users() {
        return view('admin.AllUsers');
    }
  
    public function get_all_users() {
        $list_users = User::get_all();
        $i = 1;
        foreach($list_users as $key=> $user) {
            $output =  '   <tr> 
            <!-- tên user -->
            <td>
            '.$i++.'
            </td> 

            <!-- tên user -->
            <td>
            '.$user->hoten.'
            </td> 

            <!-- Số điện thoại -->
            <td>
            '.$user->sodienthoai.'
            </td>

            <!-- email -->
            <td>
            '.$user->email.'
            </td>';

            if($user->gioitinh == 1)
                $output .= '<td>Nam</td>';
            else
                $output .= '<td>Nữ</td>';  

            $output .=  '<td>
                            '.$user->diachi.'
                         </td>';

            if($user->maquyen == 1)
                $output .= '<td><input data-user_name="'.$user->hoten.'" checked class="isadmin" type="checkbox" name="isadmin" data-user_id="'.$user->manguoidung.'"></td>';
            else
                $output .= '<td><input data-user_name="'.$user->hoten.'" class="isadmin" type="checkbox" name="isadmin" data-user_id="'.$user->manguoidung.'"></td>';

            if($user->trangthaitaikhoan == 1)
                $output .= '<td><input data-user_name="'.$user->hoten.'" checked class="isdisable" type="checkbox" name="isdisable" data-user_id="'.$user->manguoidung.'"></td>';
            else
                $output .= '<td><input data-user_name="'.$user->hoten.'" class="isdisable" type="checkbox" name="isdisable" data-user_id="'.$user->manguoidung.'"></td>';
            $output .= '<td>
                            <button data-user_id="'.$user->manguoidung.'" data-user_name="'.$user->hoten.'" class="btn btn-danger" id="delete">Xóa</button>
                        </td> <tr> '
           
                        ;
            echo $output;
        }
    }
    public function remove_user(Request $request) {
        $data = $request->all();
        User::remove($data['userId']);
    }
    public function enableAdmin(Request $request) {
        $data = $request->all();
        User::enable_admin($data['userId']);
    }

    public function disableAdmin(Request $request) {
        $data = $request->all();
        User::disable_admin($data['userId']);
    }

    public function disableUser(Request $request) {
        $data = $request->all();
        User::disable_user($data['userId']);
    }


    public function enableUser(Request $request) {
        $data = $request->all();
        User::enable_user($data['userId']);
    }
    public function show_add_users()
    {
       
        $list_category = DB::table('quyen')->limit(4)->get();
        $books = view('admin.AddUser')
            

            ->with('list_category', $list_category);
        // return view('AdminLayout')->with('admin.all_category', $manager_category);
        return $books;
    }
    public function save_user(Request $request)
    {
        $this->AuthLogin();
        $data = array();
        $data['hoten'] = $request->hoten;
        $data['gioitinh'] = $request->gioitinh;
        $data['email'] = $request->email;
        $data['sodienthoai'] = $request->sodienthoai;
        $data['diachi'] = 'Đà Nẵng';
        $data['password'] = bcrypt($request->password);
        $data['maquyen'] = $request->maquyen;
       
        if ($request->hoten){
            DB::table('nguoidung')->insert($data);
            Session::put('message', 'Thêm tài khoản thành công');
            return Redirect::to('all_users');
        }else{
            
            return Redirect::to('show_add_users');
        }


    }
}