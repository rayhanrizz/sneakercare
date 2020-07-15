<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fasilitas extends Model
{
    protected $primaryKey = 'id_fasilitas';
    protected $table = 'fasilitas';

    protected $fillable = ['nama_fasilitas','gambar'];
}
