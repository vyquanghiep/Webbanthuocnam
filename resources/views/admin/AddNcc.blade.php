@extends('AdminLayout')
@section('admin_content')
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-primary" style="background:#DDEDE0;" >
                <div class="panel-heading"
                    style="font-size: 2rem; background: #02796E">
                    Thêm nhà cung cấp
                </div>
                <div class="panel-body">
                    <div class="position-center">
                        <form
                            role="form"
                            method="post"
                            action="{{URL::to('/save_ncc')}}"
                        > {{ csrf_field() }}
                            <div class="form-group">
                                <label for="bookname">Tên nhà cung cấp</label>
                                <input type="text" class="form-control" name="tennhacungcap">
                            </div>

                

                            <div class="form-group">
                                <label for="">Số điện thoại</label>
                                <input type="text" class="form-control" name="sodienthoai">
                            </div>


                            <div class="form-group">
                                <label for="">Địa chỉ</label>
                                <input type="text" class="form-control" name="diachi">
                            </div>

                           
                            <div class="form-group">
                                <label for="">Sản phẩm cung cấp</label>
                                <select name="masanpham">
                                    @foreach($list_category as $key => $sanpham)
                                        <option value="{{$sanpham->masanpham}}">{{$sanpham->tensanpham}}</option>
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
