<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class kicinduk extends Model
{
    use HasFactory, SoftDeletes, HasApiTokens;

    protected $guarded = ['id'];


    public function satuankerja()
    {
        return $this->belongsTo(satuankerja::class, 'satuankerja_id');
    }

    public function kicdokumen()
    {
        return $this->hasMany(kicdokumen::class);
    }

    public function kicstruktur()
    {
        return $this->hasMany(kicstruktur::class);
    }


}
