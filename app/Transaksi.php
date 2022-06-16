<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = 'transaksi';

    public function pengunjung()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function kamar()
    {
        return $this->hasOne(Kamar::class,'id','kamar_id');
    }
}
