@extends('AdminLayout')
@section('admin_content')
<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
<link rel="stylesheet" href="{{asset('public/backend/css/styledashb.css')}}">
<script src="{{asset('public/backend/js/dashb.js')}}"></script>



    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-primary" style="background:#DDEDE0;" >
                <div class="panel-heading"
                    style="font-size: 2rem; background: #02796E">
                    Tổng Quan
                </div>
                <div class="panel-body">
                    
                       
                        <!-- page -->
    <div class="content">
        <main>
                        <div class="head-title">
							<div class="left">
							<h1>Tổng quan</h1>
							<ul class="breadcrumb">
						<li>
							<a href="#">Tổng quan</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="#">Trang chủ</a>
						</li>
					</ul>
				</div>
				</div>

			<ul class="box-info">
				<li>
					<i class='bx bxs-calendar-check' ></i>
					<span class="text">
						<h3>{{$order_count_succes}}</h3>
						<p>Đơn hàng đã giao</p>
					</span>
				</li>
				<li>
					<i class='bx bxs-calendar-check' ></i>
					<span class="text">
						<h3>{{$order_count_fail}}</h3>
						<p>Đơn hàng bị huỷ</p>
					</span>
				</li>
				<li>
					<i class='bx bxs-calendar-check' ></i>
					<span class="text">
						<h3> {{$product_count}}</h3>
						<p>Sản phẩm</p>
					</span>
				</li>
				<li>
					<i class='bx bxs-group' ></i>
					<span class="text">
						<h3>{{$cus_count}}</h3>
						<p>Khách hàng</p>
					</span>
				</li>
				
				
				
			</ul>
			</br>
			
					
			<div class="table-data">
				<div class=""  style="width:67%">
				
					<div class="head" >
						<h3>Biểu đồ Thống kê doanh thu theo tháng trong năm 2023</h3>
						<i class='bx bx-search' ></i>
						<i class='bx bx-filter' ></i>
					</div>
					
					<canvas id="revenueChart"></canvas>
					
				</div>
				
			
				<div class=""style="width:30%">
						<div class="head">
							<h3>Tỷ lệ đơn hàng</h3>
							<i class='bx bx-plus' ></i>
							<i class='bx bx-filter' ></i>
						</div>
						
						<canvas id="pieChart"  ></canvas>
						
				</div>
			</div>
		</main>
	
		</div>          
                    
                </div>
            </div>
        </div>

		<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
		

		<script>
        // Lấy dữ liệu biểu đồ từ biến PHP
        var chartData = @json($chartData);

        // Chuẩn bị dữ liệu cho biểu đồ
        var labels = Object.keys(chartData);
        var data = Object.values(chartData);
		var ctx = document.getElementById('revenueChart').getContext('2d');
        var chart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Doanh thu',
                    data: data,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
	<script>
        document.addEventListener('DOMContentLoaded', function() {
            var ctx = document.getElementById('pieChart').getContext('2d');
            var pieChart = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: ['Đơn hàng đã giao', 'Đơn hàng bị huỷ  ','Đơn hàng chưa giao', 'Đơn hàng chưa duyệt'],
                    datasets: [{
                        data: [{{ $successfulOrders }}, {{ $cancelledOrders }},{{ $successfulOrders1 }}, {{ $successfulOrders0 }}],
                        backgroundColor: ['#36a2eb', '#ff6384','#F0C300','#001C32'],
                        borderWidth: 1,
						
                    }]
                },
                options: {
                    responsive: true,
                    title: {
                        display: true,
                        text: 'Order Status',
                        fontSize: 20
                    }
                }
            });
        });
    </script>

@endsection

			