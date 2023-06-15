<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $timestamps = false; //set time to false
    protected $fillable = [
    	'tensanpham', 'soluong','madanhmuc','mota','gia','anhurl','maloai'
    ];
    protected $primaryKey = 'masanpham';
 	protected $table = 'sanpham';
}