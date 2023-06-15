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
    <section class="product-page mb-4">
    
        <div class="container">

     
            <div class="product-detail bg-white p-4">
            
                
            
                    <div class="cf-title-03">
                    <h4>VỀ CHÚNG TÔI</h4>
                    </div>
                    <p>Thuốc nam Lê Thanh là một trong những đơn vị uy tín, lâu năm ở Thành phố Đà Nẵng trong lĩnh vực cung ứng các sản phẩm cây thuốc, cây dược liệu. Chúng tôi hiểu rằng sức khỏe là vốn quý nhất của con người, vì thế mà chúng tôi luôn lựa chọn những sản phẩm sạch, tốt nhất đến tay khách hàng.</p>
                    <h4>Giới thiệu về Tiệm thuốc nam Lê Thanh</h4>
                    <p>Tiệm thuốc nam Lê Thanh được khai trương vào tháng 6 năm 2018 bởi Y sĩ Lê Thanh. Với lợi thế liên kết với vùng trồng dược liệu sạch tại Nam Sơn (ở thôn Nam Sơn, xã Hòa Tiến, huyện Hòa Vang) và Tây Nguyên, nơi đây được thiên nhiên ưu ái với khí hậu ôn hòa, mát mẻ, thuận lợi cho việc trồng các cây dược liệu quý hiếm. Sau nhiều năm nghiên cứu và cấy trồng các giống cây thuốc, Tiệm thuốc nam Lê Thanh đã trở thành nơi buôn bán cây thuốc, dược liệu uy tín trong mắt người tiêu dùng tại Đà Nẵng.</p>
                    <img src="https://dangbodanang.vn/files/image/2023/1/1672642206428_thuocnamhoaphu.jpg" class="center"> </br>
                    <p>Ngoài ra, Thuốc nam Lê Thanh cung cấp đầy đủ các loại cây thuốc nam, dược liệu, đồ ngâm rượu với giá thành tốt nhất trên thị trường. Bạn sẽ không còn lo lắng về chi phí vì chúng rất rẻ so với số tiền bạn phải bỏ ra để điều trị bệnh.</p>

                    <p>Nhờ sự ủng hộ từ khách hàng và đối tác, Thuốc nam Lê Thanh đã tồn tại và phát triển đến ngày hôm nay với nhiều đơn hàng hơn. Từ đó, có cơ hội đưa sản phẩm của mình đến tay khách hàng tại Đà Nẵng.</p>
                    <h4>Sản phẩm tại thuốc nam Lê Thanh</h4>
                    <p>Khi bạn tìm kiếm các loại dược liệu, điều bạn quan tâm đầu tiên chính là cơ sở này có uy tín hay không?</p>

                    <p>Đến với Thuốc nam Lê Thanh bạn không chỉ mua được cây thuốc với chất lượng tốt nhất mà còn có được sản phẩm với giá thành rẻ nhất.</p>
                    <p>Các nhân viên tại Thuốc nam Lê Thanh đều có chuyên môn cao và luôn nhiệt tình với khách hàng. Chúng tôi muốn mỗi khách hàng mà chúng tôi chăm sóc đều nhận được dịch vụ và dược liệu tốt nhất. Đồng thời bạn cũng sẽ được tư vấn để hiểu rõ hơn về từng cây thuốc, tình trạng bệnh và cách sử dụng hợp lý.</p>
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/3/3e/C%E1%BB%ADa_h%C3%A0ng_thu%E1%BB%91c_nam.jpg/640px-C%E1%BB%ADa_h%C3%A0ng_thu%E1%BB%91c_nam.jpg" class="center"></br>
                    <h4>Tầm nhìn, sứ mệnh của Tiệm thuốc nam Lê Thanh</h4>
                    <p>Với khẩu hiệu: “Chỉ bán chất lượng, không bán số lượng”, Thuốc nam Lê Thanh luôn nỗ lực hết sức để tạo ra các sản phẩm vừa đáp ứng tiêu chuẩn, vừa đạt chất lượng cao nhất. Chúng tôi muốn giúp mọi người hiểu được tầm quan trọng của việc bảo vệ sức khỏe của mình và người thân. Hiểu được điều đó, bạn sẽ có cuộc sống lành mạnh, an tâm.</p>
                    <p>Tầm nhìn của chúng tôi là đến 2025, Thuốc nam Lê Thanh sẽ là đơn vị cung ứng dược liệu tại Đà Nẵng và Tây Nguyên. Chúng tôi sẽ giúp cho hàng ngàn người nâng cao ý thức sử dụng cây thuốc Nam.</p>
                    
                    <h4>Chính sách bán hàng tại<a href="{{URL::to('/trang-chu')}}" > Thuốc nam Lê Thanh</a></h4>
                    <div class="chinh-sach" style="margin-left: 20px;">
                    <ul>
                        <li class="dong">Trước khi giao tới tận tay khách hàng sản phẩm đã được kiểm định nghiêm ngặt, kĩ lưỡng</li>
                        <li class="dong">Không sử dụng hóa chất trong quá trình bảo quản, an toàn cho sức khỏe người sử dụng.</li>
                        <li class="dong">Phát hiện hàng giả, không đúng sản phẩm bồi thường gấp 5 lần giá trị đơn hàng.</li>
                        <li class="dong">Chuyển phát tại Đà Nẵng từ 1 - 2 ngày, nhận hàng kiểm tra mới thanh toán.</li>
                    </div>
                    <p style="color:red; text-align: center;">Chúng tôi cam kết cung cấp sản phẩm đảm bảo, tư vấn hoàn toàn miễn phí. Nhân viên chăm sóc khách hàng của chúng tôi rất hân hạnh được phục vụ quý khách.</p>
                </div>
            
        </div>
        
    </section>
    <style>
        /* === CODFE HEADING STYLE #3 === */
.cf-title-03 h4 {
  font-size: 24px;
  font-weight: 500;
  letter-spacing: 0;
  line-height: 1.5em;
  padding-bottom: 15px;
  position: relative;
}
.cf-title-03 h4:before {
  content: "";
  position: absolute;
  left: 0;
  bottom: 0;
  height: 5px;
  width: 55px;
  background-color: #00A03E;
}
.cf-title-03 h4:after {
  content: "";
  position: absolute;
  left: 0;
  bottom: 2px;
  height: 1px;
  width: 95%;
  max-width: 255px;
  background-color: #00A03E;
}
.center {
  display: block;
  margin-left: auto;
  margin-right: auto;
  width: 70%;
  height: 400px;
}
li.dong {
   margin:0 0 10px 0;   
}
    </style>

    @endsection