<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $primaryKey = 'id_order';
    protected $table = 'order';

    protected $fillable = ['tgl_order','nama_cust_order','nama_brg_order','jenis_bahan_order','harga','opsi_antar_order','status','tgl_selesai_order','total_harga_order'];

    public function Customer(){
    	return $this->belongsTo('App\Customer','nama_cust_order','id_cust');
    }
    public function Product(){
    	return $this->belongsTo('App\Product','jenis_bahan_order','id_product');
    }
}
