<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class bantuanteknis extends Model
{
    use HasFactory, SoftDeletes, HasApiTokens;

    protected $guarded = ['id'];

    public function asistensibantek()
    {
        return $this->belongsTo(User::class, 'asistensibantek_id');
    }

       public function pemohon()
    {
        return $this->belongsTo(User::class, 'pemohon_id');
    }

       public function dinas()
    {
        return $this->belongsTo(User::class, 'dinas_id');
    }

    public function jenispengajuanbantek()
    {
        return $this->belongsTo(jenispengajuanbantek::class, 'jenispengajuanbantek_id');
    }

    public function kecamatanblora()
    {
        return $this->belongsTo(kecamatanblora::class, 'kecamatanblora_id');
    }

    public function kelurahandesa()
    {
        return $this->belongsTo(kelurahandesa::class, 'kelurahandesa_id');
    }

    public function ceklapanganbantek()
    {
        return $this->belongsTo(ceklapanganbantek::class, 'ceklapanganbantek_id');
    }

}
