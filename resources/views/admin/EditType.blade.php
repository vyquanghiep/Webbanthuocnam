@extends('AdminLayout') 
@section('admin_content') 
<!-- <h1>davaddsf</h1> -->
<div class="panel panel-primary" style="background:#DDEDE0;" >
                <div class="panel-heading"
                    style="font-size: 2rem; background: #02796E">
      Liệt kê loại sản phẩm 
    </div> 
    <div class="panel-body"> 
        <div class="position-center"> 
        @foreach($loaisanpham as $key => $nxb_value)
            <form 
                role="form" 
                method="post" 
                action="{{URL::to('/save_editnxb')}}"> 
                {{ csrf_field() }}
                <input type="text" name="nxb_id" hidden value="{{$nxb_value->maloai}}">
                <div class="form-group"> 
                    <label for="nxb_name">Tên danh mục</label> 
                    <input 
                      type="text" 
                      class="form-control" 
                      name="nxb_name"
                      value="{{$nxb_value->loaisanpham}}"> 
                </div> 
                <button type="submit" class="btn btn-info">Cập nhật</button> 
            </form> 
        @endforeach
        </div> 
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
@endsection()
