@extends('welcome')
@section('content')

<section class="duoinavbar">
        <div class="container text-white">
            <div class="row justify">
                <div class="col-lg-3 col-md-5">
                    <div class="categoryheader">
                        <div class="noidungheader text-white">
                            <i class="fa fa-bars"></i>
                            <span class="text-uppercase font-weight-bold ml-1">Danh mục sách</span>
                        </div>
                        
                        <!-- CATEGORIES -->
                        <div class="categorycontent">
                        <ul >
                            @foreach($danhmuc as $key => $cate)
                            <li> <a href="{{URL::to('/danh-muc-san-pham/'.$cate->madanhmuc)}}">{{$cate->danhmuc}}</a><i class="fa fa-chevron-right float-right"></i>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    </div>
                </div>
                <div class="menu-header-1">
                <ul>
                    <li><a class="text-uppercase font-weight-bold ml-1" href="{{URL::to('/trang-chu')}}">TRANG CHỦ </a></li>
                    <li><a class="text-uppercase font-weight-bold ml-1" href="{{URL::to('/bai-dang')}}">SỐNG KHOẺ </a></li>
                    <li><a class="text-uppercase font-weight-bold ml-1" href="{{URL::to('/about-us')}}">VỀ CHÚNG TÔI </a></li>
                    <li><a class="text-uppercase font-weight-bold ml-1" href="{{URL::to('/lien-he')}}">LIÊN HỆ </a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

<?php
     use Gloudemans\Shoppingcart\Facades\Cart;
    $content =   Cart::content();
   
?>

