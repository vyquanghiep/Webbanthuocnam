<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public $timestamps = false; //set time to false
    protected $fillable = [
    	'manguoidung','matrangthaidonhang','thoigian','tongtien','nguoinhan','diachi','sodienthoai'
    ];
    protected $primaryKey = 'madonhang';
 	protected $table = 'donhang';
}