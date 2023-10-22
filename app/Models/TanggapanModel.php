<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TanggapanModel extends Model
{
    use HasFactory;

    protected $fillable = [
        'tanggapan',
        'status',
        'user_id',
        'aduan_id'
    ];
}
