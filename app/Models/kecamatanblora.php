<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class kecamatanblora extends Model
{
    use HasFactory, SoftDeletes, HasApiTokens;

    protected $guarded = ['id'];

    public function krk()
    {
        return $this->hasMany(krk::class);
    }

    public function krkusaha()
    {
        return $this->hasMany(krkusaha::class);
    }

    public function krkhunian()
    {
        return $this->hasMany(krkhunian::class);
    }

    public function krkkeagamaan()
    {
        return $this->hasMany(krkkeagamaan::class);
    }

    public function kelurahandesa()
    {
        return $this->hasMany(kelurahandesa::class);
    }

    public function bantuanteknis()
    {
        return $this->hasMany(bantuanteknis::class);
    }

    public function penilikbangunan()
    {
        return $this->hasMany(penilikbangunan::class);
    }

    public function databangunanpbg()
    {
        return $this->hasMany(databangunanpbg::class);
    }

    public function gambarbantuan()
    {
        return $this->hasMany(gambarbantuan::class);
    }

    public function databgkepemilikan()
    {
        return $this->hasMany(databgkepemilikan::class);
    }
}
