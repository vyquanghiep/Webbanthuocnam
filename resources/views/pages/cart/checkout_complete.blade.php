@extends('welcome')
@section('content')
<?php
     use Gloudemans\Shoppingcart\Facades\Cart;
    $content =   Cart::content();
    
?>

<link rel="stylesheet" href="{{asset('public/frontend/css/gio-hang.css')}}">
   <!-- thanh tieu de "danh muc sach" + hotline + ho tro truc tuyen -->
   <section class="duoinavbar">
        <div class="container text-white">
            <div class="row justify">
                <div class="col-md-3">
                    <div class="categoryheader">
                        <div class="noidungheader text-white">
                            <i class="fa fa-bars"></i>
                            <span class="text-uppercase font-weight-bold ml-1">Danh mục sản phẩm</span>
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
<section class="content my-3">
        <div class="container">
            <div class="cart-page bg-white">
                <div class="row">
                    
                    
                    <!-- giao diện giỏ hàng khi không có item   -->
                    <div class="col-md-8 cart" style="margin-left:170px">
                        <div class="py-3 pl-3">
                            <h1  style="margin-left:150px">ĐẶT HÀNG THÀNH CÔNG</h1>
                            <div class="cart-empty-content w-100 text-center justify-content-center">
                                <img src="{{asset('public/frontend/images/672465.png')}}" alt="shopping-cart-not-product" width="200px">
                                <p>Hệ thống đã ghi nhận đơn hàng của bạn. Vui lòng chờ xét duyệt!</p>
                                <a href="{{URL::to('/trang-chu')}}" class="btn nutmuathem mb-3">Về trang chủ</a>
                            </div>
                        </div>
                    </div>
            
                    <!-- giao diện giỏ hàng khi có hàng  -->
                 
                  
                </div>
                
                <!-- het row  -->
            </div>
            <!-- het cart-page  -->
        </div>
        <!-- het container  -->
    </section>




@endsection