@extends('AdminLayout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                           Cập nhật nhà cung cấp
                        </header>
                         <?php
                            $message = Session::get('message');
                            if($message){
                                echo '<span class="text-alert">'.$message.'</span>';
                                Session::put('message',null);
                            }
                            ?>


                        <div class="panel-body" style="background: #DDEDE0;">

                            <div class="position-center">
                                @foreach($edit_ncc as $key => $ncc)
                                <form role="form" action="{{URL::to('/update_ncc/'.$ncc->manhacungcap)}}" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="nccname">Tên sản phẩm</label>
                                    <input type="text" class="form-control" name="tennhacungcap" value="{{$ncc->tennhacungcap}}">
                                </div>

                              
                              

                                <div class="form-group">
                                    <label for="">Số điện thoại</label>
                                    <input type="text" class="form-control" name="sodienthoai" value="{{$ncc->sodienthoai}}">
                                </div>

    

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Địa chỉ</label>
                                    <input type="text" value="{{$ncc->diachi}}" name="diachi" class="form-control" id="exampleInputEmail1" >
                                </div>

                             

                                 

                                <div class="form-group">
                                <label for="">Sản phẩm cung cấp</label>
                                <select name="category">
                                    @foreach($list_category as $key => $sanpham)
                                        <option value="{{$sanpham->masanpham}}">{{$sanpham->tensanpham}}</option>
                                    @endforeach
                                </select>
                                </div>



                                <button type="submit" name="add_product" class="btn btn-info">Cập nhật nhà cung cấp</button>
                                </form>
                                @endforeach
                            </div>

                        </div>
                    </section>

            </div>
@endsection
