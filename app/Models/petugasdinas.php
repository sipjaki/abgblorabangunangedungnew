<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class petugasdinas extends Model
{
    use HasFactory, SoftDeletes, HasApiTokens;

    protected $guarded = ['id'];

    public function perjalanandinas()
    {
        return $this->hasMany(perjalanandinas::class);
    }

    // public function pendampingdinas()
    // {
    //     return $this->belongsTo(petugasdinas::class, 'pendamping_id');
    // }

}
