<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Database\Eloquent\Model;
use App\Product;
use App\Order;
use App\Nguoidung;

use Carbon\Carbon;

session_start();

class AdminController extends Controller
{
    public function index() {
        return view('AdminLogin');
    }


    public function AuthLogin(){ 
        $admin_id = Session::get('user')->maquyen; 
        if($admin_id == 1){ 
            return Redirect::to('dashboard'); 
        }else{ 
            return Redirect::to('admin')->send(); 
        } 
    } 

    public function showDashBoard() {

        
        $product_count = Product::count();
        $order_count_succes=Order::where('matrangthaidonhang', '2')->count();
        $cus_count=Nguoidung::where('maquyen', '0')->count();
        $successfulOrders0 = DB::table('donhang')->where('matrangthaidonhang', 0)->count();
        $successfulOrders1 = DB::table('donhang')->where('matrangthaidonhang', 1)->count();
        $successfulOrders = DB::table('donhang')->where('matrangthaidonhang', 2)->count();
        $cancelledOrders = DB::table('donhang')->where('matrangthaidonhang', 3)->count();
        $order_count_fail=Order::where('matrangthaidonhang', '3')->count();
        $revenueData = Order::where('matrangthaidonhang', '2')->select(
            DB::raw('YEAR(thoigian) as year'),
            DB::raw('MONTH(thoigian) as month'),
            DB::raw('SUM(REPLACE(tongtien, ",", "")) as totalRevenue')
        )
        ->groupBy('year', 'month')
        ->orderBy('year', 'asc')
        ->orderBy('month', 'asc')
        ->get();
    
        // Chuẩn bị dữ liệu cho biểu đồ
        $chartData = [];

      

        foreach ($revenueData as $data) {
            $month = Carbon::createFromDate($data->year, $data->month, 1)->format('M Y');
            $chartData[$month] = $data->totalRevenue;
        }
        return view('admin.dashboard',compact('product_count','order_count_fail','cus_count','order_count_succes','chartData','successfulOrders', 'cancelledOrders','successfulOrders0','successfulOrders1'));
    }
    


    public function dashboard(Request $request) {
    
        $admin_email =trim($request->email); 
        $admin_password = trim($request->password); 
        $result = DB::table('nguoidung')
            ->where('email',$admin_email)
            ->where ('password',$admin_password)
            ->where('maquyen', 1)
            ->first(); 
        if($result){ 
            Session::put('manguoidung',$result->manguoidung);
            Session::put('admin_name', $result->hoten);       
            return view('admin.dashboard'); 
        }else{ 
            Session::put('message','mat khau hoac email khong dung, nhap lai nhe'); 
            return Redirect::to('/admin'); 
        }  
    }

    public function logout() {
        Session::remove('user');
        return  Redirect::to('/'); 
    }

 
}
