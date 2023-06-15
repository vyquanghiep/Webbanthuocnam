<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\nguoidung;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use PDF;
use App\Order;
use App\OrderDetails;

class OrderController extends Controller
{
    //user
    public function show_all_orders(){
        $list_orders = DB::table('donhang')
        ->join('nguoidung', 'donhang.manguoidung',  '=', 'nguoidung.manguoidung')->get();
        return view('admin.AllOrder')->with('list_orders', $list_orders);   
    }

    public function filter_orders(Request $request) {
        $filter = $request->filter;
        if($filter == "1") {
            $list_orders = DB::table('donhang')
            ->join('nguoidung', 'donhang.manguoidung',  '=', 'nguoidung.manguoidung')->where('matrangthaidonhang', 0)->get();
            return view('admin.AllOrder')->with('list_orders', $list_orders);  
        }

        if($filter == "2") {
            $list_orders = DB::table('donhang')
            ->join('nguoidung', 'donhang.manguoidung',  '=', 'nguoidung.manguoidung')->where('matrangthaidonhang', 1)->get();
            return view('admin.AllOrder')->with('list_orders', $list_orders); 
        }

        if($filter == "3") {
            $list_orders = DB::table('donhang')
            ->join('nguoidung', 'donhang.manguoidung',  '=', 'nguoidung.manguoidung')->where('matrangthaidonhang', 2)->get();
            return view('admin.AllOrder')->with('list_orders', $list_orders); 
        }
        if($filter == "4") {
            $list_orders = DB::table('donhang')
            ->join('nguoidung', 'donhang.manguoidung',  '=', 'nguoidung.manguoidung')->where('matrangthaidonhang', 3)->get();
            return view('admin.AllOrder')->with('list_orders', $list_orders); 
        }

        return Redirect::to('all_orders');
    }

    public function show_order_details($id) {
        $order_info = DB::table('donhang')->where('madonhang', $id)->get();
        $order_list = DB::table('chitietdonhang')
            ->join('sanpham', 'chitietdonhang.masanpham', '=', 'sanpham.masanpham')
            ->where('madonhang', $id)
            ->get();
        return view('admin.OrderDetail')
            ->with('order_info', $order_info[0])
            ->with('order_list', $order_list);
    }

    public function confirm_order(Request $request) {
        $data = $request->all();
        $order = array();
        $order['matrangthaidonhang'] = 1;
        if(DB::table('donhang')->where('madonhang', $data['orderId'])->update($order)) {
            echo 'success';
        } else {
            echo 'fail';
        }
        
    }
    public function fail_order(Request $request) {
        $order_id = $request->orderId;
 
        $d=strtotime("today");
        $order = array();
        $order['matrangthaidonhang'] = 3;
        $order['thoigian'] = date("Y-m-d h:i", $d);
        $ct = DB::table('chitietdonhang')
        ->where('madonhang','=',$order_id)->get();
        foreach($ct as $chitiet){
            $masanpham = $chitiet->masanpham;
        $kho2 = DB::table('sanpham')
        ->where('masanpham','=',$masanpham)->get();
        $data2 = array();
        foreach($kho2 as $cc){
            $soluongcon = $cc->soluong + $chitiet->soluongdat;
                $data2['tensanpham'] =  $cc->tensanpham;
                $data2['mota'] = $cc->mota;
                $data2['soluong']=$soluongcon;
                $data2['gia'] = $cc->gia;
                $data2['madanhmuc'] = $cc->madanhmuc;
                $data2['maloai'] = $cc->maloai;
             
                DB::table('sanpham')->where('masanpham', $masanpham)->update($data2);
                Session::put('message', 'cập nhật số lượng thành công');
           
            }}

        if(DB::table('donhang')->where('madonhang', $order_id )->update($order)) {
        
        echo 'success'; 
    
        } else {
            echo 'failure';
        }
        
          
    }

