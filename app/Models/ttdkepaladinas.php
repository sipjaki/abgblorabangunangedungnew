<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ttdkepaladinas extends Model
{
    use HasFactory;

    protected $table = 'ttdkepaladinas';

    protected $guarded = ['id'];

  public function bantekanalisanew1()
    {
        return $this->hasMany(bantekanalisanew1::class);
    }

    }
