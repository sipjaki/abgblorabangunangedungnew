<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class suratpemberitahuanpbg extends Model
{
    use HasFactory, SoftDeletes, HasApiTokens;

    protected $guarded = ['id'];

 public function pbgslfbangunan()
{
    return $this->hasMany(pbgslfbangunan::class, 'pbgslfbangunan_id');
}

 public function datapemilik()
{
    return $this->belongsTo(datapemilik::class, 'datapemilik_id');
}

 public function databangunanpbg()
{
    return $this->belongsTo(databangunanpbg::class, 'databangunanpbg_id');
}

 public function datatanahpbg()
{
    return $this->belongsTo(datatanahpbg::class, 'datatanahpbg_id');
}

 public function dataumumpbg()
{
    return $this->belongsTo(dataumumpbg::class, 'dataumumpbg_id');
}

 public function dokumenteknisarsi()
{
    return $this->belongsTo(dokumenteknisarsi::class, 'dokumenteknisarsi_id');
}

 public function dokumenteknisstruk()
{
    return $this->belongsTo(dokumenteknisstruk::class, 'dokumenteknisstruk_id');
}

 public function dokumenteknismep()
{
    return $this->belongsTo(dokumenteknismep::class, 'dokumenteknismep_id');
}

public function dokumenteknisslfpbg()
{
    return $this->belongsTo(dokumenteknisslfpbg::class, 'dokumenteknisslfpbg_id');
}

}
