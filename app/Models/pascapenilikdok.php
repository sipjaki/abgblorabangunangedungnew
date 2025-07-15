<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class pascapenilikdok extends Model
{
    use HasFactory, SoftDeletes, HasApiTokens;

    protected $guarded = ['id'];

    public function penilikbangunan()
    {
        return $this->belongsTo(penilikbangunan::class, 'penilikbangunan_id');
    }

    public function fotopascapenilik()
    {
        return $this->hasMany(fotopascapenilik::class);
    }

}
