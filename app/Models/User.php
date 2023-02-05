<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $guarded = ['id'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function toko()
    {
        return $this->hasOne(Toko::class);
    }

    public function alamats()
    {
        return $this->hasMany(Alamat::class);
    }

    public function transaksis()
    {
        return $this->hasMany(Transaksi::class);
    }

    public function topups()
    {
        return $this->hasMany(Topup::class);
    }

    public function penarikans()
    {
        return $this->morphMany(Penarikan::class, 'penarikanable');
    }

    public function keranjangs()
    {
        return $this->belongsToMany(Barang::class, 'keranjangs', 'user_id', 'barang_id')
            ->withPivot(['sub_total', 'jumlah']);
    }

    public function wishlists()
    {
        return $this->belongsToMany(Barang::class, 'wishlists', 'user_id', 'barang_id');
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_users', 'user_id', 'role_id');
    }
}
