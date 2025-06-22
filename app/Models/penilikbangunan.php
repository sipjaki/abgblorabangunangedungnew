<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class penilikbangunan extends Model
{
    use HasFactory, SoftDeletes, HasApiTokens;

    protected $guarded = ['id'];

    public function dokpemohonpenilik()
    {
        return $this->belongsTo(dokpemohonpenilik::class, 'dokpemohonpenilik_id');
    }

    public function lapanganpenilik()
    {
        return $this->belongsTo(lapanganpenilik::class, 'lapanganpenilik_id');
    }

    public function uploadberpenilik()
    {
        return $this->belongsTo(uploadberpenilik::class, 'uploadberpenilik_id');
    }

    public function penilikdasilitator()
    {
        return $this->belongsTo(penilikdasilitator::class, 'penilikdasilitator_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function kecamatanblora()
    {
        return $this->belongsTo(kecamatanblora::class, 'kecamatanblora_id');
    }

    public function kelurahandesa()
    {
        return $this->belongsTo(kelurahandesa::class, 'kelurahandesa_id');
    }

    public function rencanagsbblora()
    {
        return $this->belongsTo(rencanagsbblora::class, 'rencanagsbblora_id');
    }

}
