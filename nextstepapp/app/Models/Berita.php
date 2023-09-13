<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    use HasFactory;
    protected $table = 'tb_blog';
    protected $primaryKey = 'id_blog';
    protected $filltable = ['id', 'judul_berita', 'isi_berita', 'gambar_berita'];
}
