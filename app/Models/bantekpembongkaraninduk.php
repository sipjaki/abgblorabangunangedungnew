<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class bantekpembongkaraninduk extends Model
{
    use HasFactory, SoftDeletes;

    // WAJIB karena nama tabel custom
    protected $table = 'bantekpembongkaraninduk';

    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function Bantekbongkar1()
    {
        return $this->belongsTo(Bantekbongkar1::class);
    }

    public function bantekpembongkarannew1()
    {
        return $this->hasOne(bantekpembongkarannew1::class);
    }
}
