<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GambarAduanModel extends Model
{
    use HasFactory;

    protected $fillable = [
        'gambar',
        'aduan_id'
    ];
}
