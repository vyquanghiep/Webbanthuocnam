@extends('welcome')
@section('content')
    <!-- trang detail  -->
    <link rel="stylesheet" href="{{asset('public/frontend/css/product-item.css')}}">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
<script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>


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


<!-- nội dung của trang  -->
<section class="product-page mb-4">
        <div class="container">
            <!-- chi tiết 1 sản phẩm -->
            @foreach($product_details as $key =>$value)
            @foreach($product_summary2 as $key => $anh)
            <div class="product-detail bg-white p-4">
                <div class="row">
                    <!-- ảnh  -->
                    <div class="col-md-5 khoianh">
                        <div class="anhto mb-4">
                            <a class="active" href="{{URL::to(''.$value->anhurl)}}" data-fancybox="thumb-img">
                                <img class="product-image" src="{{URL::to(''.$value->anhurl)}}"  style="width: 100%; height:350px;">
                            </a>
                            <a href="{{URL::to(''.$value->anhurl)}}" data-fancybox="thumb-img"></a>
                        </div>
                       <div class="list-anhchitiet d-flex mb-4" style="margin-left: 2rem;">
                            <img class="thumb-img thumb1 mr-3" src="{{URL::to(''.$value->anhurl)}}" class="img-fluid" >
                            <img class="thumb-img thumb2" src="{{URL::to(''.$anh->anhurl)}}" class="img-fluid" >
                        </div>
                    </div> 
                    <!-- thông tin sản phẩm: tên, giá bìa giá bán tiết kiệm, các khuyến mãi, nút chọn mua.... -->
                    <div class="col-md-7 khoithongtin">
                        <div class="row">
                            <div class="col-md-12 header">
                                <h4 style="font-size: 29px;">{{$value->tensanpham}}</h4>
                                
                                
                            </div>
                            
                            <div class="col-md-7">
                                <div class="gia">
                                
                                    <div class="giaban"> <b style="margin-left: 0px; font-size: 17px; color: black;">Giá bán:</b>
                                        <span class="" style="margin-left: 0px; font-size: 27px; color: red;"><b>{{number_format($value->gia)}} đ</b></span><b style="margin-left: 0px; font-size: 27px; color: black;">/Kg</b></div>
                                    <div class="tietkiem"> 
                                    </div>
                                </div>
                            
                                <div class="">
                                    
                                <b>{{$value->mota}}</b>
                                <br/><br/>
                                <p>Số lượng còn: <b>{{$value->soluong}} Kg</b></p> 
                                </div>
                            <form action="{{URL::to('/save-cart')}}" method="POST">
                                {{csrf_field()}}
                               
                                <div class="soluong d-flex">
                                    <label class="font-weight-bold">Số lượng: </label>
                                    <div class="input-number input-group mb-3">
                                       <!-- <div class="input-group-prepend">
                                            <span class="input-group-text btn-spin btn-dec">-</span>
                                        </div> -->
                                        <input type="number"  min ="1" value="1" class="soluongsp  text-center" name ="qty" max="{{$value->soluong}}" >
                                        <input type="hidden"   value="{{$value->masanpham}}"  name ="product_id_hidden" >
                                        <!--<div class="input-group-append">
                                            <span class="input-group-text btn-spin btn-inc">+</span>
                                        </div> -->
                                    </div>
                                </div>
                                <button class="nutmua btn w-100 text-uppercase" type="submit">
                                    <i> Chọn mua </i>
                                </button>
                            </form>
                                
                               
                            </div>
                            <!-- thông tin khác của sản phẩm:  tác giả, ngày xuất bản, kích thước ....  -->
                            <div class="col-md-5">
                                <div class="thongtinsach">
                                <ul>
                                        <li><b>Miễn phí giao hàng: </b>Cho đơn hàng từ 150.000đ ở Quận Hải Châu và từ 300.000đ ở các nơi khác trong phạm vi thành phố Đà Nẵng </li>
                                        <li><b>Tư vấn tận tâm:</b>Chúng tôi hân hạnh được tư vấn cho quý khách</li>
                                        <li><b>Bảo đảm:</b>Quý khách nhận hàng kiểm tra rồi thanh toán</li>
                                        <li><b>giao hàng nhanh:</b>1-2 ngày</li>
                                    </ul>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                
                    <!-- decripstion của 1 sản phẩm: giới thiệu , đánh giá độc giả  -->
                    <div class="product-description col-md-9">
                        <!-- 2 tab ở trên  -->
                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <a class="nav-item nav-link active text-uppercase" id="nav-gioithieu-tab"
                                    data-toggle="tab" href="#nav-gioithieu" role="tab" aria-controls="nav-gioithieu"
                                    aria-selected="true">MÔ TẢ THẢO DƯỢC
                                </a>
                                <a class="nav-item nav-link text-uppercase" id="nav-danhgia-tab" data-toggle="tab"
                                    href="#nav-binhluan" role="tab" aria-controls="nav-danhgia"
                                    aria-selected="false">ĐÁNH GIÁ ({{$count_bl}})
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
                                <h4>{{$value->tensanpham}}</h4>
                                @foreach($product_summary as $key => $motachitiet)
                                
                                <h6>{{$motachitiet->gioithieu}}</h6>
                                </br>
                                <img src="{{$value->anhurl}}" class="center" style="width: 100%; height:450px;"></br>
                                <h6 class="tieude font-weight-bold">Thành phần</h6>
                                <p class="mota">{{$motachitiet->thanhphan}} </p> 
                                <h6 class="tieude font-weight-bold">Tác dụng</h6>
                                <p class="mota">{{$motachitiet->tacdung}}</p> 
                                <h6 class="tieude font-weight-bold">Cách dùng</h6>
                                <img src="{{$anh->anhurl}}" class="center" style="width: 100%; height:450px;"></br>
                                <p class="mota">{{$motachitiet->cachdung}}</p> 
                                <h6 class="tieude font-weight-bold">Lưu ý</h6>
                                <p class="mota">{{$motachitiet->luuy}}</p> 
                                <h6 class="tieude font-weight-bold"></h6>
                                
                                @endforeach
                                </br><h4>Chính sách bán hàng tại<a href="{{URL::to('/trang-chu')}}" > Thuốc nam Lê Thanh</a></h4>
                                <div class="chinh-sach" style="margin-left: 20px;">
                                <ul>
                                    <li class="dong">Trước khi giao tới tận tay khách hàng sản phẩm đã được kiểm định nghiêm ngặt, kĩ lưỡng</li>
                                    <li class="dong">Không sử dụng hóa chất trong quá trình bảo quản, an toàn cho sức khỏe người sử dụng.</li>
                                    <li class="dong">Phát hiện hàng giả, không đúng sản phẩm bồi thường gấp 5 lần giá trị đơn hàng.</li>
                                    <li class="dong">Chuyển phát tại Đà Nẵng từ 1 - 2 ngày, nhận hàng kiểm tra mới thanh toán.</li>
                                </div>
                                <p style="color:red; text-align: center;">Chúng tôi cam kết cung cấp sản phẩm đảm bảo, tư vấn hoàn toàn miễn phí. Nhân viên chăm sóc khách hàng của chúng tôi rất hân hạnh được phục vụ quý khách.</p>
                                
                            </div>

                          

                            <!-- nav-binhluan -->
                            
                            <div class="tab-pane fade" id="nav-binhluan" role="tabpanel"
                                aria-labelledby="nav-gioithieu-tab">
                                <!-- hienthi binhluan -->
                                <style type="text/css">
                                    .style_comment{
                                        border: 1px solid #ddd;
                                        border-radius: 10px;
                                        background:#F0F0E9;
                                    }
                                </style>    
                                <form>
                                @csrf
                                    <div id="comment_show"></div>
                                    <input type="hidden" name="comment_product_id" class="comment_product_id" value="{{$value->masanpham}}">
                                    <input type="hidden" name="comment_nd_id" class="comment_nd_id" value="{{Session::get('user')->manguoidung}}">

                                
                                </form>
                            
                            
                                <!-- them binh luan -->
                                @if(Session::get('user')->maquyen != 3 )
                                <div class="col-md-5" style="margin-left:150px">
                                       
                                        <div class="tiledanhgia text-center">
                                        <div class="btn vietdanhgia mt-3">Viết bình luận của bạn</div>
                                            
                                        </div>
                                        
                                        <!-- nội dung của form đánh giá  -->
                                        <form action="#">
                                        
                                        <div class="formdanhgia">
                                        <div id="notify_comment"></div>
                                            <h6 class="tieude text-uppercase">GỬI BÌNH LUẬN CỦA BẠN</h6>
                                            <span class="danhgiacuaban">Bình luận của bạn về sản phẩm này:</span>
                                        
                                            <div class="form-group">
                                                <input type="text" class="comment_name" placeholder="Mời bạn nhập tên">
                                            </div>
                                            <div class="form-group">
                                                <input type="text" class="comment_email" disabled="disabled" value="{{Session::get('user')->email}}">
                                            </div>
                                            <div class="form-group" >
                                                <textarea name="binhluan" style="width:300px;height:120px" class="comment_content" > </textarea>
                                            </div>
                                            <button type="button" class="btn nutguibl send-comment">  Gửi bình luận</button>
                                            
                                        </div> 
                                    </form>
                                   
                                </div>
                                @endif  
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
        @endforeach
        <!-- het container  -->
    </section>
    <script>
        $('.chapter').html( $('.chap_options').val())
        $('#select_chapter').on('change', function(e) {
            $('.chapter').html( $(this).val())
        })
        
    </script>
      <style>
   .center {
  display: block;
  margin-left: auto;
  margin-right: auto;
  width: 100%;
  height: 400px;
}
.mota{
    text-align:justify;
}
</style>

    @endsection