<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class dataumumpbg extends Model
{
    use HasFactory, SoftDeletes, HasApiTokens;

    protected $guarded = ['id'];

  public function pbgslfbangunan()
{
    return $this->hasOne(pbgslfbangunan::class, 'pbgslfbangunan_id', 'id')->latest('id');
}


public function suratpemberitahuanpbg()
{
    return $this->hasOne(suratpemberitahuanpbg::class, 'suratpemberitahuanpbg_id', 'id')->latest('id');
}

}
