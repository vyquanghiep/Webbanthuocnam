@extends('AdminLayout')
@section('admin_content')
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-primary" style="background:#DDEDE0;" >
                <div class="panel-heading"
                    style="font-size: 2rem; background: #02796E">
                    Tạo tài khoản
                </div>
                <div class="panel-body">
                    <div class="position-center">
                        <form
                            role="form"
                            method="post"
                            action="{{URL::to('/save_users')}}"
                        > {{ csrf_field() }}
                            <div class="form-group"><label for="">Tên người dùng</label>
                                <input type="text" class="form-control" name="hoten">
                            </div>

                

                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="text" class="form-control" name="email">
                            </div>


                            <div class="form-group">
                                <label for="">Password</label>
                                <input type="text" class="form-control" name="password">
                            </div>

                            <div class="form-group">
                                    <label for="">Số điện thoại</label>
                                    <input type="text" class="form-control" name="sodienthoai">
                                    
                                </div>
                                <div class="form-group">
                                    <label for="">giới tính(1 - Nam, 0 - Nữ)</label>
                                    <input type="text" class="form-control" name="gioitinh">
                                   
                                </div>


                            <div class="form-group">
                                <label for="">Quyền</label>
                                <select name="maquyen">
                                    @foreach($list_category as $key => $danhmuc)
                                        <option value="{{$danhmuc->maquyen}}">{{$danhmuc->quyen}}</option>
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
