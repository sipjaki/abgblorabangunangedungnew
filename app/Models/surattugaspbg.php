<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class surattugaspbg extends Model
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

    public function fasilitatorpbg()
    {
        return $this->belongsTo(fasilitatorpbg::class, 'fasilitatorpbg_id');
    }

}
