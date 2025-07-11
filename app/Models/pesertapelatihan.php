<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class pesertapelatihan extends Model
{
    use HasFactory, SoftDeletes, HasApiTokens;

    protected $guarded = ['id'];

       public function agendapelatihanabg()
    {
        return $this->belongsTo(agendapelatihanabg::class, 'agendapelatihanabg_id');
    }

    public function jenjangpendidikan()
    {
        return $this->belongsTo(jenjangpendidikan::class, 'jenjangpendidikan_id');
    }


}
