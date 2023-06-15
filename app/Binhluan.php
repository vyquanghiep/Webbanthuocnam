<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Binhluan extends Model
{
    public $timestamps = false; //set time to false
    protected $fillable = [
    	'noidung','ten','gmail','masanpham','manguoidung','thoigian','hienthi'
    ];
    protected $primaryKey = 'manbinhluan';
 	protected $table = 'binhluan';
}