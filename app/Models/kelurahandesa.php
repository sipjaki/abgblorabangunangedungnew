<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class kelurahandesa extends Model
{
    use HasFactory, SoftDeletes, HasApiTokens;

    protected $guarded = ['id'];

    public function kecamatanblora()
    {
        return $this->hasMany(kecamatanblora::class, 'kecamatanblora_id');
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

    public function bantuanteknis()
    {
        return $this->hasMany(bantuanteknis::class);
    }

}
