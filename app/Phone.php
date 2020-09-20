<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class Phone extends Model
{


    use SoftDeletes;
    
    protected $fillable = [
        'name','brand','release','quantity','chipset','price',
    ];

    public function thisphone()
    {
        return $this->belongsTo(Brand::class,'brand','id');
    }
    public function galleries()
    {
        return $this->hasMany(Gallerie::class,'products_id');
    }
    public function phonecart()
    {
        return $this->hasMany(Chart::class,'transaction_id');
    }
    public function detail()
    {
        return $this->hasMany(Detailtransaction::class,'products_id');
    }
}
