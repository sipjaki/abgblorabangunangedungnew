<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class tpatpt extends Model
{
    use HasFactory, SoftDeletes, HasApiTokens;

   public $incrementing = false;  // penting supaya Laravel gak anggap auto-increment
    protected $keyType = 'int';    // atau 'string' kalau id string
    protected $guarded = [];


    public function pbgslfbangunan()
{
    return $this->hasOne(pbgslfbangunan::class, 'pbgslfbangunan_id', 'id')->latest('id');
}


    public function timpenilai()
    {
        return $this->belongsTo(pengawasatpt::class, 'timpenilai_id');
    }

    public function nosk()
    {
        return $this->belongsTo(pengawasatpt::class, 'nosk_id');
    }

    public function pengawas1()
    {
        return $this->belongsTo(pengawasatpt::class, 'pengawas1_id');
    }

    public function pengawas2()
    {
        return $this->belongsTo(pengawasatpt::class, 'pengawas2_id');
    }

    public function pengawas3()
    {
        return $this->belongsTo(pengawasatpt::class, 'pengawas3_id');
    }

    public function pengawas4()
    {
        return $this->belongsTo(pengawasatpt::class, 'pengawas4_id');
    }

    public function pengawas5()
    {
        return $this->belongsTo(pengawasatpt::class, 'pengawas5_id');
    }

    public function pengawas6()
    {
        return $this->belongsTo(pengawasatpt::class, 'pengawas6_id');
    }

    public function pengawas7()
    {
        return $this->belongsTo(pengawasatpt::class, 'pengawas7_id');
    }

    public function pengawas8()
    {
        return $this->belongsTo(pengawasatpt::class, 'pengawas8_id');
    }
    public function pengawas9()
    {
        return $this->belongsTo(pengawasatpt::class, 'pengawas9_id');
    }
    public function pengawas10()
    {
        return $this->belongsTo(pengawasatpt::class, 'pengawas10_id');
    }
    public function pengawas11()
    {
        return $this->belongsTo(pengawasatpt::class, 'pengawas11_id');
    }
    public function pengawas12()
    {
        return $this->belongsTo(pengawasatpt::class, 'pengawas12_id');
    }

    public function suratudanganpbg()
    {
        return $this->hasMany(suratudanganpbg::class);
    }


}
