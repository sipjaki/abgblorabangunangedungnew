<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class datapemilik extends Model
{
    use HasFactory, SoftDeletes, HasApiTokens;

    protected $guarded = ['id'];

//   public function pbgslfbangunan()
// {
//     return $this->hasOne(pbgslfbangunan::class, 'pbgslfbangunan_id')->latest('created_at');
// }

public function pbgslfbangunan()
{
    return $this->hasOne(pbgslfbangunan::class, 'pbgslfbangunan_id', 'id')->latest('id');
}

public function suratpemberitahuanpbg()
{
    return $this->hasOne(suratpemberitahuanpbg::class, 'suratpemberitahuanpbg_id', 'id')->latest('id');
}

public function surattugaspbg()
{
    return $this->hasOne(surattugaspbg::class, 'surattugaspbg_id', 'id')->latest('id');
}

public function suratudanganpbg()
{
    return $this->hasMany(suratudanganpbg::class, 'suratudanganpbg_id', 'id');
}

}
