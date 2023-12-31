<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tanggapan extends Model
{
    use HasFactory;

    protected $fillable = [
        'tanggapan',
        'status',
        'user_id',
        'aduan_id'
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function aduan(){
        return $this->belongsTo(Aduan::class, 'aduan_id');
    }
}
