@extends('welcome')
@section('content')
<link rel="stylesheet" href="{{asset('public/frontend/css/product-item.css')}}">
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
                            @foreach($category as $key => $cate)
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
    <section class="_1khoi sachmoi bg-white">
        <div class="container">
            <div class="noidung" style=" width: 100%; margin-bottom: 10px; padding: 5px;">
                <div class="row">
                    <!--header-->
                    <div class="col-12 d-flex justify-content-between align-items-center pb-2 bg-transparent pt-4">
                        <h1 class="header" style="font-weight: 400;">
                          BÀI VIẾT HAY - SỐNG KHOẺ
                        </h1>
                    
                    </div>
                </div>
                <div class="items" style="">
                    <div class="row">
                        @foreach($all_post as $key => $post)
                            <div class="col-lg-3 col-md-4 col-xs-6 item DeanGraziosi">
                                
                                <div class="card ">
                                    <a href="{{URL::to('/chi-tiet-post/'.$post->mabaidang)}}" class="motsanpham"
                                        style="text-decoration: none; color: black;" data-toggle="tooltip"
                                        data-placement="bottom" title="Lập Kế Hoạch Kinh Doanh Hiệu Quả">
                                        <img class="card-img-top anh" style=" height: 160px;" src="{{URL::to(''.$post->anhbaidangurl)}}"
                                            alt="lap-ke-hoach-kinh-doanh-hieu-qua">
                                        <div class="card-body noidungsp mt-3">
                                            <h6 class="card-title ten">{{$post->tieude}}</h6>
                                            <small class="tacgia text-muted">Chuyên mục: sống khoẻ mỗi ngày</small>
                                            <div class="gia d-flex align-items-baseline">
                                            <div><a class="detail" href="{{URL::to('/chi-tiet-post/'.$post->mabaidang)}}">Xem chi tiết ></a></div></br>
                                              
                                                
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

    <section class="_1khoi combohot mt-4">
        <div class="container">
            <div class="noidung bg-white" style=" width: 100%;">
                <div class="row">
                    <!--header -->
                    <div class="col-12 d-flex justify-content-between align-items-center pb-2 bg-light">
                        <h2 class="header text-uppercase" style="font-weight: 500;">Gợi ý - sản phẩm mới</h2>
                        <a href="{{URL::to('/product_new')}}" class="btn btn-warning btn-sm text-white">Xem tất cả</a>
                    </div>
                </div>
                <div class="khoisanpham">
                @foreach($all_product as $key => $product)
                    <div class="card">
                        <a href="{{URL::to('/chi-tiet-san-pham/'.$product->masanpham)}}" class="motsanpham"
                            style="text-decoration: none; color: black;" data-toggle="tooltip" data-placement="bottom"
                            title="Lập Kế Hoạch Kinh Doanh Hiệu Quả">
                            <img class="card-img-top anh" style=" height: 160px;" src="{{URL::to(''.$product->anhurl)}}"
                                alt="lap-ke-hoach-kinh-doanh-hieu-qua" >
                            <div class="card-body noidungsp mt-3">
                                <h3 class="card-title ten">{{$product->tensanpham}}</h3>
                                
                                <div class="gia d-flex align-items-baseline">
                                    <div class="giamoi">{{number_format($product->gia)}} ₫</div> 
                                </div>
                              
                            </div>
                        </a>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
    </section>
</br>


@endsection