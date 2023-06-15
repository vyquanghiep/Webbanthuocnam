@extends('AdminLayout') 
@section('admin_content') 
    <div class="row"> 
        <div class="col-lg-12"> 
        <div class="panel panel-primary" style="background:#DDEDE0;" >
                <div class="panel-heading"
                    style="font-size: 2rem; background: #02796E">
                    Thêm danh mục sản phẩm
                </div>
                <div class="panel-body"> 
                    <div class="position-center"> 
                        <form 
                            role="form" 
                            method="post" 
                            action="{{URL::to('/save_category')}}"
                        > {{ csrf_field() }}
                            <div class="form-group"> 
                                <label for="category_name">Tên danh mục</label> 
                                <input type="text" class="form-control" name="category_name"> 
                            </div> 

                          

                            <button type="submit" class="btn btn-info">Thêm</button> 
                        </form> 
                    </div> 
                </div> 
            </div> 
        </div>    
@endsection
