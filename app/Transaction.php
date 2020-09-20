<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class Transaction extends Model
{
    
    use SoftDeletes;

    protected $fillable = [
        'uuid','nama','email','number','address','transaction_total','transaction_status',
    ];

    public function details()
    {
        return $this->hasMany(Detailtransaction::class,'transactions_id');
    }
}
