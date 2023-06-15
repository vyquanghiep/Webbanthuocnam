@extends('welcome')
@section('content')

<link rel="stylesheet" href="{{asset('public/frontend/css/product-item.css')}}">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
<script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
<!-- header -->
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
    <section class="product-page mb-4">
        <div class="container">
            <!-- chi tiết 1 sản phẩm -->
            @foreach($post_details as $key =>$value2)

            <div class="product-detail bg-white p-4">
              
                    <h3>{{$value2->tieude}}</h3>
                    <p>{{$value2->mota}}</p>
                    <img src="{{URL::to(''.$value2->anhurl)}}" class="center"></br>
                    
                    
                    <!-- decripstion của 1 sản phẩm: giới thiệu , đánh giá độc giả  -->
                    <div class="product-description col-md-9" style="margin-left: 100px;">
                        <!-- 2 tab ở trên  -->
                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <a class="nav-item nav-link active text-uppercase" id="nav-gioithieu-tab"
                                    data-toggle="tab" href="#nav-gioithieu" role="tab" aria-controls="nav-gioithieu"
                                    aria-selected="true">Nội dung bài viết
                                </a>
                               
                                <a class="nav-item nav-link text-uppercase" id="nav-danhgia-tab" data-toggle="tab"
                                    href="#nav-binhluan" role="tab" aria-controls="nav-danhgia"
                                    aria-selected="false">Bài thuốc hay
                                </a>
                                <!-- <a class="nav-item nav-link text-uppercase" id="nav-danhgia-tab" data-toggle="tab"
                                    href="#nav-danhgia" role="tab" aria-controls="nav-danhgia"
                                    aria-selected="false">Đánh
                                    giá của độc giả
                                </a> -->
                            </div>
                        </nav>
                        <!-- nội dung của từng tab  -->
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active ml-3" id="nav-gioithieu" role="tabpanel"
                                aria-labelledby="nav-gioithieu-tab">
                                </br>
                                <small class="tacgia text-muted">Chuyên mục: sống khoẻ mỗi ngày</small>
                                <h6 class="tieude font-weight-bold">{{$value2->tensanpham}}</h6>
                               
                                <p class="mota">{!!$value2->noidung!!}</p>
                                <b>Chúng tôi mong rằng với thông tin mình chia sẻ. Bạn sẽ không còn cảm thấy quá bỡ ngỡ về thảo dược này. Cảm ơn các bạn đã quan tâm theo dõi bài viết.</b>
                                
                            </div>
                           
                           

                            <!-- nav-binhluan -->
                            <div class="tab-pane fade" id="nav-binhluan" role="tabpanel"
                                aria-labelledby="nav-gioithieu-tab">
                                <!-- hienthi binhluan -->
                              
                                <p class="mota">{!!$value2->baithuoc!!}</p>
                            
                                <!-- them binh luan -->
                                
                                <div class="col-md-5" style="margin-left:150px">
                                        
                                </div>
                                    
                            </div>

                        </div>
                        <!-- het tab-content  -->
                    </div>
                    <!-- het product-description -->
                </div>
                <!-- het row  -->
            </div>
            <!-- het product-detail -->
        </div>
        @endforeach
        <!-- het container  -->
    </section>
    <style>
    .center {
  display: block;
  margin-left: auto;
  margin-right: auto;
  width: 75%;
  height: 400px;
}
.center2 {
  display: block;
  margin-left: auto;
  margin-right: auto;
  width: 100%;
  height: 400px;
}
.mota{
    text-align: justify;
}
</style>
  
<!-- chitietbaidang -->
@endsection