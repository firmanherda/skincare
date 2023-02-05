<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use \Znck\Eloquent\Traits\BelongsToThrough;

    protected $guarded = ['id'];

    public function toko()
    {
        return $this->belongsTo(Toko::class);
    }

    public function etalase()
    {
        return $this->belongsTo(Etalase::class);
    }

    public function subKategori()
    {
        return $this->belongsTo(SubKategori::class);
    }

    public function kategori()
    {
        return $this->belongsToThrough(Kategori::class, [SubKategori::class]);
    }

    public function fotos()
    {
        return $this->morphMany(Foto::class, 'fotoable');
    }
}
