<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class databangunanpbg extends Model
{
    use HasFactory, SoftDeletes, HasApiTokens;

    protected $guarded = ['id'];

  public function pbgslfbangunan()
{
    return $this->hasOne(pbgslfbangunan::class, 'pbgslfbangunan_id')->latest('created_at');
}

  public function jenisperkonsultasi()
{
    return $this->belongsTo(jenisperkonsultasi::class, 'jenisperkonsultasi_id');
}

public function fungsibangunanpbg()
{
    return $this->belongsTo(fungsibangunanpbg::class, 'fungsibangunanpbg_id');
}

public function kecamatanblora()
{
    return $this->belongsTo(kecamatanblora::class, 'kecamatanblora_id');
}

public function kelurahandesa()
{
    return $this->belongsTo(kelurahandesa::class, 'kelurahandesa_id');
}

public function suratpemberitahuanpbg()
{
    return $this->hasOne(suratpemberitahuanpbg::class, 'suratpemberitahuanpbg_id', 'id')->latest('id');
}

}
