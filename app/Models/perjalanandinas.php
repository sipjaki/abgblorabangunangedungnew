<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class perjalanandinas extends Model
{
    use HasFactory, SoftDeletes, HasApiTokens;

    protected $guarded = ['id'];

    public function namapetugas()
    {
        return $this->belongsTo(petugasdinas::class, 'namapetugas_id');
    }

    public function pendampingdinas()
    {
        return $this->belongsTo(petugasdinas::class, 'pendamping_id');
    }
    public function pendampingdinas2()
    {
        return $this->belongsTo(petugasdinas::class, 'pendamping2_id');
    }
    public function pendampingdinas3()
    {
        return $this->belongsTo(petugasdinas::class, 'pendamping2_id');
    }

    public function lapperjalanandinas()
    {
        return $this->hasMany(lapperjalanandinas::class);
    }

}
