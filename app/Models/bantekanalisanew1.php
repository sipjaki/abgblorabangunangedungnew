<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class bantekanalisanew1 extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];

    public function induk()
    {
        return $this->belongsTo(
            bantekanalisainduk::class,
            'bantekanalisainduk_id',
            'id'
        );
    }

  public function kepaladinas()
    {
        return $this->belongsTo(ttdkepaladinas::class, 'kepaladinas_id');
    }

    public function kabidbangunangedung()
    {
        return $this->belongsTo(kabidbangunangedung::class, 'kabidbangunangedung_id');
    }

    public function timsurvey1()
    {
        return $this->belongsTo(petugasdinas::class, 'timsurvey1_id');
    }

    public function timsurvey2()
    {
        return $this->belongsTo(petugasdinas::class, 'timsurvey2_id');
    }

    public function timsurvey3()
    {
        return $this->belongsTo(petugasdinas::class, 'timsurvey3_id');
    }

    public function timsurvey4()
    {
        return $this->belongsTo(petugasdinas::class, 'timsurvey4_id');
    }

}
