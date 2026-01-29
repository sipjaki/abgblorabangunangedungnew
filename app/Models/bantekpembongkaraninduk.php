<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class bantekpembongkaraninduk extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'bantekpembongkaraninduk';
    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function bantekpembongkarannew1()
    {
        return $this->hasMany(
            bantekpembongkarannew1::class,
            'bantekpembongkaraninduk_id',
            'id'
        );
    }
}

