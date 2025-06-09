<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class kedinasan extends Model
{
    use HasFactory, SoftDeletes, HasApiTokens;

    protected $guarded = ['id'];


    public function kodelokasibangunangedung()
    {
        return $this->hasMany(kodelokasibangunangedung::class);
    }

    public function bgkartuinventarisbangunan()
    {
        return $this->hasMany(bgkartuinventarisbangunan::class);
    }

}