<link rel="stylesheet" href="{{asset('public/frontend/css/gio-hang.css')}}">
<!-- giao diện giỏ hàng  -->
<section class="content my-3">
        <div class="container">
            <div class="cart-page bg-white">
                <div class="row">
                    
                    @if(Cart::count() == 0)
                    <!-- giao diện giỏ hàng khi không có item   -->
                    <div class="col-md-8 cart" style="margin-left:170px">
                        <div class="py-3 pl-3">
                            <h6 class="header-gio-hang" style="margin-left:-170px">GIỎ HÀNG CỦA BẠN <span>(0 sản phẩm)</span></h6>
                            <div class="cart-empty-content w-100 text-center justify-content-center">
                                <img src="{{asset('public/frontend/images/no_items_found.jpg')}}" alt="shopping-cart-not-product" width="200px">
                                <p>Chưa có sản phẩm nào trong giở hàng của bạn</p>
                                <a href="{{URL::to('/trang-chu')}}" class="btn nutmuathem mb-3">Mua thêm</a>
                            </div>
                        </div>
                    </div>
                    @else
                    <!-- giao diện giỏ hàng khi có hàng  -->
                    
                    <div class="col-md-8 cart">
                        <div class="cart-content py-3 pl-3">
                             <h6 class="header-gio-hang">GIỎ HÀNG CỦA BẠN <span>({{Cart::count()}} sản phẩm) </span></h6>
                                </br>
                             <hr>
                             <div class="group d-flex justify-content-between">
                                            <p class="label">Sản phẩm</p>
                                            <p class="label" style="margin-left:300px">Giá</p>
                                            <p class="giamgia">Thành tiền</p>
                                        </div>
                                        <br>
                                        <hr>
                             
                            <div class="cart-list-items">
                        @foreach($content as $v_content)
                        <?php
                             $product_id = $v_content->id;
                             $kho = DB::table('sanpham')
                             ->where('masanpham','=',$product_id)->get();
                        
                        ?>
                         @foreach($kho as $cc)
                                <div class="cart-item d-flex">
                                
                                    <a href="{{URL::to('/chi-tiet-san-pham/'.$v_content->id)}}" class="img">
                                        <img style="width:100%; height: 80px;" src="{{URL::to(''.$v_content->options->image)}}" class="img-fluid" alt="anhsp1">
                                    </a>
                                    <div class="item-caption d-flex w-100">
                                        <div class="item-info ml-3">
                                            <a href="{{URL::to('/chi-tiet-san-pham/'.$v_content->id)}}" class="ten">{{$v_content->name}}</a>
                                            <div class="soluong d-flex">

                                            <form action="{{URL::to('/update-cart-quantity')}}" method="POST">
                                                {{csrf_field()}}
                                                <div class="input-number input-group mb-3">      
                                                    <input type="number" min ="1" max="{{$cc->soluong}}" value="{{$v_content->qty}}" class="soluongsp  text-center" name ="cart_quantity" style="width:37px;height:25px" >                  
                                                </div>
                                                
                                                    
                                                <div class="input-group-append">
                                                <input type="hidden"   value="{{$v_content->rowId}}"  name ="rowid"  >
                                                        <input class="input-group-text btn-spin btn-inc" value="Cập nhật" 
                                                        style="width:75px;height:25px;margin-top:-36px;margin-left:40px"  type="submit" name="update_qty">
                                                </div>
                                            </form>    
                                           
                                            </div>
                                        </div>
                                        
                                        <div class="item-price ml-auto d-flex flex-column align-items-end">
                                        <div class="giamoi" style="margin-right:150px"> {{number_format($v_content->price) }} đ</div>
                                            <div class="giamoi"  style="margin-top:-20px">
                                                <?php  $subtotal = $v_content->price * $v_content->qty;
                                                    echo number_format($subtotal) ;
                                                ?>đ
                                            </div>  
                                            <span class="remove mt-auto" >
                                                <a href="{{URL::to('/delete-to-cart/'.$v_content->rowId)}}"><i class="far fa-trash-alt" ></i></a>
                                            </span>
                                        </div>
                                    </div>
                                   
                                </div>
                                </br>
                                <hr>
                                @endforeach 
                        @endforeach 
                            
                                
                            </div> 
                            
                             <div class="row">
                                <div class="col-md-3">
                                    <a href="{{URL::to('/trang-chu')}}" class="btn nutmuathem mb-3">Mua thêm</a>
                                </div>
                                <div class="col-md-5 offset-md-4">
                                    <div class="tonggiatien">
                                        <div class="group d-flex justify-content-between">
                                            <p class="label">Tạm tính:</p>
                                            <p class="tamtinh">{{Cart::subtotal()}} ₫</p>
                                        </div>
                                        <div class="group d-flex justify-content-between">
                                            <p class="label">Giảm giá:</p>
                                            <p class="giamgia">0 ₫</p>
                                        </div>
                                        <div class="group d-flex justify-content-between">
                                            <p class="label">Phí vận chuyển:</p>
                                            <p class="phivanchuyen">0 ₫</p>
                                        </div>
                                        <div class="group d-flex justify-content-between">
                                            <p class="label">Phí dịch vụ:</p>
                                            <p class="phidicvu">0 ₫</p>
                                        </div>
                                        <div class="group d-flex justify-content-between align-items-center">
                                            <strong class="text-uppercase">Tổng cộng:</strong>
                                            <p class="tongcong">{{Cart::subtotal()}} ₫</p>
                                        </div>
                                        <small class="note d-flex justify-content-end text-muted">
                                            (Giá đã bao gồm VAT)
                                        </small>
                                    </div>
                                </div>
                            </div> 
                        </div>
                    </div>
                   
                    <div class="col-md-4 cart-steps pl-0">
                        <div id="cart-steps-accordion" role="tablist" aria-multiselectable="true">
                        <!-- @if(Cart::count()>0) -->
                        @if(isset(Session::get('user')->manguoidung )&& Cart::count()>0)

                            <!-- bước số 2: nhập địa chỉ giao hàng  -->
                            <div class="card">
                                <div class="card-header" role="tab" id="step2header">
                                    <h5 class="mb-0">
                                        <a data-toggle="collapse" data-parent="#cart-steps-accordion"
                                            href="#step2contentid" aria-expanded="true" aria-controls="step2contentid"
                                            class="text-uppercase header"><span class="steps">ĐẶT HÀNG</span>
                                            <span class="label">Thông tin khách hàng</span>
                                            <i class="fa fa-chevron-right float-right"></i>
                                        </a>
                                    </h5>
                                </div>
                                <div id="step2contentid" class="collapse in" role="tabpanel"
                                    aria-labelledby="step2header" class="stepscontent">
                                    <div class="card-body">
                                        <form id="form-checkout" class="form-diachigiaohang" method="POST" action="{{URL::to('/payment')}}">
                                            {{csrf_field()}}
                                            <div class="form-label-group">
                                                <input type="text" id="inputName" class="form-control"
                                                    placeholder="Nhập họ và tên" name="name" required autofocus value="{{Session::get('user')->hoten}}">
                                            </div>
                                            <div class="form-label-group">
                                                <input type="text" id="inputPhone" class="form-control"
                                                    placeholder="Nhập số điện thoại" name="phone" required value="{{Session::get('user')->sodienthoai}}">
                                            </div>
                                            
                                            <div class="form-label-group">
                                                <input type="text" id="inputAddress" class="form-control"
                                                    placeholder="Nhập Địa chỉ giao hàng" name="address" required value="{{Session::get('user')->diachi}}">
                                            </div>
                                            
                                            <div class="form-label-group">
                                                <textarea type="text" id="inputNote" class="form-control"
                                                    placeholder="Nhập ghi chú (Nếu có)" name="note" ></textarea>
                                            </div>
                                        
                                            <button class="btn btn-lg btn-block btn-signin text-uppercase text-white" type="submit"
                                                style="background: #F5A623">Đặt mua</button>
                                        </form>
                                    </div>
                                </div>
                        @else    
                            <div class="card">
                                <div class="card-header cardheader" role="tab" id="step1header">
                                    <h5 class="mb-0">
                                        <a data-toggle="collapse" data-parent="#cart-steps-accordion"
                                            href="#step1contentid" aria-expanded="true" aria-controls="step1contentid"
                                            class="text-uppercase header"><span class="steps">1</span>
                                            <span class="label">VUI LÒNG ĐĂNG NHẬP ĐỂ MUA HÀNG</span>
                                            <i class="fa fa-chevron-right float-right"></i>
                                        </a>
                                    </h5>
                                </div>
                                <div id="step1contentid" class="collapse in" role="tabpanel"
                                    aria-labelledby="step1header" class="stepscontent">
                                    <div class="card-body p-0">
                                        <nav>
                                            <div class="nav nav-tabs dangnhap-dangky" id="nav-tab" role="tablist">
                                                <a class="nav-item nav-link active text-center text-uppercase"
                                                    id="nav-dangnhap-tab" data-toggle="tab" href="#nav-dangnhap"
                                                    role="tab" aria-controls="nav-dangnhap" aria-selected="true">Đăng
                                                    nhập</a>
                                                <a class="nav-item nav-link text-center text-uppercase"
                                                    id="nav-dangky-tab" data-toggle="tab" href="#nav-dangky" role="tab"
                                                    aria-controls="nav-dangky" aria-selected="false">Đăng ký</a>
                                            </div>
                                        </nav>
                                        <div class="tab-content" id="nav-tabContent">
                                            <div class="tab-pane fade show active" id="nav-dangnhap" role="tabpanel"
                                                aria-labelledby="nav-dangnhap-tab">
                                                <!-- Xử lí đăng nhập -->
                                                <form id="form-signin-cart" class="form-signin mt-2" 
                                                        method="POST" action="{{URL::to('/login-cart')}}" >
                                                        {{ csrf_field() }}
                                                    <div class="form-label-group">
                                                        <input type="email" id="inputemail" class="form-control"
                                                            placeholder="Nhập địa chỉ email" name="email" required
                                                            autofocus>
                                                    </div>
                                                    <div class="form-label-group">
                                                        <input type="password" id="inputPassword" class="form-control"
                                                            placeholder="Mật khẩu" name="password" required>
                                                    </div>
                                                    <div class="custom-control custom-checkbox mb-3">
                                                        <a href="#" class="float-right text-decoration-none"
                                                            style="color: #F5A623">Quên mật khẩu</a>
                                                    </div>
                                                    <button
                                                        class="btn btn-lg btn-block btn-signin text-uppercase text-white"
                                                        type="submit" style="background: #F5A623">Đăng nhập</button>

                                                    
                                                    <button class="btn btn-lg btn-google btn-block text-uppercase"
                                                        type="submit"><i class="fab fa-google mr-2"></i> Đăng nhập bằng
                                                        Google</button>
                                                    <button class="btn btn-lg btn-facebook btn-block text-uppercase"
                                                        type="submit"><i class="fab fa-facebook-f mr-2"></i> Đăng nhập
                                                        bằng Facebook</button>
                                                </form>
                                                
                                            </div>
                                            <div class="tab-pane fade" id="nav-dangky" role="tabpanel"
                                                aria-labelledby="nav-dangky-tab">
                                                        <!-- đăng kí -->
                                                <form id="form-signup-cart" class="form-signin mt-2" 
                                                    method="POST" action="{{URL::to('/signin-cart')}}" >
                                                    {{ csrf_field() }}
                                                    <div class="form-label-group">
                                                        <input type="text" id="inputName" class="form-control"
                                                            placeholder="Nhập họ và tên" name="hoten" required autofocus>
                                                    </div>
                                                    <div class="form-label-group">
                                                        <input type="text" id="inputPhone" class="form-control"
                                                            placeholder="Nhập số điện thoại" name="sodienthoai" required>
                                                    </div>
                                                    <div class="form-label-group">
                                                        <input type="email" id="inputemail" class="form-control"
                                                            placeholder="Nhập địa chỉ email" name="email" required>
                                                    </div>

                                                    <div class="form-label-group">
                                                        <input type="password" id="inputPassword" class="form-control"
                                                            placeholder="Nhập mật khẩu" name="password" required>
                                                    </div>
                                                    <!-- <div class="form-label-group mb-3">
                                                        <input type="password" id="inputConfirmPassword"
                                                            class="form-control" name="confirm_password"
                                                            placeholder="Nhập lại mật khẩu" required>
                                                    </div> -->
                                                   
                                                    
                                                    <button
                                                        class="btn btn-lg btn-block btn-signin text-uppercase text-white mt-3"
                                                        type="submit" style="background: #F5A623">Đăng ký</button>

                                                </form>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif   
                        <!-- @endif  -->
                            </div>    
                        </div>
                    </div>
                  
                </div>
                @endif   
                <!-- het row  -->
            </div>
            <!-- het cart-page  -->
        </div>
        <!-- het container  -->
    </section>
    <script></script>
@endsection