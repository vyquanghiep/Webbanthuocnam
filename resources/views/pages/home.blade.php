@extends('welcome')
@section('content')


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
     <!-- noi dung danh muc sach(categories) + banner slider -->
     <section class="header bg-light">
        <div class="container">
        
            <div class="row">
                <div class="col-md-3" style="margin-right: -15px;">
                    <!-- CATEGORIES -->
                    <div class="categorycontent" >
                        <ul >
                            @foreach($danhmuc as $key => $cate)
                            <li> <a href="{{URL::to('/danh-muc-san-pham/'.$cate->madanhmuc)}}">{{$cate->danhmuc}}</a><i class="fa fa-chevron-right float-right"></i>
                              
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <!-- banner slider  -->
                <div class="col-md-9 px-0">
                    <div id="carouselId" class="carousel slide" data-ride="carousel">
                        <ol class="nutcarousel carousel-indicators rounded-circle">
                            <li data-target="#carouselId" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselId" data-slide-to="1"></li>
                            <li data-target="#carouselId" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <a href="#"><img src="{{asset('public/frontend/images/iconfooter/bannerxtl.png')}}" class="img-fluid"
                                        style="height: 386px;" width="900px" alt="First slide"></a>
                            </div>
                            <div class="carousel-item">
                                <a href="#"><img src="{{asset('public/frontend/images/iconfooter/chatluong3.png')}}" class="img-fluid"
                                        style="height: 386px;" width="900px" alt="Second slide"></a>
                            </div>
                          
                        </div>
                        <a class="carousel-control-prev" href="#carouselId" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselId" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- san pham ban chay  -->
    <section class="_1khoi sachmoi bg-white">
        <div class="container">
            <div class="noidung" style=" width: 100%;">
                <div class="row">
                    <!--header-->
                    <div class="col-12 d-flex justify-content-between align-items-center pb-2 bg-transparent pt-4">
                        <h1 class="header text-uppercase" style="font-weight: 600;">Sản phẩm bán chạy</h1>
                        <a href="{{URL::to('/product_hot')}}" class="btn btn-warning btn-sm text-white">Xem tất cả</a>
                    </div>
                </div>
                <div class="khoisanpham" style="padding-bottom: 2rem;">
                    <!-- 1 san pham -->
                    @foreach($all_product as $key => $product)
                    <div class="card">
                        <a href="{{URL::to('/chi-tiet-san-pham/'.$product->masanpham)}}" class="motsanpham"
                            style="text-decoration: none; color: black;" data-toggle="tooltip" data-placement="bottom"
                            title="Lập Kế Hoạch Kinh Doanh Hiệu Quả">
                            <img class="card-img-top anh" style=" height: 160px;" src="{{URL::to(''.$product->anhurl)}}"
                                alt="lap-ke-hoach-kinh-doanh-hieu-qua">
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

    <!-- san pham moi  -->
    <section class="_1khoi combohot mt-4">
        <div class="container">
            <div class="noidung bg-white" style=" width: 100%;">
                <div class="row">
                    <!--header -->
                    <div class="col-12 d-flex justify-content-between align-items-center pb-2 bg-light">
                        <h2 class="header text-uppercase" style="font-weight: 600;">Sản phẩm mới</h2>
                        <a href="{{URL::to('/product_new')}}" class="btn btn-warning btn-sm text-white">Xem tất cả</a>
                    </div>
                </div>
                <div class="khoisanpham">
                @foreach($all_product2 as $key => $product)
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

    <!-- khoi sach sap phathanh  -->
    <section class="_1khoi sapphathanh mt-4">
        <div class="container">
            <div class="noidung bg-white" style=" width: 100%;">
                <div class="row">
                    <!--header-->
                    <div class="col-12 d-flex justify-content-between align-items-center pb-2 bg-light">
                        <h2 class="header text-uppercase" style="font-weight: 600;">Sản phẩm chất lượng cao</h2>
                        <a href="{{URL::to('/product_vip')}}" class="btn btn-warning btn-sm text-white">Xem tất cả</a>
                    </div>
                </div>
                <div class="khoisanpham">
                    <!-- 1 san pham -->
                    @foreach($all_product3 as $key => $product)
                    <div class="card">
                        <a href="{{URL::to('/chi-tiet-san-pham/'.$product->masanpham)}}" class="motsanpham" style="text-decoration: none; color: black;"
                            data-toggle="tooltip" data-placement="bottom" title="Ngoại giao Của Chính Quyền Sài Gòn">
                            <img class="card-img-top anh" style=" height: 160px;" src="{{URL::to(''.$product->anhurl)}}"
                                alt="ngoai-giao-cua-chinh-quyen-sai-gon">
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


    <!-- div _1khoi -- khoi sachnendoc -->
    <section class="_1khoi sapphathanh mt-4">
        <div class="container">
            <div class="noidung bg-white" style=" width: 100%;">
                <div class="row">
                    <!--header-->
                    <div class="col-12 d-flex justify-content-between align-items-center pb-2 bg-light">
                        <h2 class="header text-uppercase" style="font-weight: 600;">Bài viết - Sống khoẻ</h2>
                        <a href="{{URL::to('/bai-dang')}}" class="btn btn-warning btn-sm text-white">Xem tất cả</a>
                    </div>
                </div>
                <div class="khoisanpham">
                    <!-- 1 san pham -->
                    @foreach($all_product4 as $key => $post)
                    <div class="card">
                        <a href="{{URL::to('/chi-tiet-post/'.$post->mabaidang)}}" class="motsanpham" style="text-decoration: none; color: black;"
                            data-toggle="tooltip" data-placement="bottom" title="Ngoại giao Của Chính Quyền Sài Gòn">
                            <img class="card-img-top anh" style=" height: 160px;" src="{{URL::to(''.$post->anhbaidangurl)}}"
                                alt="ngoai-giao-cua-chinh-quyen-sai-gon">
                                <div class="card-body noidungsp mt-3">
                                    <h3 class="card-title ten">{{$post->tieude}}</h3>
                                    
                                    <div><a class="detail" href="{{URL::to('/chi-tiet-post/'.$post->mabaidang)}}">Xem chi tiết ></a></div>
                                </div>
                                <br/>
                        </a>
                    </div>
                    @endforeach
  
                
                </div>
            </div>
        </div>
    </section>
    


@endsection