<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class bgkartuinventarisbangunan extends Model
{
    use HasFactory, SoftDeletes, HasApiTokens;

    protected $guarded = ['id'];


    public function kedinasan()
    {
        return $this->belongsTo(kedinasan::class);
    }

    public function kodelokasibangunangedung()
    {
        return $this->belongsTo(kodelokasibangunangedung::class);
    }

}
