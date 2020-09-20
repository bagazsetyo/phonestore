<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class Brand extends Model
{

    use SoftDeletes;
    
    protected $fillable = [
        'name',
    ];
     public function mybrand()
    {
        return $this->hasMany(Phone::class,'brand');
    }
}
