<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class datapemilik extends Model
{
  use HasFactory, SoftDeletes, HasApiTokens;

   public $incrementing = false;  // penting supaya Laravel gak anggap auto-increment
    protected $keyType = 'int';    // atau 'string' kalau id string
    protected $guarded = [];

    // protected $guarded = ['id'];

    // public $incrementing = false; // kasih tahu id tidak auto increment
    // protected $keyType = 'int';
//   public function pbgslfbangunan()
// {
//     return $this->hasOne(pbgslfbangunan::class, 'pbgslfbangunan_id')->latest('created_at');
// }

public function pbgslfbangunan()
{
    return $this->hasMany(pbgslfbangunan::class, 'pbgslfbangunan_id');
}


public function suratpemberitahuanpbg()
    {
        return $this->hasMany(suratpemberitahuanpbg::class, 'suratpemberitahuanpbg_id');
    }


public function surattugaspbg()
{
    return $this->hasOne(surattugaspbg::class, 'surattugaspbg_id', 'id')->latest('id');
}

public function suratudanganpbg()
{
    return $this->hasMany(suratudanganpbg::class);
}

}
