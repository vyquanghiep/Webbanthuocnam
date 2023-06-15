@extends('AdminLayout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                           Cập nhật sản phẩm
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
                                @foreach($edit_SP as $key => $SP)
                                <form role="form" action="{{URL::to('/update_SP/'.$SP->masanpham)}}" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="bookname">Tên sản phẩm</label>
                                    <input type="text" class="form-control" name="tensanpham" value="{{$SP->tensanpham}}">
                                </div>

                              
                              

                                <div class="form-group">
                                    <label for="">Số lượng</label>
                                    <input type="text" class="form-control" name="soluong" value="{{$SP->soluong}}">
                                </div>

    

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Giá sản phẩm</label>
                                    <input type="text" value="{{$SP->gia}}" name="gia" class="form-control" id="exampleInputEmail1" >
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả sản phẩm</label>
                                    <textarea style="resize: none" rows="8" class="form-control" name="mota" id="exampleInputPassword1">{{$SP->mota}}</textarea>
                                </div>

                              

                               

                                <div class="form-group">
                                <label for="">Danh mục</label>
                                <select name="category">
                                    @foreach($list_category as $key => $danhmuc)
                                        <option value="{{$danhmuc->madanhmuc}}">{{$danhmuc->danhmuc}}</option>
                                    @endforeach
                                </select>
                                </div>



                                <button type="submit" name="add_product" class="btn btn-info">Cập nhật sản phẩm</button>
                                </form>
                                @endforeach
                            </div>

                        </div>
                    </section>

            </div>
@endsection
