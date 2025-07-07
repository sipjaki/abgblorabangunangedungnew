<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class gambarbantuan extends Model
{
    use HasFactory, SoftDeletes, HasApiTokens;

    protected $guarded = ['id'];


    public function kecamatanblora()
    {
        return $this->belongsTo(kecamatanblora::class, 'kecamatanblora_id');
    }

    public function kelurahandesa()
    {
        return $this->belongsTo(kelurahandesa::class, 'kelurahandesa_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function jenispermohonangambar()
    {
        return $this->belongsTo(jenispermohonangambar::class, 'jenispermohonangambar_id');
    }

    public function fungsibangunangambar()
    {
        return $this->belongsTo(fungsibangunangambar::class, 'fungsibangunangambar_id');
    }

    public function surattugaspbg()
    {
        return $this->hasMany(surattugaspbg::class);
    }

    public function bglapangan()
    {
        return $this->hasMany(bglapangan::class);
    }

}
