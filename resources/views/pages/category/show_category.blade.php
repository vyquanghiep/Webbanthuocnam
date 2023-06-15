@extends('welcome')
@section('content')
<link rel="stylesheet" href="{{asset('public/frontend/css/product-item.css')}}">

<!-- thanh "danh muc sach" đã được ẩn bên trong + hotline + ho tro truc tuyen -->
<section class="duoinavbar">
        <div class="container text-white">
            <div class="row justify">
                <div class="col-lg-3 col-md-5">
                    <div class="categoryheader">
                        <div class="noidungheader text-white">
                            <i class="fa fa-bars"></i>
                            <span class="text-uppercase font-weight-bold ml-1">Danh mục sản phẩm</span>
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
   <!-- khoi sach moi  -->
   <section class="_1khoi sachmoi bg-white">
        <div class="container">
            <div class="noidung" style=" width: 100%;">
                <div class="row">
                    <!--header-->
                    <div class="col-12 d-flex justify-content-between align-items-center pb-2 bg-transparent pt-4">
                    @foreach($category_name as $key  => $name)
                        <h1 class="header text-uppercase" style="font-weight: 400;">
                          {{$name->danhmuc}}
                        </h1>
                    @endforeach    
                    
                    </div>
                </div>
               
                <div class="items">
                    <div class="row">
                            @foreach($category_by_id as $key => $product)
                            <div class="col-lg-3 col-md-4 col-xs-6 item DeanGraziosi">
                                
                                <div class="card ">
                                    <a href="{{URL::to('/chi-tiet-san-pham/'.$product->masanpham)}}" class="motsanpham"
                                        style="text-decoration: none; color: black;" data-toggle="tooltip"
                                        data-placement="bottom" title="Lập Kế Hoạch Kinh Doanh Hiệu Quả">
                                        <img class="card-img-top anh" style=" height: 160px;" src="{{URL::to(''.$product->anhurl)}}"
                                            alt="lap-ke-hoach-kinh-doanh-hieu-qua">
                                        <div class="card-body noidungsp mt-3">
                                            <h6 class="card-title ten">{{$product->tensanpham}}</h6>
                                            
                                            <div class="gia d-flex align-items-baseline">
                                             
                                            <div class="giamoi">{{$product->gia}} đ</div>
                                               
                                            </div>
                                          
                                        </div>
                                    </a>
                                </div>
                            
                            </div>
                            @endforeach    
                        
                    </div>
                </div>
            </div>
        </div>
    </section>

   


@endsection