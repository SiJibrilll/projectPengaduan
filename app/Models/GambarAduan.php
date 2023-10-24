<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GambarAduan extends Model
{
    use HasFactory;

    protected $fillable = [
        'gambar',
        'aduan_id'
    ];

    function aduan() {
        return $this->belongsTo(Aduan::class, 'aduan_id');
    }
}
