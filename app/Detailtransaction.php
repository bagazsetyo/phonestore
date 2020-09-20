<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class Detailtransaction extends Model
{
    
    use SoftDeletes;

    protected $fillable = [
        'transactions_id','products_id','pesan',
    ];

    public function detailtransaction()
    {
        return $this->belongsTo(Transaction::class,'transactions_id','id');
    }
    public function product()
    {
        return $this->belongsTo(Phone::class,'products_id','id');
    }
}
