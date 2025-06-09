<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class krkhunian extends Model
{
    use HasFactory, SoftDeletes, HasApiTokens;

    protected $guarded = ['id'];

    protected $casts = [
        'is_validated' => 'boolean',
        'validated_at' => 'datetime',
    ];
    // public function krkusahaadmin()
    // {
    //     return $this->belongsTo(krkusahaadmin::class);
    // }

    // public function krkusahasurat()
    // {
    //     return $this->belongsTo(krkusahasurat::class);
    // }

    public function kecamatanblora()
    {
        return $this->belongsTo(kecamatanblora::class);
    }

    public function kelurahandesa()
    {
        return $this->belongsTo(kelurahandesa::class);
    }


}
