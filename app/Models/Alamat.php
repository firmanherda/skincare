<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alamat extends Model
{
    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function provinsi()
    {
        return $this->belongsTo(Provinsi::class);
    }

    public function kota()
    {
        return $this->belongsTo(Kota::class);
    }

    public function transaksis()
    {
        return $this->hasMany(Transaksi::class);
    }
}
