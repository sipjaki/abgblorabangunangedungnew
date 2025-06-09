<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class rencanagsbblora extends Model
{
    use HasFactory, SoftDeletes, HasApiTokens;

    protected $guarded = ['id'];


    // public function databangunangedung()
    // {
    //     return $this->hasOne(databangunangedung::class);
    // }

    public function krkusahasurat()
    {
        return $this->hasMany(krkusahasurat::class);
    }




}
