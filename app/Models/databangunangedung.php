<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class databangunangedung extends Model
{
    use HasFactory, SoftDeletes, HasApiTokens;

    protected $guarded = ['id'];


    public function fungsibangunan()
    {
        return $this->belongsTo(fungsibangunan::class);
    }

    public function kepemilikanbangunangedung()
    {
        return $this->belongsTo(kepemilikanbangunangedung::class);
    }

    public function profiltanahbangunangedung()
    {
        return $this->belongsTo(profiltanahbangunangedung::class);
    }

    public function klasifikasibangunangedung()
    {
        return $this->belongsTo(klasifikasibangunangedung::class);
    }

    public function datastrukturbangunangedung()
    {
        return $this->belongsTo(datastrukturbangunangedung::class);
    }

    public function statusbangunangedung()
    {
        return $this->belongsTo(statusbangunangedung::class);
    }

}
