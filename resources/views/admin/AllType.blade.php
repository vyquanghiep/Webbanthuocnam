@extends('AdminLayout') 
@section('admin_content') 
<!-- <h1>davaddsf</h1> -->
<div class="panel panel-primary" >
                <div class="panel-heading"
                    style="font-size: 2rem; background: #02796E">
      Danh sách loại sản phẩm
    </div> 
</br>
    <div class="table-responsive"> 
      <table class="table table-striped b-t b-light" id="myTable"> 
        <thead> 
          <tr> 
            <th>Tên loại sản phẩm</th> 
            <th>Thao tác</th> 
          </tr> 
        </thead> 

        <tbody> 
          @foreach($list_nxb as $key=>$nxb)
          <tr> 

            <td>{{$nxb->loaisanpham}}</td> 

            <!-- <td>
              <a href="" class="active" ui-toggle-class="">
                <i class="fa fa-check textsuccess text-active"></i>
                <i class="fa fa-times text-danger text"></i>
              </a> 
            </td>  -->

            <td>
              <button class="btn btn-warning">
                <a href="{{URL::to('/update_nxb/'.$nxb->maloai)}}">Sửa</a>
              </button>
              <button class="btn btn-danger">
                <a href="{{URL::to('/delete_nxb/'.$nxb->maloai)}}">Xóa</a>
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
