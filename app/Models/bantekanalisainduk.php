<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class bantekanalisainduk extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'bantekanalisainduks';
    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function bantekanalisanew1()
    {
        return $this->hasMany(
            bantekanalisanew1::class,
            'bantekanalisaninduk_id',
            'id'
        );
    }

}

