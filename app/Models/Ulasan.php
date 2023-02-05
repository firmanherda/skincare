<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ulasan extends Model
{
    protected $guarded = ['id'];

    public function transaksiDetails()
    {
        return $this->hasMany(TransaksiDetail::class);
    }

    public function fotos()
    {
        return $this->morphMany(Foto::class, 'fotoable');
    }
}
