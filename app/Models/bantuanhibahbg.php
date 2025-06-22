<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class bantuanhibahbg extends Model
{
    use HasFactory, SoftDeletes, HasApiTokens;

    protected $guarded = ['id'];

       public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function banhibahberkas()
    {
        return $this->belongsTo(banhibahberkas::class, 'banhibahberkas_id');
    }

    public function banhibahlapangan()
    {
        return $this->belongsTo(banhibahlapangan::class, 'banhibahlapangan_id');
    }

    public function banhibahskbupati()
    {
        return $this->belongsTo(banhibahskbupati::class, 'banhibahskbupati_id');
    }

}
