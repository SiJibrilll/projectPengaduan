<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aduan extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul',
        'deskripsi',
        'status',
        'user_id'
    ];

    function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    function gambar() {
        return $this->hasMany(GambarAduan::class, 'aduan_id');
    }

    public function tanggapan(){
        return $this->hasMany(Tanggapan::class, 'aduan_id');
    }
}
