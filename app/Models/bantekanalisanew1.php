<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class bantekanalisanew1 extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];

    public function induk()
    {
        return $this->belongsTo(
            bantekanalisainduk::class,
            'bantekanalisainduk_id',
            'id'
        );
    }
}
