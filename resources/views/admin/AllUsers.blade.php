@extends('AdminLayout') 
@section('admin_content') 
<!-- <h1>davaddsf</h1> -->
<div class="panel panel-primary" >
                <div class="panel-heading"
                    style="font-size: 2rem; background: #02796E">
      Danh sách người dùng hệ thống
    </div> 
    <div class="row w3-res-tb"> 
      <div class="col-sm-5 m-b-xs"> 
        <select class="input-sm form-control w-sm inline v-middle"> 
          <option value="1">Khoá</option> 
          <option value="0">Chưa khoá</option> 
           
        </select> 
        <button class="btn btn-sm btn-default">Apply</button>                 
      </div> 
      <div class="col-sm-4"> 
      </div> 
      <div class="col-sm-3"> 
        <div class="input-group"> 
          <input type="text" class="input-sm form-control" placeholder="Search"> 
          <span class="input-group-btn"> 
            <button class="btn btn-sm btn-default" type="button">Go!</button> 
          </span> 
        </div> 
      </div> 
    </div> 
    <div class="table-responsive" > 
      <table class="table table-striped b-t b-light" id="myTable"> 
        <thead> 
          <tr> 
            <th>STT</th> 
            <th>Tên khách hàng</th> 
            <th>Số điện thoại</th> 
            <th>Email</th> 
            <th>Giới tính</th> 
            <th>Địa chỉ</th> 
            <th>Admin</th> 
            <th>Disable</th> 
            <th>Thao tác</th> 
            <!-- <th style="width:30px;"></th>  -->
          </tr> 
        </thead> 

        <tbody class="user__list"> 
          
        </tbody> 
      </table> 
    </div> 
    <footer class="panel-footer"> 
      <div class="row"> 
         
        <!-- <div class="col-sm-5 text-center"> 
          <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small> 
        </div> 
        <div class="col-sm-7 text-right text-center-xs">                 
          <ul class="pagination pagination-sm m-t-none m-b-none"> 
            <li><a href=""><i class="fa fa-chevron-left"></i></a></li> 
            <li><a href="">1</a></li> 
            <li><a href="">2</a></li> 
            <li><a href="">3</a></li> 
            <li><a href="">4</a></li> 
            <li><a href=""><i class="fa fa-chevron-right"></i></a></li> 
          </ul> 
        </div>  -->
      </div> 
    </footer> 
  </div> 

  <script>
      // $('#myTable').DataTable();
      $(document).ready(function() {
          load_data()
          
          $(document).on('click', '.isadmin', function() {
              let userId = $(this).data('user_id')
              let userName = $(this).data('user_name')
              if($(this).is(':checked')) {
                    $.ajax({
                        url: "{{url('/admin_enable')}}",
                        method: 'post',
                        data: {userId:userId},
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(data) {
                            $.notify(`${userName} đã trở thành admin`, 'success')
                            // load_data()
                        }
                    })
              } else {
                $.ajax({
                        url: "{{url('/admin_disable')}}",
                        method: 'post',
                        data: {userId:userId},
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(data) {
                            $.notify(`Đã gỡ quyền admin của ${userName}`, 'error')
                            load_data()
                        }
                    })
              }
          })

          $(document).on('click', '.isdisable', function() {
              let userId = $(this).data('user_id')
              let userName = $(this).data('user_name')
              if($(this).is(':checked')) {
                $.ajax({
                        url: "{{url('/user_enable')}}",
                        method: 'post',
                        data: {userId:userId},
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(data) {
                            $.notify(`${userName} đã bị chặn`, 'success')
                            // load_data()
                        }
                    })
              } else {
                $.ajax({
                        url: "{{url('/user_enable')}}",
                        method: 'post',
                        data: {userId:userId},
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(data) {
                            $.notify(`Đã bỏ chặn ${userName}`, 'info')
                            load_data()
                        }
                    })
              }
          })

          $(document).on('click', '#delete', function() {
            let userId = $(this).data('user_id')
            let userName = $(this).data('user_name')
            if(confirm(`Bạn có chắc muốn xóa ${userName}`)) {
                $.ajax({
                    url: "{{url('/remove_user')}}",
                    method: 'post',
                    data: {userId:userId},
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(data) {
                        $.notify(`Đã xóa người dùng ${userName}`, 'info')
                        load_data()
                    }
                })
            }
          })
      })
      function load_data() {
          $.ajax({
                url: "{{url('/reload_users')}}",
                method: 'post',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data) {
                    $('.user__list').html(data)
                }
          })
      }
      
  </script>

@endsection()
