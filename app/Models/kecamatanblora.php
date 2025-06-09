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

    public function krkhunian()
    {
        return $this->hasMany(krkhunian::class);
    }

    public function kelurahandesa()
    {
        return $this->belongsTo(kelurahandesa::class);
    }

    public function bantuanteknis()
    {
        return $this->hasMany(bantuanteknis::class);
    }

}
