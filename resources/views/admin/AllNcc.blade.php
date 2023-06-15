@extends('AdminLayout')
@section('admin_content')
<!-- <h1>davaddsf</h1> -->
<div class="panel panel-primary" >
                <div class="panel-heading"
                    style="font-size: 2rem; background: #02796E">
      Danh sách nhà cung cấp
    </div>
    <br/>
    <div class="table-responsive">
        <?php
                            $message = Session::get('message');
                            if($message){
                                echo '<span class="text-alert">'.$message.'</span>';
                                Session::put('message',null);
                            }
                            ?>
      <table class="table table-striped b-t b-light" id="myTable">
        <thead>
          <tr>
           

            <th>Tên nhà cung cấp</th>
            <th>Số điện thoại</th>
            <th>Đại chỉ</th>
            <th>Mã sản phẩm cung cấp</th>
            <th>Thao tác</th>
          </tr>
        </thead>

        <tbody>
          @foreach($list_nccs as $key=>$ncc)
          <tr>
            <td>{{$ncc->tennhacungcap}}</td>
            <td>{{$ncc->sodienthoai}}</td>
            <td>{{$ncc->diachi}}</td>
            <td>{{$ncc->masanpham}}</td>
            <td>
              <button class="btn btn-warning">
                <a href="{{URL::to('/edit_ncc/'.$ncc->manhacungcap)}}">Sửa</a>
              </button>
              <button class="btn btn-danger">
                <a onclick="return confirm('Bạn có chắc là muốn xóa ncc này ko?')" href="{{URL::to('/delete_ncc/'.$ncc->manhacungcap)}}">Xoá</a>
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
