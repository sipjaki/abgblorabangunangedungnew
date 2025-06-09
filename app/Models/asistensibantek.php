<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class asistensibantek extends Model
{
    use HasFactory, SoftDeletes, HasApiTokens;

    protected $guarded = ['id'];

       public function bantuanteknis()
    {
        return $this->hasMany(bantuanteknis::class, 'bantuanteknis_id');
    }

    public function konsultan()
    {
        return $this->belongsTo(User::class, 'konsultan_id');
    }

    public function dinas()
    {
        return $this->belongsTo(User::class, 'dinas_id');
    }


}
