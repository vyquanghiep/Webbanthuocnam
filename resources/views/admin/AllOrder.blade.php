@extends('AdminLayout') 
@section('admin_content') 
<!-- <h1>davaddsf</h1> -->
<div class="panel panel-primary" >
                <div class="panel-heading"
                    style="font-size: 2rem; background: #02796E">
      Danh sách đơn hàng
    </div> 
    <div class="row w3-res-tb"> 
      <form class="col-sm-5 m-b-xs" method="get" action="{{url('order_filter')}}"> 
        <select name="filter" class="input-sm form-control w-sm inline v-middle"> 
          <option value="0">Tất cả</option> 
          <option value="1">Chờ xác nhận</option> 
          <option value="2">Đang xử lý</option> 
          <option value="3">Thành công</option> 
          <option value="4">Đã huỷ</option> 
        </select> 
        <button type="submit" class="btn btn-sm btn-default">Apply</button>                 
      </form> 
    </div> 
      
    </div> 
    <div class="table-responsive" > 
      <table class="table table-striped b-t b-light" id="myTable"> 
        <thead> 
          <tr> 
            <th>Tên người đặt</th>
            <th>Số điện thoại</th> 
            <th>Email</th>
            <th>Ngày đặt</th>
            <th>Tổng giá tiền</th> 
            <th>Tình trạng</th> 
            <th>Thao tác</th> 
            <!-- <th style="width:30px;"></th>  -->
          </tr> 
        </thead> 

        <tbody class="user__list"> 
        @foreach($list_orders as $key=>$order)

          <tr> 
            <td>{{$order->hoten}}</td> 
            <td>{{$order->sodienthoai}}</td> 
            <td>{{$order->email}}</td> 
            <td>{{$order->thoigian}}</td> 
            <td>{{$order->tongtien}}</td>
            @if($order->matrangthaidonhang == 0)
                <td>Chờ xác nhận</td> 
            @elseif($order->matrangthaidonhang == 1)
                <td>Đang xử lý</td> 
            @elseif($order->matrangthaidonhang == 2)
                <td>Thành công</td> 
                @elseif($order->matrangthaidonhang == 3)
                <td>Đã Huỷ</td> 
            @endif
            <td>
              <button class="btn btn-warning">
                <a href="{{URL::to('order_detail/'.$order->madonhang)}}">Chi tiết</a>
              </button>
              <button class="btn btn-danger">
                <a data-order__id="{{$order->madonhang}}" href="" class="order__delete">Xóa</a>
              </button>
            </td>
          </tr> 
          @endforeach
        </tbody> 
      </table> 
    </div> 
</div> 
<script>
    $('#myTable').DataTable();
    $(document).on('click', '.order__delete', function() {
      if(confirm('Bạn có muốn xóa đơn hàng này?')) {
        let orderId = $(this).data('order__id')
           $.ajax({
                url: "{{url('/order_delete')}}",
                method: 'post',
                data: {
                    orderId: orderId
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data) {
                  if(data == 'success') {
                    $.notify('Đã xóa đơn hàng thành công', 'success')
                    window.location.replace("{{url('/all_orders')}}");
                  } 

                  if(data == 'failure')
                    $.notify('Cập nhật thất bại', 'warning')
                }
           })
      }
    })
  </script>
 
@endsection()
