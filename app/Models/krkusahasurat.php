<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class krkusahasurat extends Model
{
    use HasFactory, SoftDeletes, HasApiTokens;

    protected $guarded = ['id'];

//     public function krkusaha()
// {
//     return $this->hasOne(krkusaha::class, 'krkusaha_id', 'id')->latest('id');
// }


// Dalam model krkusaha.php
public function krkusaha()
{
    return $this->hasOne(krkusaha::class, 'krkusaha_id', 'id')->latest('id');
}

public function krkhunian()
{
    return $this->hasOne(krkhunian::class, 'krkhunian_id', 'id')->latest('id');
}

public function krkkeagamaan()
{
    return $this->hasOne(krkkeagamaan::class, 'krkkeagamaan_id', 'id')->latest('id');
}

public function krksosbud()
{
    return $this->hasOne(krksosbud::class, 'krksosbud_id', 'id')->latest('id');
}


    public function rencanagsbblora()
    {
        return $this->belongsTo(rencanagsbblora::class);
    }


}
