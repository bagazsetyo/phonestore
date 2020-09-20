<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class Gallerie extends Model
{

    use SoftDeletes;
    
    protected $fillable = [
        'photo','is_default','products_id',
    ];

    public function photo()
    {
        return $this->belongsTo(Phone::class,'products_id','id');
    }


    // menggunakan assesor dan mutator agar menyertakan url pada foto
    //get bawaan laravel, Photo fild di database, attribute bawaan laravel
    public function getPhotoAttribute($value)
    {
        //jika ingin menggunakan storage pada laravel harus menjalankan perintah
        //php artisan storage:link
        return url('storage/' . $value); 
    }

}
