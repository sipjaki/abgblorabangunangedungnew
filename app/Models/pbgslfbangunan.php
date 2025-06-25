<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class pbgslfbangunan extends Model
{
    use HasFactory, SoftDeletes, HasApiTokens;

    protected $guarded = ['id'];

    public function jenispengajuanpbgslf()
    {
        return $this->belongsTo(jenispengajuanpbgslf::class, 'jenispengajuanpbgslf_id');
    }

    public function jenispengajuanpbgslfper()
    {
        return $this->belongsTo(jenispengajuanpbgslfper::class, 'jenispengajuanpbgslfper_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function datapemilik()
    {
        return $this->belongsTo(datapemilik::class, 'datapemilik_id');
    }

}
