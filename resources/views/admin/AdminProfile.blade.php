@extends('AdminLayout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                           Cập nhật thông tin cá nhân
                        </header>
                      
                        

                        <div class="panel-body" style="background: #DDEDE0;">

                            <div class="position-center">
                                @foreach($in4_user as $key => $info)
                                <form role="form" action="{{URL::to('/update-profile2')}}" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="nccname">Email</label>
                                    <input type="text" class="form-control" name="account-email" disabled="disabled" value="{{$info->email}}">
                                </div>

                                <div class="form-group">
                                    <label for="">Họ tên</label>
                                    <input type="text" class="form-control" name="hoten" value="{{$info->hoten}}">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Số điện thoại</label>
                                    <input type="text" class="form-control" name="phone" value="{{$info->sodienthoai}}" >
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Địa chỉ</label>
                                    <input type="text" class="form-control" name="address" value="{{$info->diachi}}" >
                                </div>


                                <button type="submit" name="add_product" class="btn btn-info" onclick="alert('Xác nhận thay đổi?');">Cập nhật</button>
                                </form>
                                @endforeach
                            </div>

                        </div>
                    </section>

            </div>
           
@endsection
