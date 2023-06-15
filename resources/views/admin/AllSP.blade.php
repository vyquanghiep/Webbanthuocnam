@extends('AdminLayout')
@section('admin_content')
<!-- <h1>davaddsf</h1> -->
<div class="panel panel-primary" >
                <div class="panel-heading"
                    style="font-size: 2rem; background: #02796E">
      Liệt kê danh sách sản phẩm
    </div>
    <br/>
    <?php
                            $message = Session::get('message');
                            if($message){
                                echo '<span class="text-alert">'.$message.'</span>';
                                Session::put('message',null);
                            }
                            ?>
                           
    <div class="table-responsive">
        
                            
      <table class="table table-striped b-t b-light" id="myTable">
        <thead>
          <tr>
            <th style="width:20px;">
            Hình ảnh
            </th>
            <th>Tên sản phẩm</th>
            <th>Loại sản phẩm</th>
            <th>Số lượng</th>
            <th>Giá</th>
            <th>Thao tác</th>
          </tr>
        </thead>

        <tbody>
          @foreach($list_SPs as $key=>$SP)
          <tr>
            <td>
                <img style="width: 150px; height: 150px" src="{{URL::to(''.$SP->anhurl)}}" alt="">
            </td>
            <td>{{$SP->tensanpham}}</td>
            <td>{{$SP->maloai}}</td>
            <td>{{$SP->soluong}}</td>
            <td>{{$SP->gia}}</td>
            <td>
              <button class="btn btn-warning">
                <a href="{{URL::to('/edit_SP/'.$SP->masanpham)}}">Sửa</a>
              </button>
              <button class="btn btn-danger">
                <a onclick="return confirm('Bạn có chắc là muốn xóa sản phẩm này ko?')" href="{{URL::to('/delete_SP/'.$SP->masanpham)}}">Xoá</a>
              </button>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <footer class="panel-footer">
      <div class="row">

        <!-- <div class="col-sm-5 text-center">
          <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
        </div>
        <div class="col-sm-7 text-right text-center-xs">
          <ul class="pagination pagination-sm m-t-none m-b-none">
            <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
            <li><a href="">1</a></li>
            <li><a href="">2</a></li>
            <li><a href="">3</a></li>
            <li><a href="">4</a></li>
            <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
          </ul>
        </div>  -->
      </div>
    </footer>
  </div>
  <script>
    $('#myTable').DataTable();
  </script>
@endsection()
