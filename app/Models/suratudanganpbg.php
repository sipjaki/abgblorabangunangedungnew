<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class suratudanganpbg extends Model
{
    use HasFactory, SoftDeletes, HasApiTokens;

    protected $guarded = ['id'];

    public function pbgslfbangunan()
    {
        return $this->belongsTo(pbgslfbangunan::class, 'pbgslfbangunan_id');
    }

    public function datapemilik()
    {
        return $this->belongsTo(datapemilik::class, 'datapemilik_id');
    }

    public function databangunanpbg()
    {
        return $this->belongsTo(databangunanpbg::class, 'databangunanpbg_id');
    }

    public function tempatkonsultasi()
    {
        return $this->belongsTo(tempatkonsultasi::class, 'tempatkonsultasi_id');
    }

    public function tpatpt()
    {
        return $this->belongsTo(tpatpt::class, 'tpatpt_id');
    }


}
