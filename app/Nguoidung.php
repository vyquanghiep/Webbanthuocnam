<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class nguoidung extends Model
{
    public $timestamps = false; //set time to false
    protected $fillable = [
    	'hoten','ngaysinh','email','password','gioitinh','diachi','sodienthoai','trangthaitaikhoan','maquyen'
    ];
    protected $primaryKey = 'manguoidung';
 	protected $table = 'nguoidung';
}