<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class kicdokumen extends Model
{
    use HasFactory, SoftDeletes, HasApiTokens;

    protected $guarded = ['id'];


    public function kicinduk()
    {
        return $this->hasMany(kicinduk::class);
    }

    public function kicstruktur()
    {
        return $this->hasMany(kicstruktur::class);
    }


}
