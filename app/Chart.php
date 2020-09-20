<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chart extends Model
{
    protected $fillable = [
        'user_id','transaction_id','photo','qty'
    ];

    public function thiscart()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
    public function thiscartphone()
    {
        return $this->belongsTo(Phone::class,'transaction_id','id');
    }
}
