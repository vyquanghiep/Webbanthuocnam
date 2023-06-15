<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    public $timestamps = false; //set time to false
    protected $fillable = [
    	'madonhang','masanpham','soluongdat','tongtien'
    ];
    protected $primaryKey = 'machitietdonhang';
 	protected $table = 'chitietdonhang';
     public function product(){
        return $this->belongsTo('App\Product','masanpham');
    }
}