    public function success_order(Request $request) {
        $order_id = $request->orderId;
        $d=strtotime("today");
        $order = array();
        $order['matrangthaidonhang'] = 2;
        $order['thoigian'] = date("Y-m-d h:i", $d);
        if(DB::table('donhang')->where('madonhang', $order_id )->update($order)) {
            echo 'success'; 
        } else {
            echo 'failure';
        }
    }

    public function delete_order(Request $request) {
        $order_id = $request->orderId;
        if(DB::table('donhang')->where('madonhang', $order_id)->delete()) {
            echo 'success'; 
        } else {
            echo 'failure';
        }
    }
    public function print_order($id){
       
        $pdf = \App::make('dompdf.wrapper');
		$pdf->loadHTML($this->print_order_convert($id));
		
		return $pdf->stream();
        
    }
    public function print_order_convert($id){
        $order = Order::where('madonhang',$id)->get();
        $orderdetails = OrderDetails::where('madonhang',$id)->get();
        foreach($order as $key => $ord){
			$customer_id = $ord->manguoidung;
		}
        $customer = Nguoidung::where('manguoidung',$customer_id)->first();
        

        $output = '';

		$output.='<style>body{
			font-family: DejaVu Sans;
		}
		.table-styling{
			border:1px solid #000;
		}
		.table-styling tbody tr td{
			border:1px solid #000;
		}
		</style>
		<h3><center>Tiệm thuốc nam Lê Thanh</center></h3>
		<h1><center>HOÁ ĐƠN</center></h1>
		<p>Người đặt hàng</p>
        
		<table class="table-styling" >
				<thead>
					<tr>
						<th>Tên khách đặt</th>
						<th>Số điện thoại</th>
						<th>Email</th>
					</tr>
				</thead>
				<tbody>';
				
		$output.='		
					<tr>
						<td>'.$customer->hoten.'</td>
						<td>'.$customer->sodienthoai.'</td>
						<td>'.$customer->email.'</td>
						
					</tr>';
				

		$output.='				
				</tbody>
			
		</table>
        
		

		
        <p>Ship hàng tới</p>
			<table class="table-styling" >
				<thead>
					<tr>
						<th>Tên người nhận</th>
						<th>Địa chỉ</th>
						<th>Sdt</th>
						<th>Tổng tiền</th>
						<th>Ghi chú</th>
					</tr>
				</thead>
				<tbody>';
				foreach($order as $key => $ord){
		$output.='		
					<tr>
						<td>'.$ord->nguoinhan.'</td>
						<td>'.$ord->diachi.'</td>
						<td>'.$ord->sodienthoai.'</td>
						<td>'.$ord->tongtien.'</td>
						<td></td>
						
					</tr>';
				
                }
		$output.='				
				</tbody>
			
		</table>
        <p>Đơn hàng đặt</p>
			<table class="table-styling" >
				<thead>
					<tr>
						<th>Tên sản phẩm</th>
						<th>Mã đơn hàng</th>
						<th>Số lượng đặt</th>
						<th>Thành tiền</th>
						
					</tr>
				</thead>
				<tbody>';
			
				

				foreach($orderdetails as $key => $product){
                    $masanpham=$product->masanpham;
                    $kho= DB::table('sanpham')->where('masanpham',$masanpham)->get();
                    foreach($kho as $key => $sp){

		        $output.='		
					<tr>
						<td>'.$sp->tensanpham.'</td>
						<td>'.$product->madonhang.'</td>
                        <td>'.$product->soluongdat.'</td>
                        <td>'.$product->tongtien.'</td>
					
					</tr>';
				}}

				

		
		$output.='				
				</tbody>
			
		</table>

		<p >Ký tên</p>
        </br>
			<table>
				<thead>
					<tr>
						<th width="200px">Người lập phiếu</th>
						<th width="800px">Người nhận</th>
						
					</tr>
				</thead>
				<tbody>';
						
		$output.='				
				</tbody>
			
		</table>
        

		';


		return $output;

    }
   
}
