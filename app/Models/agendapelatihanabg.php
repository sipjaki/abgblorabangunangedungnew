<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class agendapelatihanabg extends Model
{
    use HasFactory, SoftDeletes, HasApiTokens;

    protected $guarded = ['id'];

       public function materipelatihan()
    {
        return $this->belongsTo(materipelatihan::class);
    }

    public function kategoripelatihan()
    {
        return $this->belongsTo(kategoripelatihan::class, 'kategoripelatihan_id');
    }

    public function pesertapelatihan()
    {
        return $this->hasMany(pesertapelatihan::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }


}
