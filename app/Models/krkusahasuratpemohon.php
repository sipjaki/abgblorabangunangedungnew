<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class krkusahasuratpemohon extends Model
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
    return $this->belongsTo(krkusaha::class, 'krkusaha_id');
}


}
