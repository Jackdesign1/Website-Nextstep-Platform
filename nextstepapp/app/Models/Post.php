<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Post extends Model
{
    use HasFactory;
    protected $table = 'tb_post';
    protected $primaryKey = 'id_post';
    protected $fillable = [
        'id', // Tambahkan 'id' ke dalam properti fillable
        'deskripsi',
        'foto',
        // Kolom-kolom lain yang diizinkan untuk mass assignment
    ];
    public function user()
{
    return $this->belongsTo(User::class);
}

}
