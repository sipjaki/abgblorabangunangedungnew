<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class krksosbud extends Model
{
    use HasFactory, SoftDeletes, HasApiTokens;

    protected $guarded = ['id'];

    public function krkusahaadmin()
    {
        return $this->belongsTo(krkusahaadmin::class);
    }

    public function krkusahasurat()
    {
        return $this->belongsTo(krkusahasurat::class);
    }

    public function kecamatanblora()
    {
        return $this->belongsTo(kecamatanblora::class);
    }

    public function kelurahandesa()
    {
        return $this->belongsTo(kelurahandesa::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function krksosbudcek()
    {
        return $this->belongsTo(krksosbudcek::class);
    }

    protected $casts = [
        'is_validated' => 'boolean',
    ];


}
