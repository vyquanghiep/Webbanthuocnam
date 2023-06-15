@extends('AdminLayout')
@section('admin_content')
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-primary" style="background:#DDEDE0;" >
                <div class="panel-heading"
                    style="font-size: 2rem; background: #02796E">
                    Thêm Sản phẩm
                </div>
                <div class="panel-body">
                    <div class="position-center">
                        <form
                            role="form"
                            method="post"
                            action="{{URL::to('/save_product2')}}"
                        > {{ csrf_field() }}
                            <div class="form-group">
                                <label for="bookname">Tên sản phẩm</label>
                                <input type="text" class="form-control" name="tensanpham">
                            </div>

                

                            <div class="form-group">
                                <label for="">Số lượng</label>
                                <input type="text" class="form-control" name="soluong">
                            </div>
                            <div class="form-group">
                                    <label for="exampleInputEmail1">Hình ảnh sản phẩm</label>
                                    <input type="file" name="anhurl" class="form-control" id="exampleInputEmail1">
                                </div>

                            <div class="form-group">
                                <label for="">Giá</label>
                                <input type="text" class="form-control" name="gia">
                            </div>

                            <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả sản phẩm</label>
                                    <textarea style="resize: none" rows="8" class="form-control" name="mota" id="exampleInputPassword1">
                                    </textarea>
                                </div>


                            <div class="form-group">
                                <label for="">Danh mục</label>
                                <select name="madanhmuc">
                                    @foreach($list_category as $key => $danhmuc)
                                        <option value="{{$danhmuc->madanhmuc}}">{{$danhmuc->danhmuc}}</option>
                                    @endforeach
                                </select>
                            </div>
                           

                            <button type="submit" class="btn btn-info">Thêm</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
@endsection
