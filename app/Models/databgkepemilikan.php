<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class databgkepemilikan extends Model
{
    use HasFactory, SoftDeletes, HasApiTokens;

    protected $guarded = ['id'];


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function kecamatanblora()
    {
        return $this->belongsTo(kecamatanblora::class, 'kecamatanblora_id');
    }

    public function datainstitusibangunangedung()
    {
        return $this->belongsTo(datainstitusibangunangedung::class, 'datainstitusibangunangedung_id');
    }

    public function databgtanah()
    {
        return $this->hasMany(databgtanah::class);
    }



}
