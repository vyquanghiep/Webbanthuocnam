@extends('AdminLayout') 
@section('admin_content') 

<div 
    class="panel panel-primary">
    <div class="panel-heading"
        style="
            font-size: 1.3rem;
            position: relative;
            height: 37px;
            line-height: 37px;
            letter-spacing: 0.2px;
            color: #000;
            font-size: 18px;
            font-weight: 400;
            padding: 0 16px;
            background: #ddede0;
            border-top-right-radius: 2px;
            border-top-left-radius: 2px;">
      Thông tin người nhận
    </div> 
   
    <div class="table-responsive" > 
      <table class="table table-striped b-t b-light" id="myTable"> 
        <thead> 
          <tr> 
            <th>Họ tên</th> 
            <th>Số điện thoại</th> 
            <th>Địa chỉ</th> 
            <!-- <th style="width:30px;"></th>  -->
          </tr> 
        </thead> 
            <tr> 
                <td>{{$order_info->nguoinhan}}</td> 
                <td>{{$order_info->sodienthoai}}</td>
                <td>{{$order_info->diachi}}</td>
                <td></td>
            </tr> 
        <tbody class="user__list"> 
       
        </tbody> 
      </table> 
    </div> 
</div> 

<br><br>


<div 
    class="panel panel-primary">
    <div class="panel-heading"
        style="
            font-size: 1.3rem;
            position: relative;
            height: 37px;
            line-height: 37px;
            letter-spacing: 0.2px;
            color: #000;
            font-size: 18px;
            font-weight: 400;
            padding: 0 16px;
            background: #ddede0;
            border-top-right-radius: 2px;
            border-top-left-radius: 2px;">
      Chi tiết đơn hàng
    </div> 
   
    <div class="table-responsive" > 
      <table class="table table-striped b-t b-light" id="myTable"> 
        <thead> 
          <tr> 
            <th>STT</th>
            <!-- <th></th> -->
            <th>Tên cây thuốc</th> 
            <th>Giá bán (VND)</th>
            <th>Số lượng</th> 
            <th>Thành tiền (VND)</th>
            <!-- <th style="width:30px;"></th>  -->
          </tr> 
        </thead> 
        <tbody class="user__list"> 
            <!-- {{$id=1}} -->
        @foreach($order_list as $key=>$product)
            <tr> 
                <td>{{$id++}}</td>
                <td>{{$product->tensanpham}}</td> 
                <td>{{number_format($product->gia)}}</td>
                <td>{{$product->soluongdat}}</td>
                <td>{{number_format($product->tongtien)}}</td>
            </tr> 
        @endforeach
        
        </tbody> 
      </table> 
    <div class="order_execute">
        <div class="actions" style="display: flex; align-items: center;">
         
            @if($order_info->matrangthaidonhang == 0)
             
              
              <button data-order__id="{{$order_info->madonhang}}" class="order__fail btn btn-danger">
                  Huỷ đơn hàng
              </button> 
              <button data-order__id="{{$order_info->madonhang}}" style="margin-left: 20px;" class="order__submit btn btn-success">Xác nhận</button>
              <button style="display: none;" data-order__id="{{$order_info->madonhang}}" style="margin-left: 20px;" class="order__success btn btn-info">
                Giao hàng thành công
              </button>
            @elseif($order_info->matrangthaidonhang == 1)
            <button data-order__id="{{$order_info->madonhang}}" class="order__fail btn btn-danger">
                  Huỷ đơn hàng
              </button>
              <button data-order__id="{{$order_info->madonhang}}" style="margin-left: 20px;" class="order__success btn btn-info">
                  Giao hàng thành công
              </button> 
            @elseif($order_info->matrangthaidonhang == 2)
              <h4 >Đã giao vào lúc: {{ date("h:i:sa d/m/Y ", strtotime($order_info->thoigian))  }}</h4>
              @elseif($order_info->matrangthaidonhang == 3)
              <h4 >Đã huỷ vào lúc: {{ date("h:i:sa d/m/Y ", strtotime($order_info->thoigian))  }}</h4>
            @endif
           
           

            <button data-order__id="{{$order_info->madonhang}}" style="margin-left: 20px;" class="order__delete btn btn-danger">
              Xóa
            </button>
           
            
            
        </div>
        <div class="total">
            <h3>Tổng tiền: {{$order_info->tongtien}}</h3>
        </div>
    </div>
   <a class="lienket" href="{{URL::to('print_order/'.$order_info->madonhang)}}" style="font-size:20px; margin-left:30px;">In đơn hàng</a>
   <a class="lienket" href="{{URL::to('/all_orders')}}" style="font-size:20px; margin-left:30px; " >Quay lại</a>
   
    </div> 
</div> 

<br><br>
<style type="text/css">
        .lienket{       
            background-color: white;
            color: black;
            border: 2px solid #73AD21;
            border-radius:5px;
            padding: 5px 10px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            font-family: "Lucida Sans Unicode";
        }
        .lienket:hover{
            background-color: #73AD21;
            color:white;
        }
        .lienket:active{
            background-color: green;
            border-color: green;
        }
    </style>
<style>
    .order_execute {
        display: flex;
        width: 100%;
        padding: 20px 30px;
        box-sizing: border-box;
        justify-content: space-between;
    }
</style>

<script>
    $(document).on('click', '.order__submit', function() {
        if(confirm('Bạn có muốn xác nhận đơn hàng này?')) {
           let orderId = $(this).data('order__id')
           $.ajax({
                url: "{{url('/order_confirm')}}",
                method: 'post',
                data: {
                    orderId: orderId
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data) {
                    $.notify('Đã xác nhận đơn hàng thành công', 'success')
                    $('.order__submit').css('display', 'none')
                    $('.order__success').css('display', 'block')
                }
           })
        }
    })

    $(document).on('click', '.order__success', function() {
      if(confirm('Đơn hàng đã được giao?')) {
        let orderId = $(this).data('order__id')
           $.ajax({
                url: "{{url('/order_success')}}",
                method: 'post',
                data: {
                    orderId: orderId
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data) {
                  if(data == 'success') {
                    $.notify('Cập nhật đơn hàng thành công', 'success')
                    window.location.replace("{{URL::to('order_detail/'.$order_info->madonhang)}}");
                  }
                }
           })
      }
    })
      $(document).on('click', '.order__fail', function() {
        if(confirm('Bạn muốn huỷ đơn hàng này?')) {
          let orderId = $(this).data('order__id')
          
            $.ajax({
                  url: "{{url('/order_fail')}}",
                  method: 'post',
                  data: {
                      orderId: orderId
                    
                  },
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  },
                  success: function(data) {
                    if(data == 'success') {
                      $.notify('Huỷ đơn hàng thành công', 'success')
                      window.location.replace("{{URL::to('order_detail/'.$order_info->madonhang)}}");
                    }
                  }
            })
        }
      })

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
