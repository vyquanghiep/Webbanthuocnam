@extends('welcome')
@section('content')
<link rel="stylesheet" href="{{asset('public/frontend/css/product-item.css')}}">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
<script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>

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
    <section class="product-page mb-4">
    
    <div class="container">

     
      <div class="product-detail bg-white p-4">
        <div class="product-description col-md-9">
                        <!-- 2 tab ở trên  -->
                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <a class="nav-item nav-link active text-uppercase" id="nav-gioithieu-tab"
                                    data-toggle="tab" href="#nav-gioithieu" role="tab" aria-controls="nav-gioithieu"
                                    aria-selected="true">THÔNG TIN
                                </a>
                               
                                <a class="nav-item nav-link text-uppercase" id="nav-danhgia-tab" data-toggle="tab"
                                    href="#nav-binhluan" role="tab" aria-controls="nav-danhgia"
                                    aria-selected="false">CÂU HỎI THƯỜNG GẶP
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
                                aria-labelledby="nav-gioithieu-tab" style="height: 550px">
                               
                                
                                </br>
                                <p><b>TIỆM THUỐC NAM LÊ THANH </b></p>
                                

                                <p><b>Địa chỉ:</b>  Chợ Cồn, Ông Ích Khiêm, P. Hải  Châu 2, Q. Hải Châu, Tp. Đà Nẵng</p>

                                 <p><b>Điện thoại:</b> 0905117314</p>

                                <p><b>Email:</b>thuocnamlethanh.danang@gmail.com</p>
                                       
                                
                            </div>

                          

                            <!-- nav-binhluan -->
                            <div class="tab-pane fade" id="nav-binhluan" role="tabpanel"
                                aria-labelledby="nav-gioithieu-tab" style="height: 550px">
                                   
                                
                            
                                <!-- them binh luan -->
                                
                                
                                </br>
                                <p>Vui lòng đọc danh sách câu hỏi thường gặp trước khi gửi tin nhắn cho chúng tôi:</p>

                                <div class="tab">
                                <button class="tablinks" onmouseover="openCity(event, 'pttt')">Phương thức thanh toán, nhận hàng?</button>
                                <button class="tablinks" onmouseover="openCity(event, 'qtdathang')">Quy trình đặt hàng tại Website như thế nào?</button>
                                <button class="tablinks" onmouseover="openCity(event, 'tggiaohang')">Thời gian giao hàng bao lâu?</button>
                                <button class="tablinks" onmouseover="openCity(event, 'phigiaohang')">Phí giao hàng là bao nhiêu?</button>
                                <button class="tablinks" onmouseover="openCity(event, 'tm')">Những nơi khác ngoài Đà Nẵng có mua được sản phẩm không?</button>
                                </div>

                                <div id="pttt" class="tabcontent">
                                </br> 
                                <h4>Phương thức thanh toán, nhận hàng</h4>
                                <p>Chúng tôi áp dụng chương trình gửi hàng đi toàn quốc, để đảm bảo hàng hóa khi gửi chúng tôi liên kết với đơn vị vận chuyển riêng. Phương thức nhận hàng kiểm tra và thanh toán cho nhân viên chuyển phát.</p>
                                </div>

                                <div id="qtdathang" class="tabcontent">
                                </br>
                                <h4>Quy trình đặt hàng tại Website</h4>
                                <p>Sau khi đăng ký tài khản và đăng nhập.Khách hàng lựa chọn sản phẩm và đặt hàng. Nhân viên chăm sóc khách hàng của chúng tôi sẽ liên hệ ngay với bạn sau giờ làm việc hành chính để xác nhận đơn hàng. Sau khi xác nhận thành công hàng sẽ được gửi đi ngay cho quý khách.</p> 
                                </div>

                                <div id="tggiaohang" class="tabcontent">
                                </br>
                                <h4>Thời gian giao hàng</h4>
                                <p>Thời gian giao hàng thường giao động từ 1-2 ngày tùy thuộc vị trí giao hàng của bạn.</p>
                                </div>
                                <div id="phigiaohang" class="tabcontent">
                                </br>
                                <h4>Miễn phí giao hàng khi: </h4>
                                <p>Từ 150.000 VNĐ ở Quận Hải Châu</p>
                                <p>Từ 300.000 VNĐ ở trong Phạm vi TP.Đà Nẵng</p>
                                <h4>Phí giao hàng mặc định: </h4>
                                <p>15.000 VNĐ ở Quận Hải Châu</p>
                                <p>30.000 VNĐ ở trong Phạm vi TP.Đà Nẵng</p>
                                </div>
                                <div id="tm" class="tabcontent">
                                </br>
                                <h4>Chỉ trong phạm vi Thành phố Đà Nẵng </h4>
                                <p>Hiện tại, chúng tôi chỉ nhận giao gửi hàng trong thành phố Đà Nẵng, chưa có chính sách giao gửi hàng đi những nơi khác.</p>
                                
                                </div>

                                <div class="clearfix"></div> 
                                
                                    
                            </div>

                        </div>
                        <!-- het tab-content  -->
                    </div>
            </div>
  

    </section>
    <script>
function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}
</script>
    <style>


/* Style the tab */
.tab {
  float: left;
 
  background-color: #f1f1f1;
  width: 30%;
  height: 80px;
}

/* Style the buttons inside the tab */
.tab button {
  display: block;
  background-color: #00A03E;
  padding: 22px 16px;
  width: 100%;
  color: #fff;
  border:  1px solid #fff;
  outline: none;
  text-align: left;
  cursor: pointer;
  font-size: 17px;
  
}

/* Change background color of buttons on hover */
.tab button:hover {
  background-color: #F5A623;
}

/* Create an active/current "tab button" class */
.tab button.active {
  background-color: #F5A623;
}

/* Style the tab content */
.tabcontent {
  float: left;
  padding: 0px 12px;
  border: 1px solid #ccc;
  width: 70%;
  border-left: none;
  height: 507px;
  display: none;
}

/* Clear floats after the tab */
.clearfix::after {
  content: "";
  clear: both;
  display: table;
}
</style>
@endsection