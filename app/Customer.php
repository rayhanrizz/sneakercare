<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $primaryKey = 'id_cust';
    protected $table = 'customer';

    protected $fillable = ['nama_cust','alamat_cust','tlp_cust'];
}
